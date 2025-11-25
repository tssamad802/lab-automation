<?php
class model
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function check_record($table, $conditions = [])
    {
        $password = null;
        if (isset($conditions['pwd'])) {
            $password = $conditions['pwd'];
            unset($conditions['pwd']);
        }

        
        $where = [];
        foreach ($conditions as $column => $value) {
            $where[] = "$column = :$column";
        }
        $where_clause = $where ? implode(' AND ', $where) : '1';

        $sql = "SELECT * FROM $table WHERE $where_clause";
        $stmt = $this->conn->prepare($sql);

        foreach ($conditions as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        if ($password !== null) {
            foreach ($results as $key => $row) {
                if (!isset($row['pwd']) || !password_verify($password, $row['pwd'])) {
                    unset($results[$key]);
                }
            }
        }

        return $results;
    }



    public function insert_record($table, $data = [])
    {
        if (isset($data['pwd'])) {
            $data['pwd'] = md5($data['password']);
        }

        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }

        return $stmt->execute();
    }


    public function fetch_records($table, $conditions = [])
    {
        if (empty($conditions)) {
            $sql = "SELECT * FROM $table";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $where = [];
        foreach ($conditions as $column => $value) {
            $where[] = "$column = :$column";
        }
        $where_clause = implode(' AND ', $where);

        $sql = "SELECT * FROM $table WHERE $where_clause";
        $stmt = $this->conn->prepare($sql);

        foreach ($conditions as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search($val)
    {
        $sql = "SELECT * FROM testing WHERE product LIKE :val";
        $stmt = $this->conn->prepare($sql);
        $val = "%$val%";
        $stmt->bindParam(":val", $val);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);

    }

    // Single method for counting any table
    public function countRows($table)
    {
        $sql = "SELECT COUNT(*) FROM $table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function countByResult($value)
    {
        $sql = "SELECT COUNT(*) FROM testing WHERE result = :val";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':val', $value);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

}

?>