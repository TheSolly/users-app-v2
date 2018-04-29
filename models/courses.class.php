<?php

class User
{
	private $user_id;
	private $name;
	private $id;
	private static $tableName = "courses";

	function __construct($name, $user_id, $id = null)
	{
		$this->user_id = $user_id;
		$this->name = $name;
		$this->id = $id;
	}

	public function insert()
	{
		global $dbh;

		$sql = "INSERT INTO " . self::$tableName . " (`user_id`,`name`) VALUES (:user_id, :name)";
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

		return ($stm->execute()) ? $stm->fetchAll() : false;
	}

	public static function allType($type)
	{
		global $dbh;

		$sql = "SELECT * FROM " . self::$tableName . " WHERE type=:type";
		$stm = $dbh->prepare($sql);

		$data = [
			":type" => $type
		];

		return ($stm->execute($data)) ? $stm->fetchAll() : false;
	}

	public static function find($id)
	{
		global $dbh;

		$sql = "SELECT * FROM " . self::$tableName . " WHERE id=:id";
		$stm = $dbh->prepare($sql);
		$data = [
			":id" => $id
		];

		return ($stm->execute($data)) ? $stm->fetch() : false;
	}

	public static function delete($id)
	{
		global $dbh;

		$sql = "DELETE FROM " . self::$tableName . " WHERE id=:id";

		$stm = $dbh->prepare($sql);
		$data = [
			":id" => $id
		];
		return ($stm->execute($data)) ? true : false;
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

		return ($stm->execute($data)) ? $stm->fetch() : false;
	}
}