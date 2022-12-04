<?php

function dbConnect()
{
	static $db;
	if ($db === null) {
		$db = new PDO(
			'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
			DB_USER,
			DB_PASS,
			[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
		);
		$db->exec('SET NAMES UTF8');
	}
	return $db;
}

function dbQuery($sql, $params = [])
{
	$db = dbConnect();
	$query = $db->prepare($sql);
	$query->execute($params);
	return $query;
}
