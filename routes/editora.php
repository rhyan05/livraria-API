<?php
require_once '../db.php';

class Editora {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getEditoras() {
        $query = "SELECT * FROM Editora";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createEditora($nome_editora, $status_editora) {
        $query = "INSERT INTO Editora (nome_editora, status_editora) VALUES (:nome_editora, :status_editora)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome_editora", $nome_editora);
        $stmt->bindParam(":status_editora", $status_editora);
        if ($stmt->execute()) {
            return ['message' => 'Editora criada com sucesso'];
        } else {
            return ['message' => 'Erro ao criar editora'];
        }
    }

    public function updateEditora($id_editora, $nome_editora, $status_editora) {
        $query = "UPDATE Editora SET nome_editora = :nome_editora, status_editora = :status_editora WHERE id_editora = :id_editora";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_editora", $id_editora);
        $stmt->bindParam(":nome_editora", $nome_editora);
        $stmt->bindParam(":status_editora", $status_editora);
        if ($stmt->execute()) {
            return ['message' => 'Editora atualizada com sucesso'];
        } else {
            return ['message' => 'Erro ao atualizar editora'];
        }
    }

    public function deleteEditora($id_editora) {
        $query = "DELETE FROM Editora WHERE id_editora = :id_editora";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_editora", $id_editora);
        if ($stmt->execute()) {
            return ['message' => 'Editora excluída com sucesso'];
        } else {
            return ['message' => 'Erro ao excluir editora'];
        }
    }
}

// Lógica de roteamento
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $database = new Database();
    $db = $database->getConnection();
    $editora = new Editora($db);
    echo json_encode($editora->getEditoras());

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $database = new Database();
    $db = $database->getConnection();
    $editora = new Editora($db);
    echo json_encode($editora->createEditora($data['nome_editora'], $data['status_editora']));

} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    $database = new Database();
    $db = $database->getConnection();
    $editora = new Editora($db);
    echo json_encode($editora->updateEditora($data['id_editora'], $data['nome_editora'], $data['status_editora']));

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    $database = new Database();
    $db = $database->getConnection();
    $editora = new Editora($db);
    echo json_encode($editora->deleteEditora($data['id_editora']));
}
?>
