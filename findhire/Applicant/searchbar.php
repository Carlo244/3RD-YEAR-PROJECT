<style>
.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-height: 90vh;
    
}
.button-container-wrapper{
    display: flex; 
    justify-content: space-between;
    align-items: auto;
}

.button-container1 { 
    display: inline; 
    gap: 10px;
    align-self: flex-start;
}

.button-container2 {
    float: right;
    align-self: flex-end;
}
.logout {
    background-color: #ff4d4d;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.logout:hover {
    background-color: #e60000;
}


.home {
    background-color: #e88504;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.home:hover {
    background-color: #fc7a00;
}

.message {
    padding: 10px 20px;
    color: #fff;
    background-color: #4caf50;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: 0.3s ease;
  }
  
  .message:hover {
    background-color: #45a049;
    }
</style>

<div class="container">

    
    <div class="button-container-wrapper">
        <div class="button-container1">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <input type="text" name="searchInput" placeholder="Search here" value="<?php echo isset($_GET['searchInput']) ? htmlspecialchars($_GET['searchInput']) : ''; ?>">
        <input type="submit" value="Search" class="message">
        </form>
        </div>
    <div class="button-container2">
        <form method="post" action="applicant_dashboard.php" style="display:inline;">
        <button type="submit" class="home">Home</button>
        </form>
        <form method="post" action="messages.php" style="display:inline;">
        <button type="submit" class="message">Messages</button></form>
        <form method="post" action="../logout.php" style="display:inline;">
        <button type="submit" class="logout">Logout</button>
        </form>
    </div>
</div>
</div>