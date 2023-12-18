<?php

class Questions
{
    public function insertQuestionLists($list_id, $question, $answer, $connection)
    {
        $sql = "INSERT INTO `lists_questions`(`lists_id`, `question`, `good_answer`) VALUES (?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("iss", $list_id, $question, $answer);
        $result = $stmt->execute();
        $realResult = true;
    }

    public function insertList($modeId, $userId, $name, $description, $connection)
    {
        $sql = "INSERT INTO `lists`(`mode_id`, `users_id`, `name`, `description`) VALUES (?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("iiss", $modeId, $userId, $name, $description);
        $result = $stmt->execute();
        $realResult = true;
    }

    public function findListId($connection)
    {

        $sql = "SELECT * FROM `lists`";
        $stmt = $connection->query($sql);

        return $stmt->num_rows;
    }

    public function getAllQuestionsByListId($id, $connection)
    {
        $sql = "SELECT * FROM `lists_questions` WHERE lists_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function updateQuestion($connection, $id,$name,$description,$modeId)
    {
        $sql = "UPDATE `lists` SET `name`= ?,`description`= ?,`mode_id`= ? WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssii", $name, $description, $modeId, $id);
        $result = $stmt->execute();
        $realResult = true;
    }

    public function updateQuestionLists($connection, $question, $goodAnswer, $question_id)
    {
        $sql = "UPDATE `lists_questions` SET `question`= ?,`good_answer`= ? WHERE id = ?";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssi", $question, $goodAnswer, $question_id);
        $result = $stmt->execute();
        $realResult = true;
    }
}