<?php 
    include "./db/database.php";

    $database = new Database();
    $query = $database->find();

    if ($query->num_rows > 0) {
        // output data of each row
        while($row = $query->fetch_assoc()) {
            echo "" . $row["image"]. " - Name: " . $row["name"]. " " . $row["author"]. "<br>";
        }
    } else {
        echo "0 results";
    }
?>