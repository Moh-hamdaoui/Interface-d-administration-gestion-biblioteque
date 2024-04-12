<?php

$conn = include("connexionDB.php");
$book = null;

if(isset($_POST["getData"])){
    $id = $_POST["id"];
    $query = "SELECT * FROM livres WHERE id = $id"; 
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        $book = mysqli_fetch_assoc($res);
    } else {
        echo "Aucun livre trouvé avec cet ID.";
    }
}


if(isset($_POST["submit"])){
    $id = $_POST["id"]; 

 
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $categorie = $_POST['categorie'];
    $disponible = isset($_POST['disponible']) ? 1 : 0; 

   
    $query = "UPDATE livres SET titre = '$titre', auteur = '$auteur', categorie = '$categorie', disponible = $disponible WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "Livre bien modifié";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un livre</title>
</head>
<body>
    <h2>Modifier un livre</h2>
    <form action="modifyBooks.php" method="POST">
        <label for="id">ID de livre:</label><br>
        <input type="text" id="id" name="id" required><br><br>
        <input type="submit" name="getData" value="Obtenir le livre à modifier">
    </form>
    
    
    <?php if(isset($book)) : ?> 
    <form action="modifyBooks.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $book['id']; ?>"> 
        <label for="titre">Titre:</label><br>
        <input type="text" id="titre" name="titre" value="<?php echo $book['titre']; ?>" required><br><br>
        
        <label for="auteur">Auteur:</label><br>
        <input type="text" id="auteur" name="auteur" value="<?php echo $book['auteur']; ?>" required><br><br>
        
        <label for="categorie">Catégorie:</label><br>
        <input type="text" id="categorie" name="categorie" value="<?php echo $book['categorie']; ?>" required><br><br>
        
        <label for="disponible">Disponible:</label>
        <input type="checkbox" id="disponible" name="disponible" value="1" <?php if ($book['disponible'] == 1) echo 'checked'; ?>><br><br>
        
        <input type="submit" name="submit" value="Modifier">
    </form>
    <?php endif; ?>
</body>
</html>





