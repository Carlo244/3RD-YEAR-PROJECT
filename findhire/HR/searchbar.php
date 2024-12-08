<style>
.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-height: 90vh;
    align-items: center;
}


.logout {
    background-color: #ff4d4d;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    float: right;
}

.end    {
    
    float: right;

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

.app {
    background-color: #1974fe;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.app:hover {
    background-color: #0048fe;
}


</style>

<div class="container">


        
        <form method="post" action="applications.php" style="display:inline;">
        <button type="submit" class="app">Applications</button>
        </form>
        <form method="post" action="hr_dashboard.php" style="display:inline;">
        <button type="submit" class="home">Home</button>
        </form>
        <form method="post" action="messages.php" style="display:inline;">
        <button type="submit">Messages</button></form>
        <form method="post" action="../logout.php" style="display:inline;" class="end">
        <button type="submit" class="logout">Logout</button>
        </form>
   
</div>