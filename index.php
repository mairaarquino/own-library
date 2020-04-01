<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link rel="stylesheet" href="css/style.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!-- Compiled and minified JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            <title>My Books</title>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
        <div class="cadastro row">
            <div class="col l6 s12">
                <h3>Novo Livro</h3>
                <form id="formNovo" action="./controllers/insert.php" method="post">
                    <?php 
                        if(isset($msg)) {
                            echo '<div class="card-panel lighten-2 teal"></div>';
                        }
                    ?>            
                    <div class="progress" id="progress">
                        <div class="indeterminate"></div>
                    </div>
                    <input type="text" class="text" name="name" placeholder="Nome do Livro" required>
                    <input type="text" class="text" name="author" placeholder="Autor" required>
                    <input type="text" class="text" name="image" placeholder="Imagem" required>

                    <button class="btn btn-primary"type="submit" onclick="salvar()" style="float: right;">Adicionar</button>
                </form>
            </div>
            <div class="col l4 s12">
                <nav>
                    <div class="nav-wrapper">
                    <form>
                        <div class="input-field">
                            <input id="search" type="search" required style="margin-top: 34px;">
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                    </div>
                </nav>
                <div class='row'>
                    <?php 
                        include "./db/database.php";

                        $database = new Database();
                        $query = $database->find();

                        if ($query->num_rows > 0) {
                            // output data of each row
                            while($row = $query->fetch_assoc()) {
                                echo "<div class='col s12 m7'>
                                <div class='card'>
                                    <div class='card-image'>
                                        <img src='" . $row["image"]. "'>
                                    </div>
                                    <div class='card-content'>
                                        <p>" . $row["name"]. "</p>
                                    </div>
                                    <div class='card-action'>
                                        <a href='#'>" . $row["author"]. "</a>
                                    </div>
                                </div>
                                </div>";
                            }
                        } else {
                            echo "0 results";
                        }                        
                    ?>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="js/main.js"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</html>