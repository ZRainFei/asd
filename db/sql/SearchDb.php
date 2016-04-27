<?php
class SearchDb {
	//获取一条记录
	public static function getRecord($dbCon, $tablename, $where) {
		try {
				
			$rs = self::quiry ( $dbCon, $tablename, $where );
				
			while ( $arr_item = mysqli_fetch_assoc ( $rs ) ) {
				return $arr_item;
			}
				
			return null;
		} catch ( Exception $e ) {
			throw $e;
		}
	}
	//获取多条记录
	public static function getList($dbCon, $tablename, $where) {
		try {
				
			$rs = self::quiry ( $dbCon, $tablename, $where );
				
			$rsArray = array ();
			if (mysqli_num_rows ( $rs ) != 0) {
				while ( $arr_item = mysqli_fetch_assoc ( $rs ) ) {
					array_push ( $rsArray, $arr_item );
				}
			}
				
			return $rsArray;
		} catch ( Exception $e ) {
			throw $e;
		}
	}
	//基本查询函数
	private static function quiry($dbCon, $tablename, $where) {
		try {

			$sql = "SELECT * FROM $tablename";
			if ($where != null && $where != "") {
				$sql .= " WHERE $where";
			}
			echo $sql;
			$rs = mysqli_query ( $dbCon->getConn (), $sql );
			return $rs;
		} catch ( Exception $e ) {
			//Land_log::error(__FILE__, $sql);
			throw $e;
		}
	}
	//自定义sql语句查询函数
	public static function quiryLines($dbCon, $sql) {
		try {
			$rs = mysqli_query ( $dbCon->getConn (), $sql );

			$rsArray = array ();
			while ( $arr_item = mysqli_fetch_assoc ( $rs ) ) {
				array_push ( $rsArray, $arr_item );
			}

			return $rsArray;
		} catch ( Exception $e ) {
			//Land_log::error(__FILE__, $sql);
			throw $e;
		}
	}
	//获取记录条数
	public static function getLinesNum($dbCon, $tablename, $where) {
		try {
		$sql = "SELECT count(*) FROM $tablename";
			if ($where != null && $where != "") {
				$sql .= " WHERE $where";
			}
			echo $sql;echo "123";
			$rs = mysqli_field_count ( $dbCon->getConn (), $sql );
			echo $rs;
			return $rs;
		} catch ( Exception $e ) {
			//Land_log::error(__FILE__, $sql);
			throw $e;
		}
		
	}
	//获取缓存中的记录
	public static function getListMem($mstCon, $memCon, $tablename) {
		try {
			if (USE_MEMCHACHE) {

				$memTableName = MEM_CACHE_PREFIX . $tablename;

				$memcache = $memCon->getConn ();
				$rsArray = $memcache->get ( $memTableName );

				$varType = gettype ( $rsArray );

				if ($varType != "array" || ! $rsArray) {

					$rsArray = self::getList ( $mstCon, $tablename, "" );
						
					Recorder::setMem ( $memcache, $mstCon, $memTableName, $rsArray );
				}
			} else {

				global $connMgr;
				$connRep = $connMgr->getConMainRep ();
				$rsArray = self::getList ( $connRep, $tablename, "" );
			}
				
			return $rsArray;
		} catch ( Exception $e ) {
			throw $e;
		}
	}
	//获取缓存数据
	public static function getMem($memcacheKey, $memCon) {
		$memKeyName = MEM_CACHE_PREFIX . $memcacheKey;

		$memcache = $memCon->getConn ();
		$rsArray = $memcache->get ( $memKeyName );

		return $rsArray;
	}
}
?>