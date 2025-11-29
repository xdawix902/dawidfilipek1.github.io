<?php

include("database.php");

$id = $_POST['id'] ?? null;
$imie = $_POST['imie'] ?? '';
$nazwisko = $_POST['nazwisko'] ?? '';
$wiek = $_POST['wiek'] ?? null;

if (empty($id) || empty($imie) || empty($nazwisko) || empty($wiek)) {
    echo "Wszystkie pola są wymagane.";
    exit;
}

$stmt = $conn->prepare("UPDATE users SET imie = ?, nazwisko = ?, wiek = ? WHERE id = ?");

if (!$stmt->bind_param("ssii", $imie, $nazwisko, $wiek, $id)) {
    echo "Błąd powiązania parametrów: " . $stmt->error;
    $stmt->close();
    mysqli_close($conn);
    exit;
}

if ($stmt->execute()) {
    echo "success"; 
} else {
    echo "Błąd wykonania zapytania: " . $stmt->error;
}

$stmt->close();
mysqli_close($conn);
?>