<?php

class Course
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
			":user_id" => $this->user_id,
			":name" => $this->name,
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
			" SET name = :name, user_id = :user_id
			WHERE id = :id";

		$stm = $dbh->prepare($sql);
		$data = [
			":name" => $this->name,
			":user_id" => $this->user_id,
			":id" => $this->id,
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

		$sql = "SELECT courses.*, users.full_name as teacher_name  FROM " . self::$tableName .
			" INNER JOIN users on courses.user_id=users.id";
		$stm = $dbh->prepare($sql);

		return ($stm->execute()) ? $stm->fetchAll() : false;
	}

	public static function find($id)
	{
		global $dbh;

		$sql = "SELECT courses.*, users.full_name as teacher_name FROM " . self::$tableName .
			" INNER JOIN users on courses.user_id = users.id WHERE courses.id=:id";
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


}