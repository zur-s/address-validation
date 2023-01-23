<?php

const DB_NAME = 'test1';
const USERNAME = 'root';
CONST PASSWORD = '';

try {
    $db = new PDO("mysql:host=127.0.0.1;dbname=".DB_NAME, USERNAME, PASSWORD);
} catch (PDOException $e) {
    die("couldn't connect to database");
}