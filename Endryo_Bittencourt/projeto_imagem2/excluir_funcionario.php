<?php
include 'proteger.php';
include 'conexao.php'; // Inclui o arquivo de conexão

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Primeiro obtemos informações da foto
    $sql_select = "SELECT nome_foto FROM funcionarios WHERE id = ?";
    $stmt_select = $conexao->prepare($sql_select);
    $stmt_select->bind_param("i", $id);
    $stmt_select->execute();
    $stmt_select->bind_result($nome_foto);
    $stmt_select->fetch();
    $stmt_select->close();
    
    // Remove o arquivo de foto se existir
    if (!empty($nome_foto) && file_exists("fotos/" . $nome_foto)) {
        unlink("fotos/" . $nome_foto);
    }
    
    // Remove o registro do banco de dados
    $sql_delete = "DELETE FROM funcionarios WHERE id = ?";
    $stmt_delete = $conexao->prepare($sql_delete);
    $stmt_delete->bind_param("i", $id);
    
    if ($stmt_delete->execute()) {
        $_SESSION['mensagem'] = "Funcionário excluído com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao excluir funcionário: " . $conexao->error;
    }
    
    $stmt_delete->close();
}

header("Location: consultar_funcionario.php");
exit;
?>