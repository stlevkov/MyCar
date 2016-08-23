<?php

class PartsModel extends HomeModel
{

    function getAll() : array
    {
        $statement = self::$db->query(
            "SELECT parts.id, part_name, description, date, full_name, car_kilometers, part_life, user_id " .
            "FROM parts LEFT JOIN users on parts.user_id = users.id " .
            "ORDER BY date DESC");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function create(string $part_name, string $description, int $car_kilometers, $part_life, int $user_id) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO parts(part_name, description, car_kilometers, part_life, user_id) VALUES(?, ?, ?, ?, ?)");
        $statement->bind_param("ssiii", $part_name, $description, $car_kilometers, $part_life, $user_id);
        $statement->execute();
        return $statement->affected_rows == 1;

    }


}