<?php
    class user{
        private $conn;

        private $table_name = "users";

        public function __construct($db)    {
            $this->conn = $db;
        }

        //validate email against db
        public function findemail($email)   {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($sql);

            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }

        public function create($first_name, $last_name, $password, $email)    {
            $sql = "INSERT INTO users (first_name, last_name, password, email) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);

        //Hast the password before storing
        $hashed_password = password_hash (password: $password, algo: PASSWORD_BCRYPT);
        
        //Bind parameters and execute
        $stmt->bind_param("ssss", $first_name, $last_name, $hashed_password, $email);
        return $stmt->execute();
        }
        
    }


?>    