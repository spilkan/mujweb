<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fname = $_POST['ffname'] ?? '';
    $sname = $_POST['fsname'] ?? '';
    $email = $_POST['femail'] ?? '';
    $phone = $_POST['fphone'] ?? '';
    $adres = $_POST['fadres'] ?? '';
    $message = $_POST['fmes'] ?? '';

    
    $errors = [];

  
    if (empty($fname) || empty($sname) || empty($email) || empty($phone) || empty($adres) || empty($message)) {
        $errors[] = "Všechna pole musí být vyplněná.";
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Zadejte platnou e-mailovou adresu.";
    }

  
    if (!preg_match('/^\d{9}$/', $phone)) {
        $errors[] = "Zadejte platné telefonní číslo (9 číslic).";
    }


    if (!empty($errors)) {
        foreach ($errors as $error) {
           
            print("<div class='alert'>$error</div>");
        }
    } else {
        
        print("<h3>Odeslaná data:</h3>");
        print("<p>Jméno: " . htmlspecialchars($fname) . "</p>");
        print("<p>Příjmení: " . htmlspecialchars($sname) . "</p>");
        print("<p>Email: " . htmlspecialchars($email) . "</p>");
        print("<p>Telefon: " . htmlspecialchars($phone) . "</p>");
        print("<p>Adresa: " . htmlspecialchars($adres) . "</p>");
        print("<p>Zpráva: " . nl2br(htmlspecialchars($message)) . "</p>");
    }
}
?>

<?php


