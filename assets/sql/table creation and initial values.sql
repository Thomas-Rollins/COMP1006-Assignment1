-- @author Thomas Rollins
-- COMP1006 Assignment 1
-- Contains the intial Database table set up code

USE comp1006_assignment1;

SHOW TABLES;

DROP TABLE IF EXISTS todo_list;
DROP TABLE IF EXISTS logins;

CREATE TABLE logins (
    username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);

INSERT INTO logins (username, password) VALUES
('Thomas', '12345'),
('Tom', '54321');

CREATE TABLE todo_list (
    id INT PRIMARY KEY AUTO_INCREMENT,
    userID VARCHAR(255) NOT NULL,
    name VARCHAR(30) NOT NULL,
    completed TINYINT(1) NOT NULL DEFAULT 0,
    notes VARCHAR(1024),
    FOREIGN KEY (userid)
        REFERENCES logins (username)
);


INSERT INTO todo_list (name, userID, completed, notes) VALUES
('example one', 'Thomas', 0, 'This is the first todo item'),
('example two', 'Thomas', 1, 'this is the second todo item'),
('example three', 'Thomas', 1, 'this is the third todo item'),
('example four', 'Thomas', 0, 'this is the fourth todo item'),
('example 1', 'Tom', 0, 'This is the 1st todo item'),
('example 2', 'Tom', 1, 'this is the 2nd todo item'),
('example 3', 'Tom', 1, 'this is the 3rd todo item'),
('example 4', 'Tom', 0, 'this is the 4th todo item');

DESC todo_list;
SELECT 
    *
FROM
    todo_list;

DESC logins;
SELECT 
    *
FROM
    logins;
    
SELECT * FROM todo_list WHERE userID = 'Thomas';

