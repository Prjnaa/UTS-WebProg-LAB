<?php

define("DSN", "mysql:host=localhost;dbname=todo_list");
define("DBUSER", "root");
define("DBPASS", "");

$db = new PDO(DSN, DBUSER, DBPASS);

