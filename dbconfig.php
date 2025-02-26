<?php
$db = new SQLite3('library.db');
$query = "CREATE TABLE IF NOT EXISTS users (id integer primary key autoincrement , name text, dni integer)";
$db->exec($query);
