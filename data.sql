-- Select all users born between January 1, 2000 and December 31, 2004
SELECT 
    UserID,
    Username,
    FirstName,
    LastName,
    DateOfBirth
FROM 
    Users
WHERE 
    DateOfBirth BETWEEN '2000-01-01' AND '2004-12-31';


-- Select all posts written by the user with UserID = 4
SELECT 
    PostID,
    PostDescription,
    IsPublic,
    IsOnlyForFriends,
    GroupID,
    DatePosted
FROM 
    Posts
WHERE 
    PostedBy = 4;

-- Select all group names from the Groups table
SELECT 
    GroupID,
    GroupName
FROM 
    Groups;


-- Select all group membership requests made by the user with UserID = 2
SELECT 
    g.GroupID,
    g.GroupName,
    gmr.GroupMemberShipRequestsID,
    gmr.IsGroupMemberShipAccepted,
    gmr.DateAccepted
FROM 
    GroupMembershipRequests gmr
JOIN 
    Groups g 
    ON gmr.GroupID = g.GroupID
WHERE 
    gmr.GroupMemberUserID = 2;

SELECT * FROM GroupMembershipRequests
WHERE GroupMemberUserID IS 2


