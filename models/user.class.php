<?php

class User
{
	private $username;
	private $full_name;
	private $email;
	private $password;
	private $type;
	private $id;
	private static $tableName = "users";

	function __construct($username, $full_name, $email, $password, $type, $id=null)
	{
		$this->username = $username;
		$this->full_name = $full_name;
		$this->email = $email;
		$this->password = $password;
		$this->type = $type;
		$this->id = $id;
	}

	public function insert()
	{
		global $dbh;

		$sql = "INSERT INTO " . self::$tableName . " (`username`,`full_name`,`email`, `password`, `type`) VALUES (:username, :full_name, :email, :password, :type)";
		$stm = $dbh->prepare($sql);

		$data = [
		":username" => $this->username,
		":full_name" => $this->full_name,
		":email" => $this->email,
		":password" => md5($this->password),
		":type" => $this->type
		];

		if ($stm->execute($data)) {
			return $dbh->lastInsertId();
		} else {
			return false;
		}
	}

	public function update()
	{
		global $dbh;

		$sql = "UPDATE " . self::$tableName .  
			" SET username = :username, full_name = :full_name, email = :email, password = :password, type = :type 
			WHERE id = :id";

		$stm = $dbh->prepare($sql);
		$data = [
			":username" => $this->username,
			":full_name" => $this->full_name,
			":email" => $this->email,
			":password" => md5($this->password),
			":id" => $this->id,
			":type" => $this->type
		];

		if ($stm->execute($data)) {
			return true;
		} else {
			return false;
		}

	}

	public static function all()
	{
		global $dbh;

		$sql = "SELECT * FROM " . self::$tableName;
		$stm = $dbh->prepare($sql);

		return ($stm->execute()) ?  $stm->fetchAll(): false ;
	}

	public static function allType($type)
	{
		global $dbh;

		$sql = "SELECT * FROM " . self::$tableName . " WHERE type=:type";
		$stm = $dbh->prepare($sql);

		$data = [
			":type"=>$type
		];

		return ($stm->execute($data)) ?  $stm->fetchAll(): false ;
	}

	public static function find($id)
	{
		global $dbh;

		$sql = "SELECT * FROM " . self::$tableName ." WHERE id=:id";
		$stm = $dbh->prepare($sql);
		$data = [
			":id"=>$id
		];

		return ($stm->execute($data)) ? $stm->fetch() : false ;
	}

	public static function delete($id)
	{
		global $dbh;

		$sql = "DELETE FROM " . self::$tableName . " WHERE id=:id";

		$stm = $dbh->prepare($sql);
		$data = [
			":id"=>$id
		];
		return ($stm->execute($data)) ? true : false ;
	}

	public static function login($username, $password, $type)
	{
		global $dbh;

		$sql = "SELECT full_name, id, username FROM " . self::$tableName . 
	            " WHERE username=:username AND password=:password AND type=:type";

	    $stm = $dbh->prepare($sql);
	    $data = [
			":username" => $username,
			":password" => md5($password),
			":type" => $type
		];

		return ($stm->execute($data)) ? $stm->fetch() : false ;
	}
}