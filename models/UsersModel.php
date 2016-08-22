<?php

class UsersModel extends HomeModel
{
    function getAll()
    {
        $statement = self::$db->query(
            "SELECT full_name, users.id, password_hash, username " .
            "FROM users");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function register (
        string $username, string $password, string $full_name)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $statement = self::$db->prepare(
            "INSERT INTO users (username, password_hash, full_name) VALUES (?, ?, ?)");
            $statement->bind_param("sss", $username, $password_hash, $full_name);
            $statement->execute();
        if ($statement->affected_rows != 1)
            return false;
        $user_id = self::$db->query("SELECT LAST_INSERT_ID()")->fetch_row() [0];
        return $user_id;
    }


    public function login(string $username, string $password)
    {
    $statement = self::$db->prepare(
        "SELECT id, password_hash FROM users WHERE username = ?");
    $statement->bind_param("s", $username);
    $statement->execute();
    $result = $statement->get_result()->fetch_assoc();
    if (password_verify($password, $result['password_hash']))
        return $result['id'];
     return false;
    }


    public function edit(string $id, string $username, string $password_hash,
                         string $full_name) : bool
    {
        $statement = self::$db->prepare(
            "UPDATE users SET username = ?, " .
            "password_hash= ?, full_name = ? WHERE id = ?");
        $statement->bind_param("sssii",
            $username, $password_hash, $full_name, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }

    public function delete(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM  users WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;

    }
}
