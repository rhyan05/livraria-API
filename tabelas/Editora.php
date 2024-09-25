<?php
require_once 'db.php';

class Editora {
    private $id_editora;
    private $nome_editora;
    private $status_editora;

    public function setID($id) {
        $this->id_editora = $id;
    }

    public function setNome($nome) {
        $this->nome_editora = $nome;
    }

    public function setStatus($status) {
        $this->status_editora = $status;
    }

    public function create() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Editora (nome_editora, status_editora) VALUES (?, ?)");
        $stmt->execute([$this->nome_editora, $this->status_editora]);
        return $pdo->lastInsertId();
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Editora");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readByID() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Editora WHERE id_editora = :id");
        $stmt->bindParam(':id', $this->id_editora, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Editora SET nome_editora = ?, status_editora = ? WHERE id_editora = ?");
        $stmt->execute([$this->nome_editora, $this->status_editora, $this->id_editora]);
        return $stmt->rowCount();
    }

    public function delete() {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Editora WHERE id_editora = ?");
        $stmt->execute([$this->id_editora]);
        return $stmt->rowCount();
    }
}
?>
