<?php 
    include "../db/database.php";

    $name = $_POST['name'];
    $author = $_POST['author'];
    $imagem = $_POST['image'];

    if($name == "" || $author == "" || $imagem == "") {
        $database = new Database();
        $query = $database->insert($name, $author, $imagem);

        echo $query;
    } else {
        $msg = 'Livro Inválido';
    }
        
?>