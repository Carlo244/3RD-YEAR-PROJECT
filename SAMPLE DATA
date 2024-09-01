-- Create Users Table
CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50),
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    DateOfBirth DATE,
    Password VARCHAR(255),
    DateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Friends Table
CREATE TABLE Friends (
    FriendID INT AUTO_INCREMENT PRIMARY KEY,
    FriendWhoAdded INT,
    FriendBeingAdded INT,
    IsAccepted BOOLEAN,
    DateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Create Groups Table
CREATE TABLE Groups (
    GroupID INT AUTO_INCREMENT PRIMARY KEY,
    GroupName VARCHAR(100),
    CreatedBy INT,
    DateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Create Posts Table
CREATE TABLE Posts (
    PostID INT AUTO_INCREMENT PRIMARY KEY,
    PostDescription VARCHAR(255),
    PostedBy INT,
    IsPublic BOOLEAN,
    IsOnlyForFriends BOOLEAN,
    GroupID INT,
    DatePosted TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Group Membership Requests Table
CREATE TABLE GroupMembershipRequests (
    GroupMemberShipRequestsID INT AUTO_INCREMENT PRIMARY KEY,
    GroupID INT,
    GroupMemberUserID INT,
    IsGroupMemberShipAccepted BOOLEAN,
    DateAccepted TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Insert Users with IDs
INSERT INTO Users (UserID, Username, FirstName, LastName, DateOfBirth, Password)
VALUES 
(1, 'johndoe', 'John', 'Doe', '1990-01-01', 'password123'),
(2, 'janedoe', 'Jane', 'Doe', '1992-02-02', 'password456'),
(3, 'michael23', 'Michael', 'Smith', '1988-03-03', 'password789'),
(4, 'susanbrown', 'Susan', 'Brown', '1995-04-04', 'password101'),
(5, 'tommiller', 'Tom', 'Miller', '1993-05-05', 'password202');

-- Insert Friends with IDs
INSERT INTO Friends (FriendID, FriendWhoAdded, FriendBeingAdded, IsAccepted)
VALUES 
(1, 1, 2, TRUE),
(2, 2, 3, TRUE),
(3, 3, 4, FALSE),
(4, 4, 5, TRUE),
(5, 1, 5, TRUE);

-- Insert Groups with IDs
INSERT INTO Groups (GroupID, GroupName, CreatedBy)
VALUES 
(1, 'Fitness Group', 1),
(2, 'Book Club', 2),
(3, 'Travel Enthusiasts', 3),
(4, 'Music Lovers', 4),
(5, 'Tech Innovators', 5);

-- Insert Posts with IDs
INSERT INTO Posts (PostID, PostDescription, PostedBy, IsPublic, IsOnlyForFriends, GroupID)
VALUES 
(1, 'Morning workout complete!', 1, TRUE, FALSE, 1),
(2, 'Reading a new mystery novel!', 2, TRUE, FALSE, 2),
(3, 'Excited for the next trip!', 3, FALSE, TRUE, 3),
(4, 'Loving this new music album!', 4, TRUE, FALSE, 4),
(5, 'Exploring new tech trends!', 5, FALSE, TRUE, 5);

-- Insert Group Membership Requests with IDs
INSERT INTO GroupMembershipRequests (GroupMemberShipRequestsID, GroupID, GroupMemberUserID, IsGroupMemberShipAccepted)
VALUES 
(1, 1, 2, TRUE),
(2, 2, 3, TRUE),
(3, 3, 4, FALSE),
(4, 4, 5, TRUE),
(5, 5, 1, TRUE);
