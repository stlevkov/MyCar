<?php

class ProfilesModel extends HomeModel
{
    function getAll()
    {
        $statement = self::$db->query(
            "SELECT full_name, users.id, password_hash, username " .
            "FROM users");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function delete(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM users WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    function getUserById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM users WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function edit(string $username, string $full_name, string $id) : bool
    {
        $statement = self::$db->prepare(
            "UPDATE users SET username = ?, full_name = ? WHERE id = ?");
        $statement->bind_param("ssi",
            $username, $full_name, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }
}
