CREATE DATABASE test;
 use test;

CREATE TABLE login (
                       id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       name VARCHAR(30) NOT NULL,
                       email VARCHAR(50) NOT NULL,
                       password VARCHAR(60)
);

CREATE TABLE productList(
                        productID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        productName VARCHAR(30) NOT NULL,
                        productDescription VARCHAR(100) NOT NULL,
                        price INT(4) NOT NULL
);
CREATE TABLE users (
                       id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       firstname VARCHAR(30) NOT NULL,
                       lastname VARCHAR(30) NOT NULL,
                       email VARCHAR(100) NOT NULL,
                       age INT(3),
                       location VARCHAR(50),
                       date TIMESTAMP
);