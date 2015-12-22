<?php
//测试控制器类
class IndexController extends Controller{
	/**
	 * 商品模型
	 */
	private $db;
    private $user;
    /**
     * 栏目数据
     */
    private $category;
	/**
	 * 构造函数
	 * @return [type] [description]
	 */
	public function __init()
	{	
		$this->db=K('Goods');
        $this->category=S('category');
        $this->user=K('User');
        /**
         * 获得所有栏目
         */
        $category=Data::channelLevel($this->category,0,'-');
        $this->assign('category',$category);
	}
    public function out()
    {
        unset($_SESSION['username']);
        return go('index');
    }
    /**
     * 验证用户名是否存在
     */
    public function isUser()
    {
        $username=Q('user');
        $user=$this->user->where("username='{$username}'")->find();
        if ($user) {
            $this->error('用户名已存在');
        }else{
            $this->success('用户名不存在');
        }
    }
    /**
     * 验证码验证
     */
    public function getCode()
    {
       $code=Q('post.code');
       if (strtoupper($code)==$_SESSION['code']) {
            $this->success('验证通过');
       }else{
            $this->error('验证码错误');
       }
    }
    /**
     * 验证码
     */
    public function code()
    {
        $code = new code(200,30,'#dddddd','#000',4,22);
        $code->show();
    }
    /**
     * 用户登录
     * @return [type] [description]
     */
    public function login()
    {
        if (IS_POST) {

            if ($this->user->login()) {
                if ($s=Q('s',0,'intval')) {
                    /**
                     * 购物车来登录的跳回购物车
                     */
                   $this->success('登录成功','acount');
                }else{
                    $this->success('登录成功','index'); 
                } 
            }else{
                $this->error($this->user->error);
            }
        }else{
            $this->display();
        }
    }
    /**
     * 用户注册
     * @return [type] [description] 
     */
    public function zhuce()
    {
        if (IS_POST) {
           if ($this->user->zhuce()) {
               $this->success('注册成功','index');
           }else{
                $this->error($this->user->error);
           }
        }else{
            $this->display();
        }
    }
    /**
     * 设置默认地址
     */
    public function setDefault()
    {
        $addressId=Q('addressId',0,'intval');
        //将所有的is_default设置为0
        $db=M('address');
        $uid=$db->where("address_id=$addressId")->getField('uid');
        $address=$db->where("uid=$uid")->all();
        $d=array();
        foreach ($address as $key => $val) {
            $d['address_id']=$val['address_id'];
            $d['is_default']=0;
            $db->save($d);
        };
        //设置默认地址
        $data=array();
        $data['address_id']=$addressId;
        $data['is_default']=1;
        if ($db->save($data)) {
            $this->success('设置成功');
        }else{
            $this->error('默认地址设置失败');
        }
    }
    //删除地址
    public function delAddress()
    {
        $addressId=Q('addressId',0,'intval');
        if (M('address')->del($addressId)) {
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    /**
     * 核对订单个人信息 
     * @return [type] [description]
     */
    public function check()
    {
        /**
         * 登陆后再核对
         */
        if (!isset($_SESSION['username'])) {
            $this->assign('s',Q('s',0,'intval'));
            $this->display('login.html');
            exit;
        }
        /**
         * 获取该用户已有地址
         */
        $address=M('address')->where("uid={$_SESSION['uid']}")->all();
        $this->assign('address',$address);
        $this->display();
    }
	/**
	 * 首页展示
	 * @return [type] [description]
	 */
    public function index(){
        $this->display();
    }
    /**
     * 列表页展示
     * @return [type] [description]
     */
    public function lists()
    {
        //获得当前栏目
        $this->assign('cate',$this->category[Q('cid',0,'intval')]);
        /**
         * 获得栏目属性
         */
        $attr=$this->getAttr();
        $this->assign('attr',$attr);
        /**
         * 获得商品列表
         */
        $this->assignListGoods();
        $this->display();
    }
    /**
     * 详情页展示
     * @param string $value [description]
     */
    public function detail()
    {
    	/**
    	 * 展示的商品ID
    	 */
    	$goods_id=Q('goods_id',0,'intval');
        if (!$goods_id) {
            $this->error('商品不存在',__ROOT__);
        }
    	$map['goods_gid']=array('EQ',$goods_id);
    	/**
    	 * 商品详情介绍goods_data
    	 */
    	$goods_data=M('goods_data')->where($map)->find();
    	$this->assign('goods_data',$goods_data);
    	/**
    	 * 详情页图片展示goods_gallery
    	 */
    	$goods_gallery=M('goods_gallery')->where($map)->order(" goods_gallery_id asc")->all();
    	$this->assign('goods_gallery',$goods_gallery);
        /**
         * 商品规格属性
         */
        $goods_attr=K('GoodsAttr')->getDetailAttr();
        $this->assign($goods_attr);
        /**
         * 商品表数据
         */
        $data=$this->db->find($goods_id);
        $this->assign('data',$data);
        /**
         * 浏览记录
         */
        $this->assign('history',$this->history($data));
    	$this->display('detail');
    }
    /**
     *结算
     * @return [type] [description]
     */
    public function acount()
    {   
        $this->display();
    }
    /**
     * 收货地址
     * @return [type] [description]
     */
    public function address()
    {
        if (empty($_POST)) {
            $this->error('新地址添加失败');
        }else{
            $db=M('address');
            $user=$db->where("uid='{$_POST['uid']}' and is_default=1")->find();
            if ($user) {
                //更改默认地址状态
                $data=array('address_id'=>$user['address_id'],'is_default'=>0);
                $db->save($data);
            }
            if ($db->add()) {
                $this->success('添加成功');
            }else{
               $this->error('新地址添加失败'); 
            }
        }
    }
    public function proNum()
    {
        $id=Q('id');
        $type=Q('type',0,'intval');
        $db=M('product');
        if ($type) {//购物车查库存 $id为商品与货品id
            $id=explode('-', $id);
            $pro=$db->where("product_id=$id[1]")->getField('product_number');
            echo json_encode(array('proNum'=>$pro));exit;
        }else{//详情页查库存
            $pro=$db->where("goods_attr='{$id}'")->getField('product_number');
            if (!$pro) {
               $pro=0;
            }
            echo json_encode(array('proNum'=>$pro));exit;
        }
        
    }
    /**
     * 历史浏览记录
     * @return [type] [description]
     */
    public function history($data)
    {
        $history=array();
        if (!isset($_SESSION['_history'])) {
            $_SESSION['_history']=array();
        }
        /**
         * 只需要goods_id,goods_index_title,goods_price;goods_thumb
         */
        $history['goods_id']=$data['goods_id'];
        $history['goods_index_title']=$data['goods_index_title'];
        $history['goods_price']=$data['goods_price'];
        $history['goods_thumb']=$data['goods_thumb'];
        array_unshift($_SESSION['_history'],$history);
        return $_SESSION['_history']=array_slice(array_unique($_SESSION['_history'],SORT_REGULAR),0,5);
    }
    /**
     * 获得商品列表
     * @return [type] [description]
     */
    private function assignListGoods()
    {
        //栏目id
        $cid=Q('cid',0,'intval');
        /**
         * 分析'-'连接的商品属性id,去掉s中为0的值
         */
        $s=Q('get.s','','trim');
        if ($s=='00') {
            $s=array(0);/////
        }else{
            $s=explode('-',$s);
        }
        $s=array_filter($s);
        /**
         * 排序order
         * 0 goods_click ;1 价格排序 ；2 上架时间
         */
        $order=Q('order',0,'intval');
        $order=$order?($order==1?' goods_price asc':' goods_id asc'):' goods_click desc';
        /**
         * 没有筛选条件显示所有
         */
        if (!$s) {
            $map['category_cid']=array('EQ',$cid);
            $page=new Page($this->db->where($map)->count(),15);
            $data=M('goods')->where($map)->limit($page->limit())->order($order)->all();
        }else{
            /**
             * 有筛选条件，取id的值找对应value
             */
            $map['id']=array('IN',$s);
            $attr_value=M('goods_attr')->where($map)->getField('attr_value',true);//true压入数组
            $attr_value="'".implode("','", $attr_value)."'";
            $sql="SELECT count(*) c FROM goods_attr ga JOIN goods g
                    ON ga.goods_gid=g.goods_id
                    WHERE ga.attr_value IN ({$attr_value})
                    GROUP BY ga.goods_gid HAVING count(*)=".count($s);
            /**
             * 分页处理
             */
            $count=M()->query($sql);
            $page=new Page(count($count),5);
            // $page=new Page($count[0]['c'],5);
            $sql="SELECT * FROM goods_attr ga JOIN goods g
                    ON ga.goods_gid=g.goods_id
                    WHERE ga.attr_value IN ({$attr_value})
                    GROUP BY ga.goods_gid HAVING count(*)=".count($s);
            $data=M()->query($sql);
        }

        $this->assign(array('data'=>$data,'page'=>$page->show()));
    }
    /**
     * 获得栏目属性，用于筛选
     * @return [type] [description]
     */
    private function getAttr()
    {
        /**
         * attr属性筛选的变量，没有就使用默认的
         * 如0-0-0，属性的attr_id相连
         * @var [type]
         */
        $s=Q('get.s',null,'trim');
        //栏目id
        $cid=Q('cid');
        /**
         * cid 45 46没有列表页
         */
        if ($cid==45) { header('Location:http://appstore.huawei.com/game/list');exit;}
        if ($cid==46) { header('Location:http://appstore.huawei.com/');exit;}
        /**
         * 排序order
         */
        $order=Q('order',0,'intval');
        /**
         * 通过id找到商品类型cat_id
         * 商品类型里添加了该类的所有属性
         */
        $cat_id=$this->category[$cid]['cat_id'];
        if (!$s) {
            /**
             * 不存在s变量,找出所有属性
             */ 
            $sql="SELECT count(*) FROM attribute a JOIN goods_attr ga 
                ON a.attr_id=ga.attr_id
                where a.cat_id=$cat_id
                GROUP BY a.attr_id";
            $count=count(M()->query($sql));
            for ($i=0; $i < $count; $i++) { 
                $s.='0-';
            }
            $s=substr($s,0,-1);
            //跳回原来的方法，加上cid和s
            go(U('Index/lists',array('cid'=>$cid,'order'=>$order,'s'=>$s)));
        }else{
            $sql="SELECT * FROM attribute a JOIN goods_attr ga
                ON a.attr_id=ga.attr_id
                WHERE a.cat_id=$cat_id
                GROUP BY a.attr_id";
            $attr=M()->query($sql);
            foreach ($attr as $k => $v) {
                $sql="select * from goods_attr ga where ga.attr_id={$v['attr_id']} group by attr_value";
                $attr[$k]['_value']=M()->query($sql);
            }
            return $attr;
        }
    }



}
