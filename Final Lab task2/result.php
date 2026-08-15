<?php

// Use $_GET to receive information from process.php
$applicant_id = $_GET["id"] ?? "";
$name = $_GET["name"] ?? "";
$cv = $_GET["cv"] ?? "";

// Use $_REQUEST to retrieve values
$email = $_REQUEST["email"] ?? "";
$phone = $_REQUEST["phone"] ?? "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Application Result</title>
</head>
<body>

<h2>=================================</h2>
<h2>       APPLICATION SUCCESSFUL</h2>
<h2>=================================</h2>

<p>Applicant ID: <?php echo htmlspecialchars($applicant_id); ?></p>

<p>Name: <?php echo htmlspecialchars($name); ?></p>

<p>Email: <?php echo htmlspecialchars($email); ?></p>

<p>Phone: <?php echo htmlspecialchars($phone); ?></p>

<p>Gender: <?php echo htmlspecialchars($_GET["gender"] ?? ""); ?></p>

<p>Job Position: <?php echo htmlspecialchars($_GET["job"] ?? ""); ?></p>

<p>Qualification: <?php echo htmlspecialchars($_GET["qualification"] ?? ""); ?></p>

<p>Address: <?php echo htmlspecialchars($_GET["address"] ?? ""); ?></p>

<p>Uploaded CV: <?php echo htmlspecialchars($cv); ?></p>

<p>Application submitted successfully.</p>

</body>
</html>