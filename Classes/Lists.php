<?php

class Lists
{
    public function getPriveLists ($conn, $users_id) {
        $sql = "SELECT *, lists.name AS 'lists_name', lists.id AS 'lists_id' FROM lists LEFT JOIN users ON lists.users_id = users.id LEFT JOIN mode ON lists.mode_id = mode.id WHERE lists.users_id = {$users_id}";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getPublicLists ($conn) {
        $sql = "SELECT * , lists.name AS 'lists_name', lists.id AS 'lists_id'  FROM lists LEFT JOIN mode ON lists.mode_id = mode.id WHERE mode.id = 2";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getListByListId($id, $connection) {
        $sql = "SELECT * FROM `lists` WHERE id = {$id}";
        $result = $connection->query($sql);

        return $result;
    }
}