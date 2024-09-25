<?php
require_once 'db.php';

class Livraria {
    private $id_livraria;
    private $nome_livraria;
    private $id_estoque;
    private $id_livro;

    public function setID($id) {
        $this->id_livraria = $id;
    }

    public function setNome($nome) {
        $this->nome_livraria = $nome;
    }

    public function setEstoque($id_estoque) {
        $this->id_estoque = $id_estoque;
    }

    public function setLivro($id_livro) {
        $this->id_livro = $id_livro;
    }

    public function create() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Livraria (nome_livraria, id_estoque, id_livro) VALUES (?, ?, ?)");
        $stmt->execute([$this->nome_livraria, $this->id_estoque, $this->id_livro]);
        return $pdo->lastInsertId();
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Livraria");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readByID() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Livraria WHERE id_livraria = :id");
        $stmt->bindParam(':id', $this->id_livraria, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Livraria SET nome_livraria = ?, id_estoque = ?, id_livro = ? WHERE id_livraria = ?");
        $stmt->execute([$this->nome_livraria, $this->id_estoque, $this->id_livro, $this->id_livraria]);
        return $stmt->rowCount();
    }

    public function delete() {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Livraria WHERE id_livraria = ?");
        $stmt->execute([$this->id_livraria]);
        return $stmt->rowCount();
    }
}
?>
