<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
</head>
<body>
    <h2>Ajouter un livre</h2>
    <form action="addBooks.php" method="POST">
        <label for="titre">Titre:</label><br>
        <input type="text" id="titre" name="titre" required><br><br>
        
        <label for="auteur">Auteur:</label><br>
        <input type="text" id="auteur" name="auteur" required><br><br>
        
        <label for="categorie">Catégorie:</label><br>
        <input type="text" id="categorie" name="categorie" required><br><br>
        
        <label>Disponible:</label><br>
        <input type="radio" id="disponible_oui" name="disponible" value="1">
        <label for="disponible_oui">Oui</label><br>
        <input type="radio" id="disponible_non" name="disponible" value="0">
        <label for="disponible_non">Non</label><br><br>


        
        <input type="submit" name="submit" value="Ajouter">
    </form>
</body>
</html>

<?php

$conn = include("connexionDB.php");

if (isset($_POST['submit'])) {
    

    $titre = $_POST["titre"];
    $auteur = $_POST["auteur"];
    $categorie = $_POST["categorie"];
    $disponible = $_POST["disponible"];

   
    $query = "INSERT INTO livres (titre, auteur, categorie, disponible) 
    VALUES 
    (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $titre, $auteur, $categorie, $disponible);

    if (mysqli_stmt_execute($stmt)) {
        echo "Le livre est bien ajouté";
    } else {
        echo "Erreur d'ajout de livre: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>

