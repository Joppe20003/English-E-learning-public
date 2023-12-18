<?php

class Score
{
    public function insertScoreUser($connection, $userId, $listId, $good, $wrong) {
        $sql = "INSERT INTO `scores`(`lists_id`, `users_id`, `questions_good`, `question_wrong`) VALUES (?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("iiii", $listId, $userId, $good, $wrong);
        $result = $stmt->execute();
        $realResult = true;
    }
}