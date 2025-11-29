<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projekt 6</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h1>Logowanie</h1>
        </div>
        
        <div class="formularz">

            <form action="nowa_strona.php" method="post">
                <label for="Imie">Imie: </label>
                <input class = "input" type="text" id="imie" name="imie"> <br>

                <label for="Nazwisko">Nazwisko: </label>
                <input class = "input" type="text" id="Naziwsko" name="nazwisko"> <br>

                <label for="bdate">Data urodzenia: </label>
                <input class = "input" type="date" id="bdate" name="bdate"> <br>

                <label for="haslo">Hasło: </label>
                <input class = "input" type="password" id="haslo" name="password"> <br>

                <label for="wojewodztwo">Województwo: </label>
                <input class = "input" type="text" id="wojewodztwo" name="wojewodztwo"> <br>

                <label for="miasto">Miasto: </label>
                <input class = "input" type="text" id="miasto" name="miasto"> <br>

                <label for="ulica">Ulica: </label>
                <input class = "input" type="text" id="ulica" name="ulica"> <br>

                <label for="email">Email: </label>
                <input class = "input" type="email" id="email" name="email"> <br>

                <label for="prawko">Prawo jazdy: </label>
                <input type="checkbox" id="prawko" name="prawko"> <br>

                <label for="plce">Płeć: </label>
                <div style="padding-left:25px;">
                <label for="Mężczyzna">Mężczyzna</label>
                <input type="radio" id="Mężczyzna" value="Mężczyzna" name="plec"><br>
                <label for="Kobieta">Kobieta</label>
                <input type="radio" id="Kobieta" value="Kobieta" name="plec"><br>
                <label for="Inne">Inne</label>
                <input type="radio" id="Inne" value="Inne" name="plec"><br>
                </div>

                <label for="numerTelefonu">Numer Telefonu: </label>
                <input class = "input" type="tel" id="numerTelefonu" placeholder="000-000-000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" name="numerTelefonu"><br>

                <label for="uwagi">Uwagi: </label>
                <textarea class = "input" id="uwagi" rows="3" cols="25" name="uwagi"></textarea><br><br>
                
                <input type = "submit" id="submit">
            </form>

        </div>

        <div class="formularz2" target="_blank">
            <a href="index.txt">Kod Strony</a>
        </div>

    </body>
</html>