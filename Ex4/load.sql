CREATE TABLE Persons (
    PersonID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    LastName VARCHAR(255) NOT NULL,
    FirstName VARCHAR(255) NOT NULL,
    Address VARCHAR(255),
    City VARCHAR(255),
	AGE INT(9)
);

INSERT INTO Persons (PersonID, LastName, FirstName, Address, City) VALUES ('Doe', 'John', '1 rue des bananiers', 'Paris', 25);
