<?php

// Student information
$studentName = "Rahim Ahmed";
$studentID = "23-12345-1";

// Food information
$choice = 1;
$quantity = 6;

// Determine food and price using switch-case
switch ($choice) {
    case 1:
        $foodItem = "Burger";
        $price = 5;
        break;

    case 2:
        $foodItem = "Pizza";
        $price = 8;
        break;

    case 3:
        $foodItem = "Sandwich";
        $price = 4;
        break;

    case 4:
        $foodItem = "Coffee";
        $price = 3;
        break;

    default:
        $foodItem = "Invalid Item";
        $price = 0;
        break;
}

// Calculate subtotal
$total = $price * $quantity;

// Calculate discount using if-else
if ($total >= 30) {
    $discount = 20;
} elseif ($total >= 20) {
    $discount = 10;
} else {
    $discount = 0;
}

// Calculate discount amount and final bill
$discountAmount = ($total * $discount) / 100;
$finalBill = $total - $discountAmount;

// Display complete bill
echo "================================<br>";
echo "       UNIVERSITY CAFETERIA<br>";
echo "================================<br>";

echo "Student Name : " . $studentName . "<br>";
echo "Student ID   : " . $studentID . "<br>";
echo "Food Item    : " . $foodItem . "<br>";
echo "Price        : $" . $price . "<br>";
echo "Quantity     : " . $quantity . "<br>";

echo "<br>Ordered Items:<br>";

// Display each ordered item using for loop
for ($i = 1; $i <= $quantity; $i++) {
    echo "Item " . $i . ": " . $foodItem . "<br>";
}

echo "<br>";
echo "Subtotal     : $" . $total . "<br>";
echo "Discount     : " . $discount . "%<br>";
echo "Discount Amt : $" . $discountAmount . "<br>";
echo "Final Bill   : $" . $finalBill . "<br>";

echo "<br>Thank you for visiting!<br>";
echo "================================";
?>