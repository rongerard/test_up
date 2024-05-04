<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId =  $_SESSION["sessionUserId"];

    // Load the XML file
    $xml = new DOMDocument();
    $xml->load("accounts.xml");

    
   
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
   

    $accounts = $xml->getElementsByTagName("account");

    foreach($accounts as $account){

        if($userId === $account->getAttribute("userid")){

            $newAccount = $xml->createElement("account");
            $accountUsername = $xml->createElement("username", $username);
            $accountEmail = $xml->createElement("email", $email);
            $accountPassword = $xml->createElement("password", $password);

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
    echo "no account";
  
}
?>
