<?php

  defined('DNS')? null :define ('DNS','mysql:host=localhost;dbname=dev_test;charset=utf8');
	defined('DB_USER')? null: define('DB_USER','admin');
	defined('DB_PASS')? null: define('DB_PASS', '00000000');


 /*  CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userid VARCHAR(255) NOT NULL ,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_session_id VARCHAR(255) NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); */

// 
