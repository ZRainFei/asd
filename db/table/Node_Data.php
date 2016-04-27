<?php
class Node_Data {

	// 数组
	private $array;
	public function Node_Data($array) {
		$this->array = $array;

		self::setDefault ();
	}
	private function setDefault() {
		if (count ( $this->array ) == 0) {
			self::setId ( "" );
			self::setnId ( 0 );
			self::setnData ( "" );
			self::setnTime ( "" );
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
	public function setnId($value) {
		$this->array = array_merge ( $this->array, array (
				'nId' => $value
		) );
	}
	public function getnId() {
		return $this->array ['nId'];
	}
	public function setnData($value) {
		$this->array = array_merge ( $this->array, array (
				'nData' => $value
		) );
	}
	public function getnData() {
		return $this->array ['nData'];
	}
	public function setnTime($value) {
		$this->array = array_merge ( $this->array, array (
				'nTime' => $value
		) );
	}
	public function getnTime() {
		return $this->array ['nTime'];
	}
	
	public function toInsertCSV() {
		$str = "";

		// id
		$str .= "'',";

		// name
		$str .= "'".self::getnId () . "',";

		// nData
		$str .= "'".self::getnData () . "',";

		// nTime
		$str .= "'".self::getnTime () . "'";
		
		return $str;
	}
	public function toUpdateSet() {
		$str = "";

		// name
		$str .= "nId = '" . self::getnId () . "',";

		// password
		$str .= "nData = '" . self::getnData () . "";

		//$str .= "updatedate = now()";
		return $str;
	}
}
class Node_Data_DAO {
	private static $TABLENAME = 'NODEDATA';
	//根据id获取记录
	public static function getRecord($id, $dbCon) {
		$where = "id = $id";
		$record = SearchDb::getRecord ( $dbCon, static::$TABLENAME, $where );
		if ($record != null) {
			return new Node_Data ( $record );
		}
		return null;
	}	

	public static function getList($dbCon) {
		$where = "";
		$list = SearchDb::getList ( $dbCon, static::$TABLENAME, $where );
		$results = array ();

		foreach ( $list as $record ) {
			array_push ( $results, new Node_Data ( $record ) );
		}
		return $results;
	}
	public static function getListArray($dbCon) {
		$where = "";
		$list = SearchDb::getList ( $dbCon, static::$TABLENAME, $where );
		$results = array ();
		foreach ( $list as $record ) {
			$strcture =  new Node_Data($record);
			$results [$strcture->getId()] = $strcture->getName();
		}
		return $results;
	}
	public static function getListByName($nName,$dbCon) {
		$where = "nID like '%$nName%' ORDER BY nTime";
	
		$list = SearchDb::getList($dbCon,static::$TABLENAME,$where);
		$results = array();
	
		foreach($list as $record){
			array_push ( $results, new Node_Data($record));
		}
		return $results;
	}
	public static function getDataNum($dbCon) {
		$where = "";
		$record = SearchDb::getLinesNum( $dbCon, static::$TABLENAME, $where );
		if ($record != null) {
			return $record;
		}
		return null;
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