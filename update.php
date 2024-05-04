<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /*
    // Form submitted, process the data
    
    $xml = new DOMDocument();
    $xml->load("accounts.xml");

    // Retrieve the current userid from the last account element in the XML
    $accounts = $xml->getElementsByTagName("account");
    $lastAccount = $accounts->item($accounts->length - 1);
    $lastUserId = $lastAccount ? intval($lastAccount->getAttribute("userid")) : 202400;

    // Increment the userid for the new account
    $userid = $lastUserId + 1;

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    $account = $xml->createElement("account");
    $accountUsername = $xml->createElement("username", $username);
    $accountEmail = $xml->createElement("email", $email);
    $accountPassword = $xml->createElement("password", $password);

    $account->appendChild($accountUsername);
    $account->appendChild($accountEmail);
    $account->appendChild($accountPassword);
    $account->setAttribute("userid", $userid);

    $xml->getElementsByTagName("accounts")[0]->appendChild($account);
    $xml->save("accounts.xml");

    echo "Account registered successfully!";
    exit(); // Stop further execution
*/

    $userId =  $_SESSION["sessionUserId"];

    // Load the XML file
    $xml = new DOMDocument();
    $xml->load("accounts.xml");

    
   
    $st = $_POST["username"];
    $sg = $_POST["email"];
    $sa = $_POST["password"];
   

    $accounts = $xml->getElementsByTagName("account");
  
    foreach($accounts as $account){

        if($userId === $account->getAttribute("userid")){

            $newAccount = $xml->createElement("account");
            $accountUsername = $xml->createElement("username", $st);
            $accountEmail = $xml->createElement("email", $sg);
            $accountPassword = $xml->createElement("password", $sa);

            $newAccount->appendChild($accountUsername);
            $newAccount->appendChild($accountEmail);
            $newAccount->appendChild($accountPassword);
            $newAccount->setAttribute("userid", $userId);

            $xml->getElementsByTagName("accounts")[0]->replaceChild($newAccount, $account);
            $xml->save("accounts.xml");

            echo "Account updated successfully!";
            exit();
        }
    }
  
}
?>
