<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form submitted, process the login data

    // Retrieve the login credentials from the POST data
    $email = $_POST["email"];
    $password = $_POST["password"];

  

    // Load the XML file containing user accounts
    $xml = new DOMDocument();
    $xml->load("accounts.xml");

    // Find all account elements in the XML
    $accounts = $xml->getElementsByTagName("account");

    // Iterate through each account element to check for a match
    $authenticated = false;
    $userId = ""; // Initialize userId variable
    foreach ($accounts as $account) {
        $accountEmail = $account->getElementsByTagName("email")->item(0)->nodeValue;
      
        $accountPassword = $account->getElementsByTagName("password")->item(0)->nodeValue;

        // Check if the provided email and password match any user in the XML
        if ($email === $accountEmail && $password === $accountPassword) {
            // Authentication successful
            $authenticated = true;
            $userId = $account->getAttribute("userid");
            $accountUsername = $account->getElementsByTagName("username")->item(0)->nodeValue; // Assuming user ID is stored as an attribute in the XML
           
            $_SESSION["sessionUsername"] = $accountUsername;
            $_SESSION["sessionUserId"] = $userId;
            $_SESSION["sessionEmail"] = $email;
            $_SESSION["sessionPassword"] = $password;
            break;
        }
    }

    // Send response based on authentication result
    if ($authenticated) {
        // Authentication successful
        echo "success"; // Simply echo the userId
        
    } else {
        // Authentication failed
        echo "failure";
    }
}
?>
