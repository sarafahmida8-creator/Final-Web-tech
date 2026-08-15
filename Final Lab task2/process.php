<?php

// Check if form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Receive data using $_POST
    $applicant_id = trim($_POST["applicant_id"]);
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = $_POST["password"];
    $gender = $_POST["gender"] ?? "";
    $job_position = $_POST["job_position"] ?? "";
    $qualification = trim($_POST["qualification"]);
    $address = trim($_POST["address"]);

    $errors = array();

    // Applicant ID validation
    if (empty($applicant_id)) {
        $errors[] = "Applicant ID is required.";
    }

    // Name validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Email validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email.";
    }

    // Phone validation - exactly 11 digits
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
        $errors[] = "Phone number must contain 11 digits.";
    }

    // Password validation
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must contain at least 6 characters.";
    }

    // Gender validation
    if (empty($gender)) {
        $errors[] = "Please select your gender.";
    }

    // Job position validation
    if (empty($job_position)) {
        $errors[] = "Please select a job position.";
    }

    // Qualification validation
    if (empty($qualification)) {
        $errors[] = "Qualification is required.";
    }

    // Address validation
    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    // CV validation using $_FILES
    if (!isset($_FILES["cv"]) || $_FILES["cv"]["error"] == UPLOAD_ERR_NO_FILE) {

        $errors[] = "Please upload your CV.";

    } else {

        $cv_name = $_FILES["cv"]["name"];
        $cv_tmp = $_FILES["cv"]["tmp_name"];
        $cv_size = $_FILES["cv"]["size"];

        $extension = strtolower(pathinfo($cv_name, PATHINFO_EXTENSION));

        $allowed_extensions = array("pdf", "doc", "docx");

        if (!in_array($extension, $allowed_extensions)) {
            $errors[] = "Only PDF, DOC, and DOCX files are allowed.";
        }

        if ($cv_size > 2 * 1024 * 1024) {
            $errors[] = "CV file size must not exceed 2 MB.";
        }
    }

    // Display errors
    if (!empty($errors)) {

        echo "<h2>Application Failed!</h2>";

        foreach ($errors as $error) {
            echo $error . "<br>";
        }

        echo "<br><a href='index.php'>Go Back</a>";

    } else {

        // Create uploads folder if it does not exist
        if (!is_dir("uploads")) {
            mkdir("uploads");
        }

        // Create unique CV filename
        $new_filename = time() . "_" . basename($cv_name);

        // Move uploaded CV to uploads folder
        move_uploaded_file(
            $cv_tmp,
            "uploads/" . $new_filename
        );

        // Send data to result.php using GET
        header(
            "Location: result.php?" .
            "id=" . urlencode($applicant_id) .
            "&name=" . urlencode($name) .
            "&cv=" . urlencode($new_filename) .
            "&email=" . urlencode($email) .
            "&phone=" . urlencode($phone) .
            "&gender=" . urlencode($gender) .
            "&job=" . urlencode($job_position) .
            "&qualification=" . urlencode($qualification) .
            "&address=" . urlencode($address)
        );

        exit();
    }
}
?>