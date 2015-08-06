<?php
include('/../connect.php');
class DataMapper
{
	public $tbl;

	public function DataMapper($tbl)
	{
		$this->tbl = $tbl;
	}

	public function select($arrWhere=array())
	{
		$sql = "SELECT * FROM $this->tbl";

		if(count($arrWhere) >0)
		{
			foreach($arrWhere as $columnName=>$columnValue)
			{
				$arrW[] = " `$columnName` = \"$columnValue\" ";
			}

			$sql .= " WHERE ".implode(' AND ',$arrW);
		}

		$result = mysql_query($sql);
		
		$json = array();
		
		while($row = mysql_fetch_assoc($result)){
			 $json[] = $row;
		}
		// if(!$result)
			// die(mysql_errno() . ": " . mysql_error() . "\n");
		
		// if(is_array($result)){
			// return $result;
			
		// }
		
		return $json;
	}

	public function insert($arrValue=array())
	{
		$sql = "INSERT INTO $this->tbl (";
		if(count($arrValue) > 0)
		{
			foreach($arrValue as $columnName=>$columnValue)
			{
				$arrCN[] = "$columnName";
				$arrCV[] = "'$columnValue'";
			}

			$sql .= implode(',',$arrCN).") VALUES (".implode(',',$arrCV).")";
		}

		$result = mysql_query($sql);
		
		$id = mysql_insert_id();

		if(!$result)
			die(mysql_errno() . ": " . mysql_error() . "\n");
		
		return $id;
	}

	public function update($arrValue=array(),$arrWhere=array())
	{
		$sql = "UPDATE $this->tbl SET ";
		if(count($arrValue) >0)
		{
			foreach($arrValue as $columnName=>$columnValue)
			{
				$arrV[] = " `$columnName` = \"$columnValue\" ";
			}

			$sql .= implode(', ',$arrV)." WHERE ";
		}
		if(count($arrWhere) >0)
		{
			foreach($arrValue as $columnName=>$columnValue)
			{
				$arrV[] = " `$columnName` = \"$columnValue\" ";
			}

			$sql .= implode(' AND ',$arrW);
		}
		$result = mysql_query($sql);
		
		if(!$result)
			die(mysql_errno() . ": " . mysql_error() . "\n");
		
		return true;
	}

	public function delete($arrWhere=array())
	{
		$sql = "DELETE FROM $this->tbl";

		if(count($arrWhere) >0)
		{
			foreach($arrWhere as $columnName=>$columnValue)
			{
				$arrW[] = " `$columnName` = \"$columnValue\" ";
			}

			$sql .= " WHERE ".implode(', ',$arrW);
		}
		
		$result = mysql_query($sql);
		
		if(!$result)
			die(mysql_errno() . ": " . mysql_error() . "\n");
		
		return true;
	}
}

?>
