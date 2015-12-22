<?php 

class ConfigModel extends Model{
	public $table='config';
	/**
	 * 获得配置项
	 * @return [type] [description]
	 */
	public function get()
	{
		$data=$this->all();
		foreach ($data as $k => $v) {
			$func='_'.$v['type'];
			$data[$k]['_html']=$this->$func($v);
		}
		return $data;
	}
	/**
	 * 修改表里面的配置文件
	 * @return [type] [description]
	 */
	public function updateConfig()
	{
		foreach ($_POST as $name => $v) {
			$data['value']=$v;
			if (!$this->where("name='$name'")->save($data)) {
				$this->error='修改失败';
				return false;
			}
		}
		//修改配置文件
		return $this->creatConfig();
	}
	/**
	 * 修改配置文件
	 */
	public function creatConfig()
	{
		$data=$this->getField('name,value');
		//创建文件base.php
		$data="<?php return ".var_export($data,true)."; \n?>";
		return file_put_contents(APP_CONFIG_PATH.'base.php', $data);
	}
	/**
	 * 文本框
	 */
	private function _text($v)
	{
		return "<input type='text' value='{$v['value']}' name='{$v['name']}' class='w200'/>";
	}
	/**
	 * 文本域
	 */
	private function _textarea($v)
	{
		return "<textarea name='{$v['name']}' class='w200 h80'>{$v['value']}</textarea>";
	}
	/**
	 * 单选框
	 */
	private function _radio($v)
	{
		$info=explode('，', $v['info']);
		$html='';
		foreach ($info as $k => $val) {
			$info=explode('|', $val);
			$checked=$v['value']==$info[0]?' checked=""':'';
			$html.="<label><input type='radio' name='{$v['name']}' $checked value='{$info[0]}'/>$info[1]</label>";
		}
		return $html;
	}
}

 ?>