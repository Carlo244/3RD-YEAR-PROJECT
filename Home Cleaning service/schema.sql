CREATE TABLE users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) ,
    lastname VARCHAR(255) ,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role ENUM('cleaner', 'client') ,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE Cleaners (
    CleanerID INT PRIMARY KEY AUTO_INCREMENT,
    cleanerfirstname VARCHAR(100),
    cleanerlastname VARCHAR(100)
);  

CREATE TABLE Clients (
    CLientID INT PRIMARY KEY AUTO_INCREMENT,
    clientfirstname VARCHAR(100),
    clientlastname VARCHAR(100)
);

CREATE TABLE CleaningSchedule (
    ScheduleID INT PRIMARY KEY AUTO_INCREMENT,
    ClientID INT,
    CleanerID INT,
    CleaningDate DATE,
    CleaningTime TIME,
    Address VARCHAR(255)
    CleaningDescription TEXT,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (ClientID) REFERENCES Clients(ClientID),
    FOREIGN KEY (CleanerID) REFERENCES Cleaners(CleanerID)
);



