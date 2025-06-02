<div class="topnav">
    <div class="dropdown">
        <a href="index.php">Início</a>
        <div class="dropdown-content">
            <a href="cadastro_funcionario.php">Cadastrar Funcionário</a>
            <a href="consultar_funcionario.php">Consultar Funcionário</a>
        </div>
    </div>
    <a href="logout.php" class="sair">Sair</a>
</div>

<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    left: 0;
    top: 100%;
    background-color: #6b21a8;
    min-width: 180px;
    z-index: 1;
    flex-direction: column;
}

.dropdown-content a {
    color: white;
    padding: 14px 16px;
    display: block;
    text-align: left;
}

.dropdown:hover .dropdown-content {
    display: flex;
}

.dropdown-content a:hover {
    background-color: #9333ea;
}
</style>