<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Query to check if the user exists
    $select = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_name'] = $email;
            header('location:dashboard.php');
            exit();
        } else {
            $error = 'Incorrect email or password!';
        }
    } else {
        $error = 'No account found with that email!';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
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

/* Dark mode button hover effect */
.edit-btn,
.delete-btn,
.more-info-btn {
    background-color: #FFD700; /* Yellow for action buttons */
    color: black;
}

.edit-btn:hover,
.delete-btn:hover,
.more-info-btn:hover {
    background-color: #FFC107; /* Slightly darker yellow on hover */
}

/* Responsive styling */
@media (max-width: 768px) {
    .form-container {
        width: 90%;
    }
}

/* Additional notification animation */
.notification.fade-in {
    animation: fadeIn 0.5s;
}

.notification.fade-out {
    animation: fadeOut 0.5s;
}

/* Keyframes for fade-in and fade-out animations */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}
   </style>
</head>
<body>
   <div class="form-container">
      <form action="login.php" method="post">
         <h3>Login Now</h3>
         <?php
         if (isset($error)) {
             echo "<span class='notification'>$error</span>";
         }
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="Login Now" class="form-btn">
         <p>Don't have an account? <a href="register.php">Register Now</a></p>
      </form>
   </div>
</body>
</html>
