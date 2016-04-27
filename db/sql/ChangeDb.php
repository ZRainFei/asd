<?php
class ChangeDb {
	//插入数据
	public static function insert($dbCon, $tablename, $record) {
		try {
				
			$sql = "INSERT INTO $tablename VALUES(" . $record->toInsertCSV () . ");";
						echo $sql;
			$conn = $dbCon->getConn ();
			$rst = mysqli_query ( $conn, $sql );
			if (! $rst) {
				throw new Exception ();
			}
				
			$last_id = mysqli_insert_id ( $conn);
			return $last_id;
		} catch ( Exception $e ) {
			//Land_log::error(__FILE__, $sql);
			throw $e;
		}
	}
	//更新数据
	public static function update($dbCon, $tablename, $record) {
		try {
				
			$sql = "UPDATE $tablename SET " . $record->toUpdateSet () . " WHERE " . $record->toUpdateWhere ();
			//echo $sql;
			$rst = mysqli_query ( $dbCon->getConn (), $sql );
			if (! $rst) {
				throw new Exception ();
			}
		} catch ( Exception $e ) {
			//Land_log::error(__FILE__, $sql);
			throw $e;
		}
	}

	//自定义更新函数
	public static function updateSelf($dbCon, $tablename, $sqlSet, $sqlWhere) {
		try {
			$sql = "UPDATE $tablename SET " . $sqlSet . " WHERE " . $sqlWhere;

			$rst = mysqli_query ( $dbCon->getConn (), $sql );
				
			if ($rst === false) {

				throw new Exception ();
			}
				
			return mysqli_affected_rows ( $dbCon->getConn () );
		} catch ( Exception $e ) {
			Land_log::error(__FILE__, $sql);
			throw $e;
		}
	}
	//删除数据
	public static function delete($dbCon, $tablename, $record) {
		try {
				
			$sql = "DELETE FROM  $tablename  WHERE " . $record->toUpdateWhere ();
			echo $sql;
			$rst = mysqli_query ( $dbCon->getConn (), $sql );
				
			if (! $rst) {
				throw new Exception ();
			}
		} catch ( Exception $e ) {
			Land_log::error(__FILE__, $sql);
			throw $e;
		}
	}
	//自定义删除函数
	public static function deleteSelf($dbCon, $tablename, $where) {
		try {
				
			$sql = "DELETE FROM  $tablename  WHERE " . $where;

			$rst = mysqli_query ( $dbCon->getConn (), $sql );
				
			if (! $rst) {
				throw new Exception ();
			}
		} catch ( Exception $e ) {
			Land_log::error(__FILE__, $sql);
			throw $e;
		}
	}
	//缓存管理
	public static function setMem($memcache, $mstCon, $key, $value) {
		try {
			$rst = $memcache->replace ( $key, $value, MEM_EXPIRATION );
			if (! $rst) {
				$rst = $memcache->set ( $key, $value, MEM_EXPIRATION );
				self::setCacheMember ( $mstCon, $key );
			}
		} catch ( Exception $e ) {
			Land_log::error(__FILE__, $sql);
			throw $e;
		}
	}
	//缓存管理
	private static function setCacheMember($mstCon, $key) {
		try {
			$record = Brv_mng_memcache_mst_DAO::getRecord ( $key, $mstCon );
				
			if ($record == null) {
				$record = new Brv_mng_memcache_mst ( array () );
				$record->setCache_key ( $key );
				$record->setState ( STATE_YES );
				Brv_mng_memcache_mst_DAO::insert ( $record, $mstCon );
			} else {
				Brv_mng_memcache_mst_DAO::update ( $record, $mstCon );
			}
		} catch ( Exception $e ) {
			Land_log::error(__FILE__, $sql);
			throw $e;
		}
	}
}
?>