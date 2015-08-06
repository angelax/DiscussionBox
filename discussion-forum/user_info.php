<?php

class Recipe
{	
	public $conn;
	public $tbl;
	public function Recipe($conn, $tbl)
	{
		$this->conn = $conn;
		$this->tbl = $tbl;
	}
	
	public function get_recipe() {

		if(isset($_GET['page'])) {
			$page = $_GET['page'];
		}
		else {
			$page = 1;
		}
		$skip = ($page - 1) * NUM_ON_PAGE;
		if(isset($_GET['search'])) 
		{
			$sql = "SELECT * FROM ".$this->tbl." WHERE title LIKE '%".$_GET['search']."%' OR recipe_id='".$_GET['search']."' OR datestring='".$_GET['search']."' ORDER BY datestring DESC, language ASC limit ".$skip.", ".NUM_ON_PAGE;
		}
		else 
		{
			$sql = "SELECT * FROM ".$this->tbl." ORDER BY datestring DESC, language ASC limit ".$skip.", ".NUM_ON_PAGE;
		}

		$result = mysql_query($sql);
		return $result;
	}
	
	public function count_pages() {
		if(isset($_GET['search'])) 
		{
			$sql = "SELECT COUNT(*) AS count FROM ".$this->tbl." WHERE title LIKE '%".$_GET['search']."%' OR recipe_id=".$_GET['search']." OR datestring=".$_GET['search'];
		}
		else {
			$sql = "SELECT COUNT(*) AS count FROM ".$this->tbl;
		}
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result); 
		
		if($row["count"] % NUM_ON_PAGE == 0) { 
			$num = $row["count"]/NUM_ON_PAGE;
		} else { 
			$num = ($row["count"] - ($row["count"] % NUM_ON_PAGE)) /NUM_ON_PAGE + 1;
		}
		return $num;
		return $count;
	}	

	public function edit_recipe() {
		
		if (isset($_REQUEST['save'])) 
		{
			$sql = "UPDATE ".$this->tbl." SET recipe_id = ".$_REQUEST['recipe_id'].", title = \"".$_REQUEST['title']."\", language = \"".$_REQUEST['language']."\", image_src = \"".$_REQUEST['image_src']."\", datestring = \"".$_REQUEST['datestring']."\", url = \"".$_REQUEST['url']."\" WHERE id = ".$_GET['id'];
			$result = mysql_query($sql, $this->conn);
			if(!$result) {
				die();
			}
			
		}
	
		if(isset($_GET['id'])) 
		{
			$sql = "SELECT * FROM ".$this->tbl." WHERE id = ".$_GET['id'];
			$result = mysql_query($sql, $this->conn);
			return mysql_fetch_assoc($result);
		} 
	}	
}

?>
