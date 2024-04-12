<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un livre</title>
</head>
<body>
    <h2>Supprimer un livre</h2>
    <form action="deleteBook.php" method="POST">
        <label for="id">ID de livre:</label><br>
        <input type="text" id="id" name="id" required><br><br>
        <input type="submit" name="deleteBook" value="Supprimer">
    </form>
</body>
</html>


<?php

$conn = include("connexionDB.php");

if(isset($_POST["deleteBook"])){
    $id = $_POST["id"];
    $query = "DELETE FROM livres WHERE id = ?"; 
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "Le livre a été supprimé avec succès";
    } else {
        echo "Erreur lors de la suppression du livre: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
