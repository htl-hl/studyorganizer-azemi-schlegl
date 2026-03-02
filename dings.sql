-- Erstellung der Datenbank (optional)
-- CREATE DATABASE HausaufgabenPlaner;
-- USE HausaufgabenPlaner;

-- 1. Tabelle: Fächer 
create database schleger;
use database schleger; 
CREATE TABLE Faecher (
    name VARCHAR(50) PRIMARY KEY -- Name ist Unique
);

-- 2. Tabelle: User
CREATE TABLE User (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Uname VARCHAR(50) NOT NULL UNIQUE, -- U markiert
    g_Password VARCHAR(255),           -- generiertes Passwort
    Password VARCHAR(255) NOT NULL
);

-- 3. Tabelle: Lehrer
CREATE TABLE Lehrer (
    LID INT PRIMARY KEY AUTO_INCREMENT , 
    Lname VARCHAR(100) NOT NULL,
    Fach VARCHAR(50),
    Aktiv BOOLEAN DEFAULT TRUE,
    -- Fremdschlüssel zu Fächer 
    CONSTRAINT fk_lehrer_fach FOREIGN KEY (Fach) REFERENCES Faecher(name)
);

-- 4. Tabelle: Hausaufgabe
CREATE TABLE Hausaufgabe (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Titel VARCHAR(100) NOT NULL,
    Beschr TEXT,
    Fachname VARCHAR(50),
    Erledigt BOOLEAN DEFAULT FALSE,
    Faelligkeitsdatum DATE,
    -- Fremdschlüssel zu Fächer
    CONSTRAINT fk_homework_fach FOREIGN KEY (Fachname) REFERENCES Faecher(name)
);
-- weil halt so  haha