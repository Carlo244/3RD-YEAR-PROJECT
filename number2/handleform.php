<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order = $_POST['order'];
    $quantity = $_POST['quantity'];
    $cash = $_POST['cash'];

    // Prices for each item
    $prices = [
        "Burger" => 50,
        "Fries" => 75,
        "Steak" => 150
    ];

    // Calculate total amount
    $total = $prices[$order] * $quantity;

    echo "<h1>Receipt</h1>";
    echo "<p>Total Price: " . $total . "</p>";
    echo "<p>You Paid: " . $cash . "</p>";

    if ($cash >= $total) {
        $change = $cash - $total;
        echo "<p>CHANGE: " . $change . "</p>";
    } else {
        echo "<p>Insufficient cash. You need " . ($total - $cash) . " more.</p>";
    }

    // Display date and time
    echo "<p>" . date("m/d/Y h:i:s a") . "</p>";
}
?>
