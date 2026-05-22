<?php

session_start();

require 'dados.php';

require 'funcoes.php';

$id = $_GET['id'] ?? 0;

$receita = buscarReceita($receitas, $id);

include 'includes/cabecalho.php';

?>

<?php if($receita): ?>

<section class="detalhes-container">

    <div class="detalhes-img">

        <img src="<?= htmlspecialchars($receita['imagem']) ?>">

    </div>

    <div class="detalhes-content">

        <span class="categoria-detalhe">

            <?= htmlspecialchars($receita['categoria']) ?>

        </span>

        <h1>

            <?= htmlspecialchars($receita['nome']) ?>

        </h1>

        <div class="info-detalhes">

            <span>
                ⭐ <?= htmlspecialchars($receita['avaliacao']) ?>
            </span>

            <span>
                ⏱ <?= htmlspecialchars($receita['tempo']) ?>
            </span>

            <span>
                🔥 <?= htmlspecialchars($receita['dificuldade']) ?>
            </span>

        </div>

        <p class="descricao-detalhe">

            <?= htmlspecialchars($receita['descricao']) ?>

        </p>

        <div class="ingredientes">

            <h3>🧾 Ingredientes</h3>

            <p>

                <?= htmlspecialchars($receita['ingredientes']) ?>

            </p>

        </div>

        <div class="preco-box">

            <h2>

                <?= htmlspecialchars($receita['preco']) ?>

            </h2>

        </div>

        <a href="index.php" class="btn">

            ← Voltar ao catálogo

        </a>

    </div>

</section>

<?php else: ?>

<section class="erro">

    <h1>Receita não encontrada.</h1>

    <a href="index.php" class="btn">

        Voltar

    </a>

</section>

<?php endif; ?>

<?php include 'includes/rodape.php'; ?>