<?php

namespace App;
use Aura\SqlQuery\QueryFactory;
use PDO;

class QueryBuilder {

    private $pdo;
    private $queryFactory;

    public function __construct() {    
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=marlin-oop-3", 'root', 'root');
        }
        catch (PDOException $exception) {
            die($exception->getMessage());
        }
        
        $this->queryFactory = new QueryFactory('mysql');
    }

    public function getAll($table) {
        $select = $this->queryFactory->newSelect();
        $select
        ->cols(['*'])
        ->from($table);

        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());
        
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getOne($table, $id) {
        $select = $this->queryFactory->newSelect();
        $select
        ->cols(['*'])
        ->from($table)
        ->where('id = :id')
        ->bindValues(['id' => $id]);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());        
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($table, $data) {
        $insert = $this->queryFactory->newInsert();
        $insert
        ->into($table)
        ->cols($data);

        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());
    }

    public function update($table, $id, $data) {
        $update = $this->queryFactory->newUpdate();
        $update->table($table)
        ->cols($data)
        ->where('id = :id')
        ->bindValues(['id' => $id]);        

        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());
    }

    public function delete($table, $id) {
        $delete = $this->queryFactory->newDelete();
        $delete
        ->from($table)
        ->where('id = :id')
        ->bindValues(['id' => $id]);

        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());
    }
}
?>