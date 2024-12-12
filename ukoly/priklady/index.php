<?php
function validateFirstName($firstName) {
    return preg_match("/^[A-Za-zÁ-Žá-ž\s]+$/", $firstName);
}

function validateLastName($lastName) {
    return preg_match("/^[A-Za-zÁ-Žá-ž\s]+$/", $lastName);
}

function validateUserEmail($userEmail) {
    return filter_var($userEmail, FILTER_VALIDATE_EMAIL);
}

function validateUserPhone($userPhone) {
    return preg_match("/^(+?\d{1,3})?[-.\s]?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{3,4}$/", $userPhone) && strlen(preg_replace("/\D/", "", $userPhone)) >= 9;
}

function validateUserAddress($userAddress) {
    return preg_match("/\d+/", $userAddress);
}

function validateUserMessage($userMessage) {
    return strlen($userMessage) <= 255;
}

function displayAlert($alertMessage) {
    echo "<script type='text/javascript'>alert('$alertMessage');</script>";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $userEmail = trim($_POST['userEmail']);
    $userPhone = trim($_POST['userPhone']);
    $userAddress = trim($_POST['userAddress']);
    $userMessage = trim($_POST['userMessage']);

    if (!validateFirstName($firstName)) {
        displayAlert("Jméno může obsahovat pouze písmena.");
    } elseif (!validateLastName($lastName)) {
        displayAlert("Příjmení může obsahovat pouze písmena.");
    } elseif (!validateUserEmail($userEmail)) {
        displayAlert("Prosím, zadejte platný e-mail.");
    } elseif (!validateUserPhone($userPhone)) {
        displayAlert("Telefonní číslo má nesprávný formát.");
    } elseif (!validateUserAddress($userAddress)) {
        displayAlert("Adresa musí obsahovat číslo popisné.");
    } elseif (!validateUserMessage($userMessage)) {
        displayAlert("Zpráva může mít maximálně 255 znaků.");
    } else {
        displayAlert("Formulář byl úspěšně odeslán!");

        echo "<h3>Úspěšně odesláno:</h3>";
        echo "<p><strong>Jméno:</strong> $firstName</p>";
        echo "<p><strong>Příjmení:</strong> $lastName</p>";
        echo "<p><strong>Email:</strong> $userEmail</p>";
        echo "<p><strong>Telefon:</strong> $userPhone</p>";
        echo "<p><strong>Adresa:</strong> $userAddress</p>";
        echo "<p><strong>Zpráva:</strong> $userMessage</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formular</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="wrapper">
        <img src="ProfileImage.jpg" alt="Profilový obrázek" class="bg-image">
        <div class="form-box">
            <form id="contactForm" method="POST">
                <label for="firstName">Jméno:</label>
                <input type="text" id="firstName" name="firstName" required>

                <label for="lastName">Příjmení:</label>
                <input type="text" id="lastName" name="lastName" required>

                <label for="userEmail">Email:</label>
                <input type="email" id="userEmail" name="userEmail" required>

                <label for="userPhone">Telefon:</label>
                <input type="text" id="userPhone" name="userPhone" required>

                <label for="userAddress">Adresa:</label>
                <input type="text" id="userAddress" name="userAddress" required>

                <label for="userMessage">Zpráva:</label>
                <textarea id="userMessage" name="userMessage" maxlength="255" required></textarea>

                <button type="submit" id="submitButton">Odeslat</button>
            </form>
        </div>
    </div>

    <script src="script.js" defer></script>
</body>
</html>
