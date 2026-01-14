<?php
class messages
{
    private $conn;

    private $table_name = "messages";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($message_sender, $sender_email, $message_subject, $message, $message_date)
    {
        $sql = "INSERT INTO messages (message_sender, sender_email, message_subject, message, message_date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        //Bind parameters and execute
        $stmt->bind_param("sssss", $message_sender, $sender_email, $message_subject, $message, $message_date);
        return $stmt->execute();
    }
}
