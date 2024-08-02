CREATE DATABASE uwanja;
USE uwanja;
CREATE TABLE pitches (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(25),img varchar(30));
INSERT INTO pitches (name,img) VALUES ('Basket court', '/assets/img/basket1.avif'), ('Basket court mini', '/assets/img/basket2.jpg'), ('Football pitch', '/assets/img/foot1.jpg'), ('Football pitch mini', '/assets/img/foot2.jpg'), ('Hanball court', '/assets/img/hand1.jpg'), ('Hanball court mini', '/assets/img/hand2.jpg'), ('Swimming pool', '/assets/img/pool1.jpg'), ('Swimming pool mini', '/assets/img/pool2.avif'), ('Rugby pitch', '/assets/img/rugby1.jpg'), ('Rugby pitch mini', '/assets/img/rugby2.webp'), ('Tennis pitch', '/assets/img/tennis1.avif'), ('Tennis pitch mini', '/assets/img/tennis2.jpg'), ('Volleyball pitch', '/assets/img/volley1.jpg'), ('Volleyball pitch mini', '/assets/img/volley2.jpg');

CREATE TABLE role (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(6));
INSERT INTO role (name) VALUES ('user'), ('admin');
CREATE TABLE users (id INT PRIMARY KEY AUTO_INCREMENT, fname VARCHAR(15), lname VARCHAR(15), username VARCHAR(8), email VARCHAR(20), password VARCHAR(20),role INT, FOREIGN KEY (role) REFERENCES role(id));

