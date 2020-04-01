<?php 
    include "../db/database.php";

    $name = $_POST['name'];
    $author = $_POST['author'];
    $imagem = $_POST['image'];

    if($name != "" || $author != "" || $imagem != "") {
        $database = new Database();
        $query = $database->insert($name, $author, $imagem);

        echo $query;
        $msg = 'Livro cadastrado com sucesso!';
    } else {
        $msg = 'Livro Inválido';
    }
     
    header('Location: ../index.php');
?>