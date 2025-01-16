CREATE DATABASE foco;

USE foco;

-- Tabla Roles
CREATE TABLE Roles (
    idRole INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Tabla Users
CREATE TABLE Users (
    idUser INT AUTO_INCREMENT PRIMARY KEY,
    idRoleFK INT NOT NULL,
    nickname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255),
    entryDate DATE,
    leavingDate DATE,
    lastLogin DATETIME,
    pfp VARCHAR(255) DEFAULT 'assets/images/defaults/profile.png',
    pronouns ENUM('he/him','she/her','they/them','') NOT NULL DEFAULT ''
    bday DATE,
    FOREIGN KEY (idRoleFK) REFERENCES Roles(idRole)
);

-- Tabla Payments
CREATE TABLE Payments (
    idPayment INT AUTO_INCREMENT PRIMARY KEY,
    idUserFK INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    paymentMethod VARCHAR(255),
    paymentDate DATE,
    status VARCHAR(50),
    transactionId VARCHAR(255),
    FOREIGN KEY (idUserFK) REFERENCES Users(idUser)
);

-- Tabla Subscriptions
CREATE TABLE Subscriptions (
    idSubscription INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    duration INT NOT NULL, -- duración en días o meses
    createdAt DATETIME,
    updatedAt DATETIME
);

-- Tabla UserSubscriptions
CREATE TABLE UserSubscriptions (
    idUserSubscription INT AUTO_INCREMENT PRIMARY KEY,
    idUserFK INT NOT NULL,
    idSubscriptionFK INT NOT NULL,
    startDate DATE,
    endDate DATE,
    isActive BOOLEAN NOT NULL,
    paymentStatus VARCHAR(50),
    FOREIGN KEY (idUserFK) REFERENCES Users(idUser),
    FOREIGN KEY (idSubscriptionFK) REFERENCES Subscriptions(idSubscription)
);

-- Tabla Entertainers
CREATE TABLE Entertainers (
    idEntertainer INT AUTO_INCREMENT PRIMARY KEY,
    idUserFK INT NOT NULL,
    isVerified BOOLEAN,
    level VARCHAR(255),
    yearsOfExperience INT,
    isGroup BOOLEAN,
    description TEXT,
    publicOpinions DECIMAL(3, 2),
    barOpinions DECIMAL(3, 2),
    musicianOpinions DECIMAL(3, 2),
    idInstrumentFK INT,
    FOREIGN KEY (idUserFK) REFERENCES Users(idUser),
    FOREIGN KEY (idInstrumentFK) REFERENCES Instruments(idInstrument)
);

-- Tabla Instruments
CREATE TABLE Instruments (
    idInstrument INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

-- Tabla Ads
CREATE TABLE Ads (
    idAd INT AUTO_INCREMENT PRIMARY KEY,
    idEntertainerFK INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    adDescription TEXT,
    price DECIMAL(10, 2) NOT NULL,
    location VARCHAR(255),
    creationDate DATETIME,
    publicRatings DECIMAL(3, 2),
    photos TEXT,
    FOREIGN KEY (idEntertainerFK) REFERENCES Entertainers(idEntertainer)
);

-- Tabla Orders
CREATE TABLE Orders (
    idOrder INT AUTO_INCREMENT PRIMARY KEY,
    idAdFK INT NOT NULL,
    isCompleted BOOLEAN NOT NULL,
    date DATETIME,
    location VARCHAR(255),
    description TEXT,
    price DECIMAL(10, 2),
    FOREIGN KEY (idAdFK) REFERENCES Ads(idAd)
);
