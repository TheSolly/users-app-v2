<?php

$tableName = 'students';

function getAll()
{
	global $dbh;
	global $tableName;
	$sql = "SELECT * FROM $tableName";
	$stm = $dbh->prepare($sql);
	if ($stm->execute()) {
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	} else {
		return false;
	}
}

function getById($id)
{
	global $dbh;
	global $tableName;
	$sql = "SELECT * FROM $tableName WHERE id=:id";
	$stm = $dbh->prepare($sql);
	$data = [
		":id"=>$id
	];
	if ($stm->execute($data)) {
		return $stm->fetch(PDO::FETCH_ASSOC);
	} else {
		return false;
	}
}

function insert($full_name, $username, $email, $password)
{
	global $dbh;
	global $tableName;
	$sql = "INSERT INTO $tableName (`username`,`full_name`,`email`,`password`) VALUES (:username, :full_name, :email, :password)";
	$stm = $dbh->prepare($sql);
	$data = [
		":username" => $username,
		":full_name" => $full_name,
		":email" => $email,
		":password" => md5($password)
	];
	if ($stm->execute($data)) {
		return $dbh->lastInsertId();
	} else {
		return false;
	}
}

function deletebyId($id)
{
	global $dbh;
	global $tableName;
	$sql = "DELETE FROM $tableName WHERE id=:id";
	$stm = $dbh->prepare($sql);
	$data = [
		":id"=>$id
	];
	if ($stm->execute($data)) {
		return true;
	} else {
		return false;
	}

}

function update($id, $username, $full_name, $email, $password)
{
	global $dbh;
	global $tableName;
	$sql = "UPDATE $tableName 
			SET id = ':id', username = ':username', full_name =  :full_name , email =  :email , password = :password 
			WHERE id = $id";
	$stm = $dbh->prepare($sql);
	$data = [
		":id" => $id,
		":username" => $username,
		":full_name" => $full_name,
		":email" => $email,
		":password" => md5($password)
	];
	if ($stm->execute($data)) {
		return true;
	} else {
		return false;
	}
}
