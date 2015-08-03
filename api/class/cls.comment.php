<?php

include_once('cls.data-mapper.php');
class Comment extends DataMapper
{
	public $tbl;
	
	public function Comment($tbl)
	{
		$this->DataMapper($tbl);
		$this->tbl = $tbl;
	}
}

?>
