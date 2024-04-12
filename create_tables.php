<?php


$conn = include("connexionDB.php");


// $query1 = "CREATE TABLE livres (
//     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     titre VARCHAR(100) NOT NULL,
//     auteur VARCHAR(100),
//     categorie VARCHAR(100),
//     disponible BOOLEAN
// )";


// $query2 = "CREATE TABLE emprunteurs (
//     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     nom VARCHAR(100) NOT NULL,
//     email VARCHAR(100),
//     id_livre INT UNSIGNED,
//     FOREIGN KEY (id_livre) REFERENCES livres(id),
//     date_emprunt DATE,
//     date_retour DATE
// )";


// if (mysqli_query($conn, $query1)) {
//     echo "Table 'livres' created successfully<br>";
// } else {
//     echo "Error creating table 'livres': " . mysqli_error($conn) . "<br>";
// }

// if (mysqli_query($conn, $query2)) {
//     echo "Table 'emprunteurs' created successfully<br>";
// } else {
//     echo "Error creating table 'emprunteurs': " . mysqli_error($conn) . "<br>";
// }


mysqli_close($conn);

?>
