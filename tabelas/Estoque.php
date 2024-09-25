<?php
require_once 'db.php';

class Estoque {
    private $id_estoque;
    private $status_estoque;
    private $id_livro;

    public function setID($id) {
        $this->id_estoque = $id;
    }

    public function setStatus($status) {
        $this->status_estoque = $status;
    }

    public function setLivro($id_livro) {
        $this->id_livro = $id_livro;
    }

    public function create() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Estoque (status_estoque, id_livro) VALUES (?, ?)");
        $stmt->execute([$this->status_estoque, $this->id_livro]);
        return $pdo->lastInsertId();
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Estoque");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readByID() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Estoque WHERE id_estoque = :id");
        $stmt->bindParam(':id', $this->id_estoque, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Estoque SET status_estoque = ?, id_livro = ? WHERE id_estoque = ?");
        $stmt->execute([$this->status_estoque, $this->id_livro, $this->id_estoque]);
        return $stmt->rowCount();
    }

    public function delete() {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Estoque WHERE id_estoque = ?");
        $stmt->execute([$this->id_estoque]);
        return $stmt->rowCount();
    }
}
?>
