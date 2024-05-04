<?php
session_start();

// Check if the user is logged in
if(isset($_SESSION["sessionUserId"])) {
    $userId =  $_SESSION["sessionUserId"];
    // Now you can use $userId to display the user's ID or fetch other profile information

    // Load the XML file containing user accounts
    $xml = new DOMDocument();
    $xml->load("accounts.xml");

    // Find the account element with the matching userid attribute
    $accounts = $xml->getElementsByTagName("account");
    foreach ($accounts as $account) {
        if ($account->getAttribute("userid") == $userId) {
            // Found the account with the matching userid
            $username = $account->getElementsByTagName("username")->item(0)->nodeValue;
            $email = $account->getElementsByTagName("email")->item(0)->nodeValue;
            $password = $account->getElementsByTagName("password")->item(0)->nodeValue;

            $_SESSION["sessionUsername"] = $username;
            $_SESSION["sessionEmail"] = $email;
            $_SESSION["sessionPassword"] = $password;
            // You can retrieve other information similarly
            break;
        }
    }

    
   
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: index.html");
    exit; // Ensure that script execution stops after redirection
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
   
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>

<div class="container" id = "info3">
    <img src="img/profile-picture.jpg" alt="Profile Picture" class="profile-image">
    <h1><?php echo $username; ?></h1>
    <div class="profile-details">
        <p><strong>Email:</strong>  <?php echo $email; ?></p>
        <p><strong>Password:</strong>  <?php echo $password; ?></p>
    </div>
    <!-- Button to open the edit profile modal -->
    <button id="openEditProfileModalBtn">Edit Profile</button>
</div>


<!-- The Modal -->
<div id="editProfileModal" class="modal" >
  <!-- Modal content -->
  <div class="modal-content" id = "info3" >
    <span class="close">&times;</span>
    <h2>Edit Profile</h2>
    <form id="editProfileForm" method="POST">
      <label for="newUsername">New Username:</label>
      <input type="text" id="newUsername" name="username" value="<?php echo $username; ?>"><br><br>
      <label for="newEmail">New Email:</label>
      <input type="email" id="newEmail" name="email" value="<?php echo $email; ?>"><br><br>
      <label for="newPassword">New Password:</label>
      <input type="password" id="newPassword" name="password" value="<?php echo $password; ?>"><br><br>
      <button type="submit" id="update-btn">Save Changes</button>
    </form>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
<script src="editProfile.js"></script>
</body>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: 0 auto;
        display: block;
    }

    h1 {
        text-align: center;
    }

    .profile-details {
        margin-top: 20px;
    }

    .profile-details p {
        margin: 10px 0;
    }

    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>

</html>
