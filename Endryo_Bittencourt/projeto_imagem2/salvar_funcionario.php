<?php
// Ativa exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "bd_imagem";

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $fotoBlob = null;
    $nome_foto = null;
    $tipo_foto = null;

    // Verifica se uma foto foi enviada
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $nome_foto = $_FILES['foto']['name'];
        $tipo_foto = $_FILES['foto']['type'];
        $fotoBlob = file_get_contents($_FILES['foto']['tmp_name']);
    }

    // Prepara e executa inserção
    $stmt = $conn->prepare("INSERT INTO funcionarios (nome, telefone, nome_foto, tipo_foto, foto) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $telefone, $nome_foto, $tipo_foto, $fotoBlob);

    if ($stmt->execute()) {
        echo "Funcionário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar funcionário: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Requisição inválida.";
}

$conn->close();
?>
