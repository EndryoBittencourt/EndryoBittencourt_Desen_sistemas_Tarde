<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        :root {
            --primary-color: #6b21a8;
            --primary-hover: #9333ea;
            --background: #f9fafb;
            --white: #ffffff;
            --gray-light: #e5e7eb;
            --gray-dark: #6b7280;
            --error: #ef4444;
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

        .form-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: var(--white);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--gray-dark);
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--gray-light);
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="file"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(107, 33, 168, 0.1);
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
            cursor: pointer;
        }

        .file-input-label {
            display: inline-block;
            padding: 0.75rem;
            background-color: var(--gray-light);
            border: 1px dashed var(--gray-dark);
            border-radius: 4px;
            text-align: center;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-input-label:hover {
            background-color: #e0e0e0;
        }

        .file-name {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray-dark);
        }

        button[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: var(--primary-hover);
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .form-container {
                margin: 1rem;
                padding: 1.5rem;
            }
        }

        /* Estilo para o menu */
        <?php include 'menu.php'; ?>
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
    
    <div class="form-container">
        <form action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">
            <h1>Cadastro de Funcionário</h1>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone">
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <div class="file-input-wrapper">
                    <label for="foto" class="file-input-label">
                        Selecione uma foto...
                        <input type="file" name="foto" id="foto" accept="image/*">
                    </label>
                </div>
                <div id="file-name" class="file-name"></div>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <script>
        // Mostra o nome do arquivo selecionado
        document.getElementById('foto').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Nenhum arquivo selecionado';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
</body>
</html>