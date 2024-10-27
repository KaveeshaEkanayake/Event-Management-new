<?php
@include 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    // Check if the email already exists
    $select = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error = "Email already exists!";
    } else {
        // Insert user into the database
        $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        if ($conn->query($query) === TRUE) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Basic styling for the body */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #121212; /* Dark background */
            color: #fff; /* White text for better contrast */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form container styling */
        .form-container {
            background-color: #1a1a1a; /* Darker gray for form background */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Drop shadow for depth */
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Form styling */
        form h3 {
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #FFD700; /* Yellow for title */
        }

        /* Input fields styling */
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #444; /* Dark border */
            border-radius: 5px;
            background-color: #222; /* Darker background for input */
            color: #fff; /* White text */
            font-size: 1em;
        }

        /* Button styling */
        .form-btn {
            background-color: #FFD700; /* Yellow button */
            color: #000; /* Black text for contrast */
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s ease-in-out;
            margin-top: 10px;
        }

        /* Hover effect for buttons */
        .form-btn:hover {
            background-color: #FFC107; /* Slightly darker yellow */
        }

        /* Notification styling */
        .notification {
            background-color: #333; /* Darker gray for notification background */
            color: #fff; /* White text */
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 0.9em;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        /* Link styling */
        a {
            color: #FFD700; /* Yellow for links */
            text-decoration: none;
            font-weight: bold;
        }

        /* Hover effect for links */
        a:hover {
            text-decoration: underline;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="register.php" method="post" class="event-form">
            <h3>Register</h3>
            <?php if (isset($error)) { echo "<p class='notification'>$error</p>"; } ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="form-btn">Register</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>
