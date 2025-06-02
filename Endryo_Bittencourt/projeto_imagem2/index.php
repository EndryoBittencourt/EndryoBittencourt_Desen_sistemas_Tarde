<?php include 'proteger.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Funcionários</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        :root {
            --primary-color: #6b21a8;
            --primary-hover: #9333ea;
            --secondary-color: #f3e8ff;
            --background: #f9fafb;
            --white: #ffffff;
            --gray-light: #e5e7eb;
            --gray-dark: #6b7280;
            --success: #10b981;
            --warning: #f59e0b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background);
            color: #333;
            line-height: 1.6;
        }

        .dashboard {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .welcome-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-hover) 100%);
            color: white;
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .welcome-section h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .welcome-section p {
            opacity: 0.9;
            margin-bottom: 1rem;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-card h3 {
            color: var(--gray-dark);
            font-size: 1rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stat-card .value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-card .description {
            color: var(--gray-dark);
            font-size: 0.875rem;
        }

        .quick-actions {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .quick-actions h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .action-button {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem;
            background: var(--secondary-color);
            color: var(--primary-color);
            border: none;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
        }

        .action-button:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .recent-activity {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .recent-activity h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            padding: 1rem 0;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--secondary-color);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .activity-content {
            flex-grow: 1;
        }

        .activity-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .activity-time {
            color: var(--gray-dark);
            font-size: 0.875rem;
        }

        @media (max-width: 768px) {
            .dashboard {
                padding: 0 1rem;
            }
            
            .welcome-section {
                padding: 1.5rem;
            }
            
            .stat-card {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
    
    <div class="dashboard">
        <section class="welcome-section">
            <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
            <p>Gerencie seus funcionários de forma eficiente e intuitiva.</p>
        </section>

        <div class="stats-container">
            <div class="stat-card">
                <h3><span>👥</span> Total de Funcionários</h3>
                <div class="value">
                    <?php
                    include 'conexao.php';
                    $sql = "SELECT COUNT(*) as total FROM funcionarios";
                    $result = $conexao->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['total'];
                    ?>
                </div>
                <p class="description">Número total de funcionários cadastrados</p>
            </div>

            <div class="stat-card">
                <h3><span>📅</span> Cadastros Recentes</h3>
                <div class="value">
                    <?php
                    $sql = "SELECT COUNT(*) as recentes FROM funcionarios WHERE data_cadastro >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
                    $result = $conexao->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['recentes'];
                    ?>
                </div>
                <p class="description">Novos cadastros nos últimos 7 dias</p>
            </div>

            <div class="stat-card">
                <h3><span>📸</span> Com Fotos</h3>
                <div class="value">
                    <?php
                    $sql = "SELECT COUNT(*) as com_fotos FROM funcionarios WHERE foto IS NOT NULL";
                    $result = $conexao->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['com_fotos'];
                    ?>
                </div>
                <p class="description">Funcionários com fotos cadastradas</p>
            </div>
        </div>

        <section class="quick-actions">
            <h2>Ações Rápidas</h2>
            <div class="action-buttons">
                <a href="cadastro_funcionario.php" class="action-button">
                    <span>➕</span> Cadastrar Novo
                </a>
                <a href="consultar_funcionario.php" class="action-button">
                    <span>🔍</span> Consultar
                </a>
            </div>
        </section>

    </div>
</body>
</html>