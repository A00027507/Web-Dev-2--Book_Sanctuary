CREATE DATABASE IF NOT EXISTS commonplace_library
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
USE commonplace_library;

CREATE TABLE IF NOT EXISTS Users (
  Username VARCHAR(30) NOT NULL,
  PasswordHash VARCHAR(255) NOT NULL,
  FirstName VARCHAR(60) NOT NULL,
  Surname VARCHAR(60) NOT NULL,
  AddressLine1 VARCHAR(120) NOT NULL,
  AddressLine2 VARCHAR(120) NOT NULL,
  City VARCHAR(80) NOT NULL,
  Telephone VARCHAR(15) NOT NULL,
  Mobile CHAR(10) NOT NULL,
  PRIMARY KEY (Username),
  CONSTRAINT chk_users_mobile CHECK (Mobile REGEXP '^[0-9]{10}$')
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Categories (
  CategoryID CHAR(3) NOT NULL,
  CategoryDescription VARCHAR(60) NOT NULL,
  PRIMARY KEY (CategoryID),
  UNIQUE KEY uq_categories_description (CategoryDescription)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Books (
  ISBN VARCHAR(20) NOT NULL,
  BookTitle VARCHAR(180) NOT NULL,
  Author VARCHAR(120) NOT NULL,
  Edition TINYINT UNSIGNED NOT NULL DEFAULT 1,
  PublishedYear SMALLINT UNSIGNED NOT NULL,
  CategoryID CHAR(3) NOT NULL,
  PRIMARY KEY (ISBN),
  KEY ix_books_title (BookTitle),
  KEY ix_books_author (Author),
  KEY ix_books_category (CategoryID),
  CONSTRAINT fk_books_category FOREIGN KEY (CategoryID) REFERENCES Categories (CategoryID)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Reservations (
  ISBN VARCHAR(20) NOT NULL,
  Username VARCHAR(30) NOT NULL,
  ReservedDate DATE NOT NULL,
  PRIMARY KEY (ISBN),
  KEY ix_reservations_username (Username),
  CONSTRAINT fk_reservations_book FOREIGN KEY (ISBN) REFERENCES Books (ISBN)
    ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT fk_reservations_user FOREIGN KEY (Username) REFERENCES Users (Username)
    ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO Categories (CategoryID, CategoryDescription) VALUES
('001', 'Health'), ('002', 'Business'), ('003', 'Biography'), ('004', 'Technology'),
('005', 'Travel'), ('006', 'Self-Help'), ('007', 'Cookery'), ('008', 'Fiction')
ON DUPLICATE KEY UPDATE CategoryDescription = VALUES(CategoryDescription);

INSERT INTO Books (ISBN, BookTitle, Author, Edition, PublishedYear, CategoryID) VALUES
('093-403992', 'Computers in Business', 'Alicia O’Neill', 3, 1997, '002'),
('23472-8729', 'Exploring Peru', 'Stephanie Birch', 4, 2005, '005'),
('237-34823', 'Business Strategy', 'Joe Peppard', 2, 2002, '002'),
('23u8-923849', 'A Guide to Nutrition', 'John Thorpe', 2, 1997, '001'),
('2983-3494', 'Cooking for Children', 'Anabelle Sharpe', 1, 2003, '007'),
('82n8-308', 'Computers for Idiots', 'Susan O’Neill', 5, 1998, '004'),
('9823-23984', 'My Life in Picture', 'Kevin Graham', 8, 2004, '003'),
('9823-2403-0', 'DaVinci Code', 'Dan Brown', 1, 2003, '008'),
('98234-029384', 'My Ranch in Texas', 'George Bush', 1, 2005, '008'),
('9823-98345', 'How to Cook Italian Food', 'Jamie Oliver', 2, 2005, '007'),
('9823-98487', 'Optimising Your Business', 'Cleo Blair', 1, 2001, '002'),
('988745-234', 'Tara Road', 'Maeve Binchy', 4, 2002, '008'),
('993-004-00', 'My Life in Bits', 'John Smith', 1, 2001, '003'),
('9987-0039882', 'Shooting History', 'Jon Snow', 1, 2003, '003')
ON DUPLICATE KEY UPDATE BookTitle = VALUES(BookTitle), Author = VALUES(Author), Edition = VALUES(Edition), PublishedYear = VALUES(PublishedYear), CategoryID = VALUES(CategoryID);
