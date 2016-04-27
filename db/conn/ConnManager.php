<?php
class ConnManger{
	//数据库变量声明
	private $testdata;
	//构造函数
	public function ConnManger($db_conf,$mem_conf){
		if (array_key_exists('testdata', $db_conf)){
			$this->testdata = $db_conf['testdata'];
		}
	}
	//连接获取函数
	public function getConn_testdata(){
		return new ConnDb($this->testdata);
	}

}
?>