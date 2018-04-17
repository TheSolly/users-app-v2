<?php

$tableNameStudents = 'students';

function getAllStudents()
{
	global $dbh;
	global $tableNameStudents;
	$sql = "SELECT * FROM $tableNameStudents";
	$stm = $dbh->prepare($sql);
	if ($stm->execute()) {
		return $stm->fetchAll();
	} else {
		return false;
	}
}

function getStudentById($id)
{
	global $dbh;
	global $tableNameStudents;
	$sql = "SELECT * FROM $tableNameStudents WHERE id=:id";
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

function insertStudent($full_name, $username, $email, $password)
{
	global $dbh;
	global $tableNameStudents;
	$sql = "INSERT INTO $tableNameStudents (`username`,`full_name`,`email`,`password`) VALUES (:username, :full_name, :email, :password)";
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

function deleteStudentbyId($id)
{
	global $dbh;
	global $tableNameStudents;
	$sql = "DELETE FROM $tableNameStudents WHERE id=:id";
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

function updateStudent($id, $username, $full_name, $email, $password)
{
	global $dbh;
	global $tableNameStudents;
	$sql = "UPDATE $tableNameStudents 
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


function login($username, $password)
{
	global $dbh;
	global $tableNameStudents;
	$sql = "SELECT full_name, id, username FROM $tableNameStudents 
            WHERE username=:username AND password=:password";
    $stm = $dbh->prepare($sql);
    $data = [
		":username" => $username,
		":password" => md5($password)
	];
	if ($stm->execute($data)) {
		return $stm->fetch();
	} else {
		return false;
	}
}

getStudentById(0);