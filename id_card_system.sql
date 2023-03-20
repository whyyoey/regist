CREATE DATABASE userdb;
USE userdb;

CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    region_id INT(11) NOT NULL,
    city_id INT(11) NOT NULL
);

CREATE TABLE regions (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    region_name VARCHAR(50) NOT NULL
);

CREATE TABLE cities (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    city_name VARCHAR(50) NOT NULL,
    region_id INT(11) NOT NULL
);
