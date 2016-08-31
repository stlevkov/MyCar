<?php

class PartsModel extends HomeModel
{
    function getPartById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT parts.id, part_name, description, car_kilometers, part_life, service_name, archive, part_price, date, user_id " .
            "FROM parts LEFT JOIN users on parts.user_id = users.id " .
            "WHERE parts.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    function getAll() : array
    {
        $current_user = htmlspecialchars($_SESSION['user_id']);
        if (htmlspecialchars($_SESSION['username']) == 'admin') {
            $statement = self::$db->query(
                "SELECT parts.id, part_name, description, date, full_name, car_kilometers, part_life, service_name, archive, date_replaced, part_price, user_id " .
                "FROM parts LEFT JOIN users on parts.user_id = users.id " .
                "ORDER BY date DESC");
            return $statement->fetch_all(MYSQLI_ASSOC);
        } else {
                $statement = self::$db->query(
                    "SELECT parts.id, part_name, description, date, full_name, car_kilometers, part_life, service_name, archive, date_replaced, part_price, user_id " .
                    "FROM parts LEFT JOIN users on parts.user_id = users.id " .
                    "WHERE users.id = $current_user " .
                    "ORDER BY date DESC");
                return $statement->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function create(string $part_name, string $description, int $car_kilometers, $part_life, $service_name, $archive, $part_price, $date, int $user_id) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO parts(part_name, description, car_kilometers, part_life, service_name, archive, part_price, date, user_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->bind_param("ssiissisi", $part_name, $description, $car_kilometers, $part_life, $service_name, $archive, $part_price, $date, $user_id);
        $statement->execute();
        return $statement->affected_rows == 1;

    }

    public function edit( string $part_name, string $description, int $car_kilometers, int $part_life, string $service_name, string $archive,int $part_price, string $date, string $id ) : bool
    {
        $statement = self::$db->prepare(
            "UPDATE parts SET part_name = ?, description = ?, car_kilometers = ?, part_life = ?, service_name = ?,  archive = ?, part_price = ?, " .
            "date = ? WHERE id = ?");
        $statement->bind_param("ssiississ",
             $part_name, $description, $car_kilometers, $part_life, $service_name, $archive, $part_price, $date, $id );
        $statement->execute();
        return $statement->affected_rows >= 0;
    }

    public function replace( int $part_life,string $archive,string $date_replaced, string $id) : bool
    {
        $statement = self::$db->prepare(
            "UPDATE parts SET part_life = ?, archive = ?, date_replaced = ? WHERE id = ?");
        $statement->bind_param("issi", $part_life, $archive, $date_replaced, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }

    public function delete(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM parts WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;

    }
}
