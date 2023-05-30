CREATE DATABASE your_database;
USE your_database;

CREATE TABLE your_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(255) NOT NULL
);

INSERT INTO your_table (text) VALUES ('Text 1');
INSERT INTO your_table (text) VALUES ('Text 2');
