<?php 
    class Mysql extends MyConnection
    {
        private \PDO $connection;
        private $strQuery;
        private $arrValues;

        /**
         * Constructor
         */
        public function __construct() {
            $this->connection = new MyConnection();
            // $this->connection = $this->connection->connect();
        }

        public function insert(string $query, array $arrvalues)
        {
            $this->strQuery = $query;
            $this->arrValues = $arrvalues;
            $insert = $this->connection->prepare($this->strQuery);
            $resInsert = $insert->execute($this->arrValues);
            if ($resInsert) {
                $lastInsertId = $this->connection->lastInsertId();
            } else {
                $lastInsertId = 0;
            }
            return $lastInsertId;
        }
        // Search one element
        public function select(string $query)
        {
            $this->strQuery = $query;
            $result = $this->connection->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        // Get all data
        public function select_all(string $query)
        {
            $this->strQuery = $query;
            $result = $this->connection->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }

        public function update(string $query, array $arrvalues)
        {
            $this->strQuery = $query;
            $this->arrValues = $arrvalues;
            $update = $this->connection->prepare($this->strQuery);
            $resExecute = $update->execute($this->arrValues);            
            return $resExecute;
        }

        public function delete(string $query)
        {
            $this->strQuery = $query;
            $result = $this->connection->prepare($this->strQuery);
            $result->execute();            
            return $result;
        }
    }
?>