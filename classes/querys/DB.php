<?php

class DB
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * @param string $sql
     * @param array $blind
     * @return array|null
     */
    public function selectRow($sql, $blind = [])
    {
        try {
            return $this->db->execute_query($sql, $blind)->fetch_assoc();
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    /**
     * @param string $sql
     * @param array $blind
     * @return array|null
     */
    public function selectAll($sql, $blind = [])
    {
        try {
            return $this->db->execute_query($sql, $blind)->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    /**
     * @param string $table
     * @param array $fields
     * @return integer|null
     */
    public function save($table, $fields)
    {
        try {
            $columns = implode(", ", array_keys($fields));
            $values = "'" . implode("', '", array_values($fields)) . "'";

            $this->db->query("INSERT INTO $table ($columns) VALUES ($values)");

            return $this->db->insert_id;
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    /**
     * @param string $table
     * @param array $fields
     * @param string|array $where
     * @return integer
     */
    public function update($table, $fields, $where)
    {
        try {
            $setPart = implode(", ", array_map(function ($key) { return "$key = ?"; }, array_keys($fields)));
            $values = array_values($fields);
            $wherePart = "";
            if (is_array($where)) {
                $wherePart = "WHERE " . implode(" AND ", array_map(function ($key) { return "$key = ?"; }, array_keys($where)));
                $values = array_merge($values, array_values($where));
            } else {
                $wherePart = "WHERE $where";
            }

            $stmt = $this->db->prepare("UPDATE $table SET $setPart $wherePart");
            if ($stmt === false) {
                throw new Exception($this->db->error);
            }
            $types = "";
            foreach ($values as $value) {
                if (is_int($value)) {
                    $types .= "i";
                } elseif (is_double($value)) {
                    $types .= "d";
                } else {
                    $types .= "s";
                }
            }

            $stmt->bind_param($types, ...$values);
            $stmt->execute();

            return $stmt->affected_rows;
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    /**
     * @param string $table
     * @param string|array $where
     * @return void
     */
    public function delete($table, $where)
    {
        try {
            $wherePart = "";
            $values = [];

            if (is_array($where)) {
                $whereConditions = array_map(function ($key) { return "$key = ?"; }, array_keys($where));
                $wherePart = implode(" AND ", $whereConditions);
                $values = array_values($where);
            } else {
                $wherePart = $where;
            }

            $stmt = $this->db->prepare("DELETE FROM $table WHERE $wherePart");
            if ($stmt === false) {
                throw new Exception($this->db->error);
            }

            if (!empty($values)) {
                $types = "";
                foreach ($values as $value) {
                    if (is_int($value)) {
                        $types .= "i";
                    } elseif (is_double($value)) {
                        $types .= "d";
                    } else {
                        $types .= "s";
                    }
                }

                $stmt->bind_param($types, ...$values);
            }

            $stmt->execute();
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    public function close()
    {
        $this->db->close();
    }
}
