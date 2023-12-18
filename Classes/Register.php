<?php

class Register
{
    public function registerUser($name, $email, $password, $connection) {
        $wachtwoord = password_hash($password, PASSWORD_DEFAULT);
        $sql2 = "SELECT name FROM users WHERE name = ?";
        $stmt2 = $connection->prepare($sql2);
        $stmt2->bind_param("s", $name);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        if ($result2->fetch_array() == true) {
            return 1;
        } else {
            $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $wachtwoord);
            $result = $stmt->execute();
            $realResult = true;
            return 3;
        }
    }
}