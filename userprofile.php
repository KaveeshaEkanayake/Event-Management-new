<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
        }

        .dashboard {
            height: 100vh;
            display: flex;
            border: 5px solid #444;
            border-radius: 10px;
            margin: 20px;
            padding: 10px;
            position: relative;
            background-color: #1a1a1a;
            align-items: flex-start; /* Align items to the top */
        }

        .user-icon {
            position: relative;
            cursor: pointer;
            display: flex;
            align-items: center;
            background: linear-gradient(45deg, orange, yellow);
            padding: 8px;
            border-radius: 5px;
        }

        .user-symbol {
            margin-right: 5px;
            font-size: 1.2em;
            border: 2px solid #fff;
            border-radius: 50%;
            padding: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
        }

        #username {
            font-size: 0.9em;
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 50px;
            left: 0;
            background-color: #1a1a1a;
            border: 1px solid #444;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            min-width: 200px; /* Set a minimum width for the dropdown */
        }

        .dropdown.active {
            display: block;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 5px 10px;
            color: #fff;
            text-decoration: none;
        }

        .dropdown-item:hover {
            background-color: #333;
        }

        .dropdown-item img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .button {
            background: linear-gradient(45deg, orange, yellow);
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 5px;
            width: 100%; /* Make buttons full width */
        }

        .button:hover {
            background: linear-gradient(45deg, darkorange, gold);
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="user-icon" onclick="toggleDropdown()">
            <span class="user-symbol">👤</span> 
            <span id="username">Username</span>
        </div>
        <div class="dropdown" id="userDropdown">
            <div class="dropdown-item">
                <img src="https://via.placeholder.com/30" alt="User Image">
                <span id="dropdownUsername">Username</span>
            </div>
            <button class="button" onclick="editProfile()">Edit Profile</button>
            <button class="button" onclick="deleteAccount()">Delete Account</button>
            <button class="button" onclick="logout()">Logout</button>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('active');
        }

        function editProfile() {
            alert('Edit Profile clicked');
            // Here you can add functionality to edit the profile
        }

        function deleteAccount() {
            alert('Delete Account clicked');
            // Here you can add functionality to delete the account
        }

        function logout() {
            alert('Logout clicked');
            // Here you can add functionality for logout
        }

        // Close dropdown if clicked outside
        window.onclick = function(event) {
            if (!event.target.matches('.user-icon')) {
                const dropdown = document.getElementById('userDropdown');
                if (dropdown.classList.contains('active')) {
                    dropdown.classList.remove('active');
                }
            }
        }
    </script>
</body>
</html>
