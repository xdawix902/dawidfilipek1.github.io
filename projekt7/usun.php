<?php
    include("database.php");

    if(isset($_GET['id'])){
        $user_id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "DELETE FROM users WHERE id = '$user_id'";

        if (mysqli_query($conn, $sql)) {
            header("Location: projekt7.php?status=deleted");
            exit();
        } else {
            echo "Błąd usuwania rekordu: " . mysqli_error($conn);
        }
    } else {
        echo "Brak ID do usunięcia.";
    } 
    mysqli_close($conn);
?>