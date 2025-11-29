<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dane</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h1>Dane</h1>
        </div>

        <div class="formularz2">
            <?php 
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $imie = empty($_POST['imie']) ? "Brak informacji" : $_POST['imie'];
                    $nazwisko = empty($_POST['nazwisko']) ? "Brak informacji" : $_POST['nazwisko'];
                    $bdate = empty($_POST['bdate']) ? "Brak informacji" : $_POST['bdate'];
                    $password = empty($_POST['password']) ? "Brak informacji" : $_POST['password'];
                    $wojewodztwo = empty($_POST['wojewodztwo']) ? "Brak informacji" : $_POST['wojewodztwo'];
                    $miasto = empty($_POST['miasto']) ? "Brak informacji" : $_POST['miasto'];
                    $ulica = empty($_POST['ulica']) ? "Brak informacji" : $_POST['ulica'];
                    $email = empty($_POST['email']) ? "Brak informacji" : $_POST['email'];
                    $numerTelefonu = empty($_POST['numerTelefonu']) ? "Brak numeru" : $_POST['numerTelefonu'];
                    $plec = isset($_POST['plec']) ? $_POST['plec'] : 'Nie wybrano';
                    if (isset($_POST['prawko'])) {
                        $prawko = 'Posiada';
                    } else {
                        $prawko = 'Nie posiada';
                    }
                    $uwagi = empty($_POST['uwagi']) ? "Brak uwag" : $_POST["uwagi"];
                    $uwagi_bezp = htmlspecialchars($uwagi);
                    $uwagi_final = nl2br($uwagi_bezp);
                    
                    echo "Imie: {$imie} <br>";
                    echo "Nazwisko: {$nazwisko} <br>";
                    echo "Urodziny: {$bdate} <br>";
                    echo "Hasło: {$password} <br>";
                    echo "Adres: {$ulica}, {$miasto}, {$wojewodztwo} <br>";
                    echo "Email: {$email} <br>";
                    echo "Prawo jazdy: {$prawko} <br>";
                    echo "Płeć: {$plec} <br>";
                    echo "Numer telefonu: {$numerTelefonu} <br>";
                    echo "Uwagi: {$uwagi_final}";
                }
            
            ?>
        </div>

        <div class="formularz2" target="_blank">
            <a href="nowa_strona.txt">Kod Strony</a>
        </div>
    </body>
</html>