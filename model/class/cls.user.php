<?php

include_once('cls.data-mapper.php');
class User extends DataMapper
{
	public $tbl;
	
	public function Discussion($tbl)
	{
		$this->DataMapper($tbl);
		$this->tbl = $tbl;
	}
}

?>
