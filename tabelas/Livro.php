<?php
require_once 'db.php';

class Livro {
    private $id_livro;
    private $nome_livro;
    private $id_editora;
    private $id_autor;
    private $data_lancamento;
    private $status_matricula;

    public function setID($id) {
        $this->id_livro = $id;
    }

    public function setNome($nome) {
        $this->nome_livro = $nome;
    }

    public function setEditora($id_editora) {
        $this->id_editora = $id_editora;
    }

    public function setAutor($id_autor) {
        $this->id_autor = $id_autor;
    }

    public function setDataLancamento($data) {
        $this->data_lancamento = $data;
    }

    public function setStatus($status) {
        $this->status_matricula = $status;
    }

    public function create() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Livro (nome_livro, id_editora, id_autor, data_lancamento, status_matricula) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->nome_livro, $this->id_editora, $this->id_autor, $this->data_lancamento, $this->status_matricula]);
        return $pdo->lastInsertId();
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Livro");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readByID() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Livro WHERE id_livro = :id");
        $stmt->bindParam(':id', $this->id_livro, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Livro SET nome_livro = ?, id_editora = ?, id_autor = ?, data_lancamento = ?, status_matricula = ? WHERE id_livro = ?");
        $stmt->execute([$this->nome_livro, $this->id_editora, $this->id_autor, $this->data_lancamento, $this->status_matricula, $this->id_livro]);
        return $stmt->rowCount();
    }

    public function delete() {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Livro WHERE id_livro = ?");
        $stmt->execute([$this->id_livro]);
        return $stmt->rowCount();
    }
}
?>
