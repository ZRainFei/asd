<?php
class ConnDb {
	private $host;
	private $user;
	private $passwd;
	private $db_name;
	private $encode;
	private $conn;
	// 构造函数
	public function ConnDb($array) {
		$this->host = $array ['host'];
		$this->user = $array ['user'];
		$this->passwd = $array ['passwd'];
		$this->db_name = $array ['db_name'];
		$this->encode = $array ['encode'];
	}

	// 获取数据库连接
	public function getConn() {
		try {
			// 连接到Mysql
			$db = mysqli_connect ( $this->host, $this->user, $this->passwd );
			// 连接到数据库
			mysqli_query ( $db, "set names " . $this->encode );
			mysqli_select_db ( $db, $this->db_name );
			$this->conn = $db;
			return  $db;
		} catch ( Exception $e ) {
			throw e;
		}
	}

	// 事务开始
	public function startTransaction() {
		try {
				
			mysqli_query ( $this->conn, 'set autocommit = 0' );
			mysqli_query ( $this->conn, 'begin' );

		} catch ( Exception $e ) {
			throw e;
		}
	}

	// 事物提交，结束
	public function commit() {
		try {
			mysqli_query ( $this->conn, 'commit' );
		} catch ( Exception $e ) {
			throw e;
		}
	}

	// 回滚
	public function rollback() {
		try {
			mysqli_query ( $this->conn, 'rollback' );
		} catch ( Exception $e ) {
			throw e;
		}
	}
}
?>