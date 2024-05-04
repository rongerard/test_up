<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}
?>
