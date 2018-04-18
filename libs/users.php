<?php

$tableNameUser = 'users';

function getAllUsers()
{
	global $dbh;
	global $tableNameUser;
	$sql = "SELECT * FROM $tableNameUser";
	$stm = $dbh->prepare($sql);
	if ($stm->execute()) {
		return $stm->fetchAll();
	} else {
		return false;
	}
}

function getUserById($id)
{
	global $dbh;
	global $tableNameUser;
	$sql = "SELECT * FROM $tableNameUser WHERE id=:id";
	$stm = $dbh->prepare($sql);
	$data = [
		":id"=>$id
	];
	if ($stm->execute($data)) {
		return $stm->fetch();
	} else {
		return false;
	}
}

function getUserByType($type)
{
	global $dbh;
	global $tableNameUser;
	$sql = "SELECT * FROM $tableNameUser WHERE type=:type";
	$stm = $dbh->prepare($sql);
	$data = [
		":type"=>$type
	];
	if ($stm->execute($data)) {
		return $stm->fetchAll();
	} else {
		return false;
	}
}

function insertUser($username, $full_name, $email, $password, $type)
{
	global $dbh;
	global $tableNameUser;
	$sql = "INSERT INTO $tableNameUser (`username`,`full_name`,`email`, `password`, `type`) VALUES (:username, :full_name, :email, :password, :type)";
	$stm = $dbh->prepare($sql);
	$data = [
		":username" => $username,
		":full_name" => $full_name,
		":email" => $email,
		":password" => md5($password),
		":type" => $type
	];
	if ($stm->execute($data)) {
		return $dbh->lastInsertId();
	} else {
		return false;
	}
}

function deleteUserbyId($id)
{
	global $dbh;
	global $tableNameUser;
	$sql = "DELETE FROM $tableNameUser WHERE id=:id";
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

function updateUser($id, $username, $full_name, $email, $password, $type)
{
	global $dbh;
	global $tableNameUser;
	$sql = "UPDATE $tableNameUser 
			SET username = :username, full_name = :full_name, email = :email, password = :password, type = :type 
			WHERE id = $id";
	$stm = $dbh->prepare($sql);
	$data = [
		":username" => $username,
		":full_name" => $full_name,
		":email" => $email,
		":password" => md5($password),
		":type" => $type
	];
	if ($stm->execute($data)) {
		return true;
	} else {
		return false;
	}
}

function loginAdmin($username, $password, $type)
{
	global $dbh;
	global $tableNameUser;
	$sql = "SELECT full_name, id, username FROM $tableNameUser 
            WHERE username=:username AND password=:password AND type=:type";
    $stm = $dbh->prepare($sql);
    $data = [
		":username" => $username,
		":password" => md5($password),
		":type" => $type
	];
	if ($stm->execute($data)) {
		return $stm->fetch();
	} else {
		return false;
	}
}