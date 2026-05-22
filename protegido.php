<?php

session_start();

if(!isset($_SESSION['logado'])){

    header("Location: login.php");

    exit;

}

require 'dados.php';

if(!isset($_SESSION['novas_receitas'])){

    $_SESSION['novas_receitas'] = [];

}

$mensagem = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $nome = $_POST['nome'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $tempo = $_POST['tempo'] ?? '';
    $dificuldade = $_POST['dificuldade'] ?? '';
    $avaliacao = $_POST['avaliacao'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $ingredientes = $_POST['ingredientes'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $imagem = $_POST['imagem'] ?? '';

    if(
        !empty($nome) &&
        !empty($tipo) &&
        !empty($descricao)
    ){

        $novaReceita = [

            "id" => rand(100,999),

            "nome" => $nome,

            "tipo" => $tipo,

            "categoria" => $categoria,

            "tempo" => $tempo,

            "dificuldade" => $dificuldade,

            "avaliacao" => $avaliacao,

            "descricao" => $descricao,

            "ingredientes" => $ingredientes,

            "preco" => $preco,

            "imagem" => $imagem

        ];

        $_SESSION['novas_receitas'][] = $novaReceita;

        $mensagem = "Receita cadastrada com sucesso!";

    }

}

$receitas = array_merge(
    $receitas,
    $_SESSION['novas_receitas']
);

include 'includes/cabecalho.php';

?>

<section class="admin-container">

    <div class="admin-topo">

        <h1>👨‍🍳 Painel Administrativo</h1>

        <p>
            Bem-vindo,
            <?= htmlspecialchars($_SESSION['usuario']) ?>
        </p>

        <a href="logout.php" class="btn-sair">

            Sair

        </a>

    </div>

    <?php if($mensagem): ?>

        <div class="mensagem-sucesso">

            <?= htmlspecialchars($mensagem) ?>

        </div>

    <?php endif; ?>

    <div class="admin-grid">

        <!-- FORMULÁRIO -->

        <div class="admin-form">

            <h2>➕ Nova Receita</h2>

            <form method="POST">

                <input type="text"
                       name="nome"
                       placeholder="Nome da receita">

                <input type="text"
                       name="tipo"
                       placeholder="Tipo">

                <input type="text"
                       name="categoria"
                       placeholder="Categoria">

                <input type="text"
                       name="tempo"
                       placeholder="Tempo de preparo">

                <input type="text"
                       name="dificuldade"
                       placeholder="Dificuldade">

                <input type="text"
                       name="avaliacao"
                       placeholder="Avaliação">

                <input type="text"
                       name="preco"
                       placeholder="Preço">

                <input type="text"
                       name="imagem"
                       placeholder="Caminho da imagem">

                <textarea name="descricao"
                          placeholder="Descrição"></textarea>

                <textarea name="ingredientes"
                          placeholder="Ingredientes"></textarea>

                <button type="submit">

                    Cadastrar Receita

                </button>

            </form>

        </div>

        <!-- LISTA -->

        <div class="admin-lista">

            <h2>📋 Receitas Cadastradas</h2>

            <?php foreach($receitas as $r): ?>

                <div class="admin-card">

                    <img src="<?= htmlspecialchars($r['imagem']) ?>">

                    <div>

                        <h3>

                            <?= htmlspecialchars($r['nome']) ?>

                        </h3>

                        <p>

                            <?= htmlspecialchars($r['categoria']) ?>

                        </p>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<?php include 'includes/rodape.php'; ?>