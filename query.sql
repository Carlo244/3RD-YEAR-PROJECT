1
SELECT * FROM 
    Users
WHERE 
    DateOfBirth BETWEEN '2000-01-01' AND '2004-12-31';

2
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

3
SELECT 
    GroupID,
    GroupName
FROM 
    Groups;


4
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

    
5
SELECT 
    u.UserID,
    u.FirstName,
    u.LastName
FROM 
    Friends as f
JOIN 
    Users as u 
    ON (f.FriendWhoAdded = u.UserID AND f.FriendBeingAdded = 2)
    OR (f.FriendBeingAdded = u.UserID AND f.FriendWhoAdded = 2)
WHERE 
    f.IsAccepted = TRUE;


6
SELECT 
	FriendWhoAdded,
    FriendBeingAdded,
    IsAccepted,
    DateAdded
FROM Friends 

WHERE FriendWhoAdded = 1;


7
SELECT 
	PostID,
    PostDescription,
    PostedBy,
    IsPublic,
    IsOnlyForFriends,
    GroupID,
    DatePosted
FROM 
	Posts
WHERE 
GroupID = 2
    AND IsPublic = FALSE;



8
SELECT 
    GroupMemberShipRequestsID,
    GroupMemberUserID,
    DateAccepted
FROM 
    GroupMembershipRequests
WHERE 
    GroupID = 2
    AND IsGroupMemberShipAccepted = FALSE;

