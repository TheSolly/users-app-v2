<?php

function getAllUsers()
{
	global $dbh;
	$sql = "SELECT * FROM `users`";
	$stm = $dbh->prepare($sql);
	if ($stm->execute()) {
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	} else {
		return false;
	}
}

function getUserById($id)
{
	global $dbh;
	$sql = "SELECT * FROM `users` WHERE id=$id";
	$stm = $dbh->prepare($sql);
	if ($stm->execute()) {
		return $stm->fetch(PDO::FETCH_ASSOC);
	} else {
		return false;
	}
}

function insertUser($full_name, $username, $password)
{
	global $dbh;
	$sql = "INSERT INTO users (`username`,`full_name`,`password`) VALUES ('$username', '$full_name', '$password')";
	$stm = $dbh->prepare($sql);
	if ($stm->execute()) {
		return $dbh->lastInsertId();
	} else {
		return false;
	}
}

function deleteUserbyId($id)
{
	global $dbh;
	$sql = "DELETE FROM `users` WHERE id=$id";
	$stm = $dbh->prepare($sql);
	if ($stm->execute()) {
		return true;
	} else {
		return false;
	}

}

function updateUser($id, $username, $full_name, $password)
{
	global $dbh;
	$sql = "UPDATE `users` 
			SET username = '$username', full_name = '$full_name', password = 12345678 
			WHERE id = $id";
	$stm = $dbh->prepare($sql);
	if ($stm->execute()) {
		return true;
	} else {
		return false;
	}
}
