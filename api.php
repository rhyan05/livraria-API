<?php
require_once 'tabelas/Editora.php';
require_once 'tabelas/Autor.php';
require_once 'tabelas/Livro.php';
require_once 'tabelas/Estoque.php';
require_once 'tabelas/Livraria.php';

header("Content-Type: application/json");

$fn = $_REQUEST['fn'] ?? null;
$type = $_REQUEST['type'] ?? null;
$id = $_REQUEST['id'] ?? 0;
$name = $_REQUEST['name'] ?? null;
$status = $_REQUEST['status'] ?? null;
$id_editora = $_REQUEST['id_editora'] ?? null;
$id_autor = $_REQUEST['id_autor'] ?? null;
$data_lancamento = $_REQUEST['data_lancamento'] ?? null;
$id_livro = $_REQUEST['id_livro'] ?? null;
$id_estoque = $_REQUEST['id_estoque'] ?? null;

$data = [];

switch ($type) {
    case 'editora':
        $editora = new Editora();
        $editora->setID($id);
        $editora->setNome($name);
        $editora->setStatus($status);
        
        if ($fn === "create" && $name !== null) {
            $data["editora"] = $editora->create();
        } elseif ($fn === "read") {
            if ($id > 0) {
                $data["editora"] = $editora->readByID(); // Lê editora pelo ID
            } else {
                $data["editora"] = $editora->read(); // Lê todas as editoras
            }
        } elseif ($fn === "update" && $id > 0 && $name !== null) {
            $data["editora"] = $editora->update();
        } elseif ($fn === "delete" && $id > 0) {
            $data["editora"] = $editora->delete();
        } else {
            $data["error"] = "Parâmetros inválidos para Editora.";
        }
        break;

    case 'autor':
        $autor = new Autor();
        $autor->setID($id);
        $autor->setNome($name);
        
        if ($fn === "create" && $name !== null) {
            $data["autor"] = $autor->create();
        } elseif ($fn === "read") {
            if ($id > 0) {
                $data["autor"] = $autor->readByID(); // Lê autor pelo ID
            } else {
                $data["autor"] = $autor->read(); // Lê todos os autores
            }
        } elseif ($fn === "update" && $id > 0 && $name !== null) {
            $data["autor"] = $autor->update();
        } elseif ($fn === "delete" && $id > 0) {
            $data["autor"] = $autor->delete();
        } else {
            $data["error"] = "Parâmetros inválidos para Autor.";
        }
        break;

    case 'livro':
        $livro = new Livro();
        $livro->setID($id_livro);
        $livro->setNome($name);
        $livro->setEditora($id_editora);
        $livro->setAutor($id_autor);
        $livro->setDataLancamento($data_lancamento);
        $livro->setStatus($status);
        
        if ($fn === "create" && $name !== null) {
            $data["livro"] = $livro->create();
        } elseif ($fn === "read") {
            if ($id_livro > 0) {
                $data["livro"] = $livro->readByID(); // Lê livro pelo ID
            } else {
                $data["livro"] = $livro->read(); // Lê todos os livros
            }
        } elseif ($fn === "update" && $id_livro > 0 && $name !== null) {
            $data["livro"] = $livro->update();
        } elseif ($fn === "delete" && $id_livro > 0) {
            $data["livro"] = $livro->delete();
        } else {
            $data["error"] = "Parâmetros inválidos para Livro.";
        }
        break;

    case 'estoque':
        $estoque = new Estoque();
        $estoque->setID($id_estoque);
        $estoque->setStatus($status);
        $estoque->setLivro($id_livro);
        
        if ($fn === "create" && $status !== null) {
            $data["estoque"] = $estoque->create();
        } elseif ($fn === "read") {
            if ($id_estoque > 0) {
                $data["estoque"] = $estoque->readByID(); // Lê estoque pelo ID
            } else {
                $data["estoque"] = $estoque->read(); // Lê todos os estoques
            }
        } elseif ($fn === "update" && $id_estoque > 0) {
            $data["estoque"] = $estoque->update();
        } elseif ($fn === "delete" && $id_estoque > 0) {
            $data["estoque"] = $estoque->delete();
        } else {
            $data["error"] = "Parâmetros inválidos para Estoque.";
        }
        break;

    case 'livraria':
        $livraria = new Livraria();
        $livraria->setID($id);
        $livraria->setNome($name);
        $livraria->setEstoque($id_estoque);
        $livraria->setLivro($id_livro);
        
        if ($fn === "create" && $name !== null) {
            $data["livraria"] = $livraria->create();
        } elseif ($fn === "read") {
            if ($id > 0) {
                $data["livraria"] = $livraria->readByID(); // Lê livraria pelo ID
            } else {
                $data["livraria"] = $livraria->read(); // Lê todas as livrarias
            }
        } elseif ($fn === "update" && $id > 0) {
            $data["livraria"] = $livraria->update();
        } elseif ($fn === "delete" && $id > 0) {
            $data["livraria"] = $livraria->delete();
        } else {
            $data["error"] = "Parâmetros inválidos para Livraria.";
        }
        break;

    default:
        $data["error"] = "Tipo inválido.";
}

// Retorna os dados em formato JSON
echo json_encode($data);
?>
