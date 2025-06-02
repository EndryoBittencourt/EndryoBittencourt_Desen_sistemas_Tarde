<?php
include 'proteger.php';
include 'conexao.php';

// Verifica se há mensagens para exibir
if (isset($_SESSION['mensagem'])) {
    echo '<div class="mensagem">' . $_SESSION['mensagem'] . '</div>';
    unset($_SESSION['mensagem']);
}
if (isset($_SESSION['erro'])) {
    echo '<div class="erro">' . $_SESSION['erro'] . '</div>';
    unset($_SESSION['erro']);
}

$sql = "SELECT id, nome, telefone, foto, tipo_foto FROM funcionarios";
$result = $conexao->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conexao->error);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Funcionários</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin: 20px auto;
            max-width: 1000px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #6b21a8;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .foto-cell {
            width: 80px;
        }
        .foto-cell img {
            max-width: 60px;
            max-height: 60px;
            border-radius: 4px;
            object-fit: cover;
        }
        .acoes-cell a {
            color: #6b21a8;
            text-decoration: none;
            margin-right: 10px;
        }
        .acoes-cell a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
    
    <div class="container">
        <h2>Lista de Funcionários</h2>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th class="foto-cell">Foto</th>
                    <th class="acoes-cell">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nome']); ?></td>
                        <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                        <td class="foto-cell">
                            <?php if (!empty($row['foto'])) { ?>
                                <img src="data:<?php echo $row['tipo_foto']; ?>;base64,<?php echo base64_encode($row['foto']); ?>" alt="Foto do funcionário">
                            <?php } else { ?>
                                <div class="sem-foto">Sem foto</div>
                            <?php } ?>
                        </td>
                        <td class="acoes-cell">
                            <a href='visualizar_funcionario.php?id=<?php echo $row["id"]; ?>'>Visualizar</a>
                            <a href='excluir_funcionario.php?id=<?php echo $row["id"]; ?>' 
                               onclick="return confirm('Tem certeza que deseja excluir este funcionário?')">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>