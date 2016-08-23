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
}