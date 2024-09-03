-- Insert Users with IDs
INSERT INTO Users (UserID, Username, FirstName, LastName, DateOfBirth, Password)
VALUES 
(1, 'alicew', 'Alice', 'Williams', '2000-01-15', 'pass123'),
(2, 'bobm', 'Bob', 'Morris', '2001-02-20', 'pass456'),
(3, 'charlieh', 'Charlie', 'Harris', '1999-03-25', 'pass789'),
(4, 'dianek', 'Diane', 'King', '2002-04-30', 'pass101'),
(5, 'edwardj', 'Edward', 'Jones', '2003-05-05', 'pass202'),
(6, 'fionas', 'Fiona', 'Smith', '2004-06-10', 'pass303'),
(7, 'georgeb', 'George', 'Brown', '2005-07-15', 'pass404'),
(8, 'hannahd', 'Hannah', 'Davis', '2006-08-20', 'pass505'),
(9, 'ianp', 'Ian', 'Parker', '1999-09-25', 'pass606'),
(10, 'jessicat', 'Jessica', 'Taylor', '2000-10-30', 'pass707');

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
(1, 'Yoga Enthusiasts', 1),
(2, 'Cooking Club', 2),
(3, 'Adventure Seekers', 3),
(4, 'Art Lovers', 4),
(5, 'Science Geeks', 5),
(6, 'Nature Photographers', 6),
(7, 'Chess Club', 7),
(8, 'Runners Team', 8),
(9, 'Film Critics', 9),
(10, 'Gourmet Chefs', 10);

-- Insert Posts with IDs
INSERT INTO Posts (PostID, PostDescription, PostedBy, IsPublic, IsOnlyForFriends, GroupID)
VALUES 
(1, 'Completed a relaxing yoga session!', 1, TRUE, FALSE, 1),
(2, 'Tried a new recipe today!', 2, FALSE, FALSE, 2),
(3, 'Planning the next adventure!', 3, FALSE, TRUE, 3),
(4, 'Visited an art gallery!', 4, TRUE, FALSE, 4),
(5, 'Discussing new scientific discoveries!', 5, FALSE, TRUE, 5),
(6, 'Captured beautiful nature photos!', 6, TRUE, FALSE, 6),
(7, 'Won a chess tournament!', 7, TRUE, FALSE, 7),
(8, 'Completed a marathon!', 8, FALSE, TRUE, 8),
(9, 'Reviewed a classic film!', 9, TRUE, FALSE, 9),
(10, 'Cooked a gourmet meal!', 10, FALSE, TRUE, 10);

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
