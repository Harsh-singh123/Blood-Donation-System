<html>
<head>
    <title>Feedback - Blood Bank Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        header {
            background-color: #b30000;
            color: #fff;
            padding: 20px;
            text-align: left;
            font-size: 24px;
            font-weight: bold;
        }
        nav {
            background-color: #f2f2f2;
            overflow: hidden;
            padding: 20px;
        }
        nav a {
            float: left;
            display: block;
            color: #333;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            border-right: 1px solid #ccc;
        }
        nav a:hover {
            background-color: #ddd;
            color: #b30000;
        }
        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            width: 500px;
            margin: 60px auto;
        }
        h1 {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: #b30000;
            margin-bottom: 30px;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        form input[type="text"],
        form input[type="email"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            resize: vertical;
        }
        form textarea {
            min-height: 100px;
        }
        form button {
            background-color: #b30000;
            color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        form button:hover {
            background-color: #900000;
        }
        .required {
            color: red;
        }
    </style>
</head>
<body>
    <header>
        Blood Bank Management System
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="About Us.php">About</a>
        <a href="Contact us.php">Contact Us</a>
        <a href="Blood info.php">Blood info.</a>
        <a href="admin/login.php">Admin</a>
        <a href="feedback.php">Feedback</a>
    </nav>
    <div class="container">
        <h1>Feedback Form</h1>
        <form action="#" method="post">
            <label for="name">Name <span class="required">*</span></label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email <span class="required">*</span></label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message <span class="required">*</span></label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Simple validation (already required in HTML, but double-check)
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Connect to database
        $conn = mysqli_connect("localhost", "root", "", "bb") or die("Connection error");

        // Prepare and execute insert query
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $message = mysqli_real_escape_string($conn, $message);

        $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";
        if (mysqli_query($conn, $sql)) {
            $thank_you_msg = "Thank you for your feedback!";
        } else {
            $thank_you_msg = "Error submitting feedback. Please try again later.";
        }
        mysqli_close($conn);
    }
}
?>
