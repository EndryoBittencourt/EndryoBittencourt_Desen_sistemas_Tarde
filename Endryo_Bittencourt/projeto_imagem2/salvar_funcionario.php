<?php
include 'proteger.php';
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $fotoBlob = null;
    $nome_foto = null;
    $tipo_foto = null;

    // Processar foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Verificar tipo de arquivo
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $tipo_foto = $_FILES['foto']['type'];
        
        if (in_array($tipo_foto, $allowed_types)) {
            $nome_foto = basename($_FILES['foto']['name']);
            $fotoBlob = file_get_contents($_FILES['foto']['tmp_name']);
        } else {
            $_SESSION['erro'] = "Tipo de arquivo não permitido. Use apenas JPEG, PNG ou GIF.";
            header("Location: cadastro_funcionario.php");
            exit;
        }
    }

    // Inserir no banco de dados
    $stmt = $conexao->prepare("INSERT INTO funcionarios 
                              (nome, telefone, foto, nome_foto, tipo_foto) 
                              VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $telefone, $fotoBlob, $nome_foto, $tipo_foto);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Funcionário cadastrado com sucesso!";
        header("Location: consultar_funcionario.php");
        exit;
    } else {
        $_SESSION['erro'] = "Erro ao cadastrar funcionário: " . $conexao->error;
        header("Location: cadastro_funcionario.php");
        exit;
    }
} else {
    $_SESSION['erro'] = "Requisição inválida.";
    header("Location: cadastro_funcionario.php");
    exit;
}
?>