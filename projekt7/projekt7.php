<?php
    include("database.php"); 

    if(isset($_POST['dodaj'])){
        $imie = trim($_POST['imie']);
        $nazwisko = trim($_POST['nazwisko']);
        $wiek = (int)$_POST['wiek'];

        if (!empty($imie) && !empty($nazwisko) && is_int($wiek) && $wiek > 0) {
            $stmt = $conn->prepare("INSERT INTO users (imie, nazwisko, wiek) VALUES (?, ?, ?)");
            if ($stmt === false) {
                die("Błąd przygotowania zapytania: " . $conn->error);
            }

            if (!$stmt->bind_param("ssi", $imie, $nazwisko, $wiek)) {
                die("Błąd parametrów: " . $stmt->error);
            }

            if ($stmt->execute()) {
                header("Location: projekt7.php?status=dodano");
                exit();
            } else {
                echo "Błąd wykonania zapytania: " . $stmt->error;
            }

            $stmt->close();
        }
        else{
            echo "Pola muszą być wypełnione poprawnie!";
        }
    }

    
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
    

    mysqli_close($conn);
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projekt7</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <p style="
                color: rgb(128, 37, 208);
                font-size:3rem;
                font-weight: bold;
                text-align: center;
            ">Projekt 7</p>
        </div>

        <div>
            <p style="
                color: rgb(88, 37, 208);
                font-size:1.5rem"
                >Tabelka</p>
        </div>

        <div id="tabelka">
            <?php
                if($result){
                    if(mysqli_num_rows($result) > 0){
                        echo "<table>";
                        echo "<tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Wiek</th><th>Przyciski</th></tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr class='user-row' data-id='" . $row["id"] . "'>";
                            echo "<td>" . $row["id"] . "</td>";

                            echo "<td class='col-imie'>
                                <span class='view-data'>" . $row["imie"] . "</span>
                                <input type='text' class='edit-input' name='imie' style='display:none;'>
                                </td>";

                            echo "<td class='col-nazwisko'>
                                <span class='view-data'>" . $row["nazwisko"] . "</span>
                                <input type='text' class='edit-input' name='nazwisko' style='display:none;'>
                                </td>";

                            echo "<td class='col-wiek'>
                                <span class='view-data'>" . $row["wiek"] . "</span>
                                <input type='number' class='edit-input' name='wiek' style='display:none;'>
                                </td>";

                            echo "<td class='col-akcje'>";
                
                            echo '<button onclick="enableEdit(this)" class="edit-btn">Edytuj</button>';
                            echo '<button onclick="deleteUser(' . $row["id"] . ')" class="delete-btn">Usuń</button>';
                            
                            echo '<button onclick="saveChanges(' . $row["id"] . ', this)" class="save-btn" style="display:none;">Dokonaj Zmiany</button>';
                            echo '<button onclick="cancelEdit(this)" class="cancel-btn" style="display:none;">Anuluj</button>';
                            
                            echo "</td>";
                            echo "</tr>";

                            echo "</tr>";
                        }
                        echo "</table>";
                        mysqli_free_result($result);
                    }
                    else{
                        echo "brak danych";
                    }
                }
                else{
                    echo "Błąd";
                }
            ?>
        </div>
        <br>

        <div class="dodawanie_rekordu">
            <h3>Dodaj Nowego Użytkownika</h3>
            <form method="POST" action="projekt7.php">
                
                <input type="text" id="imie" name="imie" required placeholder="imie">
                
                <input type="text" id="nazwisko" name="nazwisko" required placeholder="nazwisko">
                
                <input type="number" id="wiek" name="wiek" required placeholder="wiek">
                
                <button type="submit" name="dodaj">Dodaj</button>
            </form>
        </div>

        <script>
    function enableEdit(buttonElement) {
        let row = buttonElement.closest('.user-row');
        
        row.querySelectorAll('.view-data').forEach(span => {
            span.style.display = 'none';
        });

        row.querySelectorAll('.edit-input').forEach(input => {
            let span = input.previousElementSibling; 
            input.value = span.textContent.trim();
            input.placeholder = span.textContent.trim();
            input.style.display = 'inline-block';
        });

        row.querySelector('.edit-btn').style.display = 'none';
        row.querySelector('.delete-btn').style.display = 'none';
        row.querySelector('.save-btn').style.display = 'inline-block';
        row.querySelector('.cancel-btn').style.display = 'inline-block';
    }

    function cancelEdit(buttonElement) {
        let row = buttonElement.closest('.user-row');
        
        row.querySelectorAll('.view-data').forEach(span => {
            span.style.display = 'inline';
        });
        row.querySelectorAll('.edit-input').forEach(input => {
            input.style.display = 'none';
        });

        row.querySelector('.edit-btn').style.display = 'inline-block';
        row.querySelector('.delete-btn').style.display = 'inline-block';
        row.querySelector('.save-btn').style.display = 'none';
        row.querySelector('.cancel-btn').style.display = 'none';
    }

    function saveChanges(id, buttonElement) {
        let row = buttonElement.closest('.user-row');
        
        let imie = row.querySelector("input[name='imie']").value;
        let nazwisko = row.querySelector("input[name='nazwisko']").value;
        let wiek = row.querySelector("input[name='wiek']").value;
        
        if (!imie || !nazwisko || !wiek) {
            alert("Pola nie mogą być puste!");
            return;
        }

        fetch('update.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `id=${id}&imie=${imie}&nazwisko=${nazwisko}&wiek=${wiek}`
        })
        .then(response => response.text())
        .then(data => {
            if (data === "success") {
                row.querySelector('.col-imie .view-data').textContent = imie;
                row.querySelector('.col-nazwisko .view-data').textContent = nazwisko;
                row.querySelector('.col-wiek .view-data').textContent = wiek;
                cancelEdit(buttonElement); 
            } else {
                alert("Błąd aktualizacji: " + data);
            }
        })
        .catch(error => {
            console.error('Błąd:', error);
            alert("Błąd komunikacji z serwerem.");
        });
    }
    
    function deleteUser(id) {
        window.location.href = 'usun.php?id=' + id;
    }
        </script>
    </body>
</html>