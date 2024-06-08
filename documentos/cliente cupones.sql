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
	nameTarjeta NVARCHAR(100) NOT NULL,
	ccv NVARCHAR(1000) NOT NULL,
	fechaVencimiento NVARCHAR(50) NOT NULL,
	tarjeta NVARCHAR(1000) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    PurchaseDate DATETIME DEFAULT GETDATE() NOT NULL,
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);


CREATE TABLE cupone (
    id INT IDENTITY(1,1) PRIMARY KEY,
	idUser INT NOT NULL,
    empresa VARCHAR(100) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    ubicacion VARCHAR(100) NOT NULL, 
    categoria VARCHAR(100) NOT NULL,
    precio VARCHAR(100) NOT NULL,
    fecha_expira DATETIME DEFAULT GETDATE(),
    pagoID INT NOT NULL,
    img VARCHAR(500) NOT NULL,
    FOREIGN KEY (pagoID) REFERENCES Pago(id) ON DELETE CASCADE,
	FOREIGN KEY (idUser) REFERENCES Users(UserId) 
);

CREATE TABLE promocion (
    id INT IDENTITY(1,1) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cuponID INT NOT NULL,
    FOREIGN KEY (cuponID) REFERENCES cupone(id) ON DELETE CASCADE
);

