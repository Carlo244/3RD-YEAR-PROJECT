-- Insert Users with IDs
INSERT INTO Users (UserID, Username, FirstName, LastName, DateOfBirth, Password)
VALUES 
(1, 'johndoe', 'John', 'Doe', '1990-01-01', 'password123'),
(2, 'janedoe', 'Jane', 'Doe', '1992-02-02', 'password456'),
(3, 'michael23', 'Michael', 'Smith', '1988-03-03', 'password789'),
(4, 'susanbrown', 'Susan', 'Brown', '1995-04-04', 'password101'),
(5, 'tommiller', 'Tom', 'Miller', '1993-05-05', 'password202'),
(6, 'emilywhite', 'Emily', 'White', '1994-06-06', 'password303'),
(7, 'davidjohnson', 'David', 'Johnson', '1991-07-07', 'password404'),
(8, 'angelathomas', 'Angela', 'Thomas', '1990-08-08', 'password505'),
(9, 'roberthall', 'Robert', 'Hall', '1989-09-09', 'password606'),
(10, 'carolkent', 'Carol', 'Kent', '1992-10-10', 'password707');

-- Insert Friends with IDs
INSERT INTO Friends (FriendID, FriendWhoAdded, FriendBeingAdded, IsAccepted)
VALUES 
(1, 1, 2, TRUE),
(2, 2, 3, TRUE),
(3, 3, 4, FALSE),
(4, 4, 5, TRUE),
(5, 1, 5, TRUE),
(6, 6, 7, TRUE),
(7, 7, 8, TRUE),
(8, 8, 9, FALSE),
(9, 9, 10, TRUE),
(10, 6, 10, TRUE);

-- Insert Groups with IDs
INSERT INTO Groups (GroupID, GroupName, CreatedBy)
VALUES 
(1, 'Fitness Group', 1),
(2, 'Book Club', 2),
(3, 'Travel Enthusiasts', 3),
(4, 'Music Lovers', 4),
(5, 'Tech Innovators', 5),
(6, 'Photography Enthusiasts', 6),
(7, 'Gaming Club', 7),
(8, 'Cycling Team', 8),
(9, 'Movie Buffs', 9),
(10, 'Foodies', 10);

-- Insert Posts with IDs
INSERT INTO Posts (PostID, PostDescription, PostedBy, IsPublic, IsOnlyForFriends, GroupID)
VALUES 
(1, 'Morning workout complete!', 1, TRUE, FALSE, 1),
(2, 'Reading a new mystery novel!', 2, TRUE, FALSE, 2),
(3, 'Excited for the next trip!', 3, FALSE, TRUE, 3),
(4, 'Loving this new music album!', 4, TRUE, FALSE, 4),
(5, 'Exploring new tech trends!', 5, FALSE, TRUE, 5),
(6, 'Captured some amazing sunset shots!', 6, TRUE, FALSE, 6),
(7, 'Excited for the new game release!', 7, TRUE, FALSE, 7),
(8, 'Just completed a 50-mile bike ride!', 8, FALSE, TRUE, 8),
(9, 'Watched a classic movie today!', 9, TRUE, FALSE, 9),
(10, 'Tried a new restaurant and loved it!', 10, FALSE, TRUE, 10);

-- Insert Group Membership Requests with IDs
INSERT INTO GroupMembershipRequests (GroupMemberShipRequestsID, GroupID, GroupMemberUserID, IsGroupMemberShipAccepted)
VALUES 
(1, 1, 2, TRUE),
(2, 2, 3, TRUE),
(3, 3, 4, FALSE),
(4, 4, 5, TRUE),
(5, 5, 1, TRUE),
(6, 6, 7, TRUE),
(7, 7, 8, TRUE),
(8, 8, 9, FALSE),
(9, 9, 10, TRUE),
(10, 10, 6, TRUE);
