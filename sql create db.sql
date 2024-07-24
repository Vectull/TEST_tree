CREATE DATABASE orchard;
USE orchard;

CREATE TABLE trees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(10) NOT NULL
);


CREATE TABLE fruits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tree_id INT,
    type VARCHAR(10) NOT NULL,
    weight INT NOT NULL,
    FOREIGN KEY (tree_id) REFERENCES trees(id)
);