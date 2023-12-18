<?php

class Mode
{
    public function selectAllMode($conn) {
        $sql = "SELECT * FROM mode";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
}