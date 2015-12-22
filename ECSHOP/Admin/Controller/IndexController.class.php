<?php
//测试控制器类
class IndexController extends AuthController{
	public function __init()
	{
	}
    //动作方法
    public function index(){
        //显示视图
        $this->access();
        $this->display();
    }

    public function welcome()
    {
    	$this->display();
    }

}
