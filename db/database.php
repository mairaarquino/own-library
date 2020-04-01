<?php 
    class Database {
        
        var $db_host;
        var $db_user; 
        var $db_pass;
        var $db_name;

        var $conn;

        public function __construct() {
            $this->db_host = "localhost";
            $this->db_user = "root"; 
            $this->db_pass = ""; 
            $this->db_name = "books";
    
            $this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if (!$this->conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }

        public function insert($name, $author, $image) {
            $sql = "INSERT INTO books (name, author, image) VALUES ('".$name."', '".$author."', '".$image."')";
            
             if (mysqli_query($this->conn, $sql)) {
                return 'Livro salvo com sucesso!';
             } else {
                 echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
             }
        }

        public function find() {
            $sql = "SELECT * FROM books LIMIT 15";

            return $this->conn->query($sql);
        }
        
        public function desconect() {
            mysqli_close($conn);
        }
    }
?>