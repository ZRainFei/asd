<?php
class Node_inf {

	// 数组
	private $array;
	public function Node_inf($array) {
		$this->array = $array;

		self::setDefault ();
	}
	private function setDefault() {
		if (count ( $this->array ) == 0) {
			self::setId ( 0 );
			self::setName ( "" );
			self::setnDesc ( "" );
		}
	}
	public function setId($value) {
		$this->array = array_merge ( $this->array, array (
				'id' => $value
		) );
	}
	public function getId() {
		return $this->array ['id'];
	}
	public function setName($value) {
		$this->array = array_merge ( $this->array, array (
				'name' => $value
		) );
	}
	public function getName() {
		return $this->array ['name'];
	}
	public function setnDesc($value) {
		$this->array = array_merge ( $this->array, array (
				'nDesc' => $value
		) );
	}
	public function getnDesc() {
		return $this->array ['nDesc'];
	}
	
	public function toInsertCSV() {
		$str = "";

		// id
		$str .= self::getId () . ",";

		// name
		$str .= "'".self::getName () . "',";

		// nDesc
		$str .= "'".self::getnDesc () . "'";

		return $str;
	}
	public function toUpdateSet() {
		$str = "";

		// name
		$str .= "name = '" . self::getName () . "',";

		// password
		$str .= "nDesc = '" . self::getnDesc () . "'";

		//$str .= "updatedate = now()";
		return $str;
	}
	public function toUpdateWhere(){
		$str = "";
		$str .= "ID = '" . self::getId()."'";
		return $str;
	}
}
class Node_inf_DAO {
	private static $TABLENAME = 'NODE';
	//根据id获取记录
	public static function getRecord($id, $dbCon) {
		$where = "id = $id";
		$record = SearchDb::getRecord ( $dbCon, static::$TABLENAME, $where );
		if ($record != null) {
			return new Node_inf ( $record );
		}
		return null;
	}
	public static function getList($dbCon) {
		$where = "";
		$list = SearchDb::getList ( $dbCon, static::$TABLENAME, $where );
		$results = array ();

		foreach ( $list as $record ) {
			array_push ( $results, new Node_inf ( $record ) );
		}
		return $results;
	}
	public static function getListArray($dbCon) {
		$where = "";
		$list = SearchDb::getList ( $dbCon, static::$TABLENAME, $where );
		$results = array ();
		foreach ( $list as $record ) {
			$strcture =  new Node_inf($record);
			$results [$strcture->getId()] = $strcture->getName();
		}
		return $results;
	}
	public static function getListByName($nName,$dbCon) {
		$where = "NAME like '%$nName%' ORDER BY ID";
	
		$list = SearchDb::getList($dbCon,static::$TABLENAME,$where);
		$results = array();
	
		foreach($list as $record){
			array_push ( $results, new Node_inf($record));
		}
		return $results;
	}	
	public static function insert($record, $dbCon) {
		try {
				
			$id = $record->getId ();
			$oldrecord = self::getRecord ( $id, $dbCon );
			if ($oldrecord != null) {
				throw new Exception ( "重复插入" );
			}
			ChangeDb::insert ( $dbCon, static::$TABLENAME, $record );
		} catch ( Exception $e ) {
			throw $e;
		}
	}
	public static function update($record, $dbCon) {
		try {
			$id = $record->getId ();
			$oldrecord = self::getRecord ( $id, $dbCon );
			if ($oldrecord == null) {
				throw new Exception ( "不存在该记录" );
			}
			ChangeDb::update ( $dbCon, static::$TABLENAME, $record );
		} catch ( Exception $e ) {
			throw $e;
		}
	}
	public static function delete($record, $dbCon) {
		try {
			$id = $record->getId ();
			$oldrecord = self::getRecord ( $id, $dbCon );
			if ($oldrecord == null) {
				throw new Exception ( "不存在该记录" );
			}
			ChangeDb::delete ( $dbCon, static::$TABLENAME, $record );
		} catch ( Exception $e ) {
			throw $e;
		}
	}
}

?>