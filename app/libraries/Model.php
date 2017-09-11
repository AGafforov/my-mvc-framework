<?php

namespace app\libraries;

/**
 * Class Model
 *
 * @package app\libraries
 */
class Model
{
    protected $connection = null;

    /**
     * Model constructor.
     */
    function __construct()
    {
        $this->connection = App::getConnection();
    }

    /**
     * Selects one record by id
     *
     * @param $id
     *
     * @return array
     */
    public function selectOne($id)
    {
        if (!$id) {
            return [];
        }

        $query = "SELECT * FROM $this->tableName WHERE id = $id";

        $result = $this->connection->query($query)->fetch();

        return $result;
    }

    /**
     * Selects items from table
     *
     * @param string $fields
     * @param string $sort_field
     * @param string $sort
     * @param int    $offset
     * @param int    $limit
     *
     * @return array
     */
    public function select($fields = '*', $sort_field = 'id', $sort = 'ASC', $offset = 0, $limit = 3)
    {
        $offset = $offset * $limit;
        $query  = "SELECT $fields FROM $this->tableName  ORDER BY $sort_field $sort LIMIT $limit OFFSET $offset";
        $result = $this->connection->query($query)->fetchAll();

        return $result;
    }

    /**
     * Inserts a new row
     * Example:
     * $items = [
     *      'name' => 'John',
     *      'age' => 15
     * ]
     *
     * @param $items
     *
     * @return bool
     */
    public function insert($items)
    {
        $keys   = array_keys($items);
        $fields = implode(",", $keys);
        $values = implode(",", array_map(function ($item) {
            return ":$item";
        }, $keys));

        $statement = $this->connection->prepare("INSERT INTO $this->tableName($fields) VALUES($values)");

        return $statement->execute($items);
    }

    /**
     * @param $items
     * @param $where
     *
     * @return bool
     */
    public function update($items, $where)
    {
        $itemsKeys = array_keys($items);
        $values    = implode(",", array_map(function ($key) {
            return "$key = ?";
        }, $itemsKeys));

        $whereKeys = array_keys($where);
        $condition = implode(" AND ", array_map(function ($key) {
            return "$key = ?";
        }, $whereKeys));

        $statement = $this->connection->prepare("UPDATE $this->tableName SET $values WHERE $condition");

        return $statement->execute(array_merge(array_values($items), array_values($where)));
    }

    /**
     *  Returns row counts
     *
     * @return string
     */
    public function count()
    {
        $query = "SELECT * FROM $this->tableName";

        return $this->connection->query($query)->rowCount();
    }
}
