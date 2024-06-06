--create database cliente_cupones;

use cliente_cupones;

CREATE TABLE Users (
    UserId INT IDENTITY(1,1) PRIMARY KEY,
    FirstName NVARCHAR(50) NOT NULL,
    LastName NVARCHAR(50) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Email NVARCHAR(100) NOT NULL UNIQUE,
    Password NVARCHAR(255) NOT NULL
);


-- Crear la tabla de boletos
CREATE TABLE Pago (
    id INT IDENTITY(1,1) PRIMARY KEY,
    UserId INT NOT NULL,
    Cupon INT NOT NULL,
	tarjeta NVARCHAR(50) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    PurchaseDate DATETIME NOT NULL,
    FOREIGN KEY (UserId) REFERENCES Users(UserId),
    
);
GO