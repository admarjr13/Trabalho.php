<?php

session_start();

require 'dados.php';

include 'includes/cabecalho.php';

?>

<section class="hero">

    <div class="hero-text">

        <h1>As melhores receitas gourmet</h1>

        <p>
            Descubra receitas doces, salgadas e fitness.
        </p>


    </div>

</section>

<section class="titulo-section">

    <h2>⭐ Receitas em Destaque</h2>

</section>

<section class="container-cards">

<?php foreach($receitas as $r): ?>

<div class="card">

    <img src="<?= htmlspecialchars($r['imagem']) ?>">

    <div class="card-content">

        <h2>

            <?= htmlspecialchars($r['nome']) ?>

        </h2>

        <span class="categoria">

            <?= htmlspecialchars($r['categoria']) ?>

        </span>

        <p>

            <?= htmlspecialchars($r['descricao']) ?>

        </p>

        <div class="info">

            <span>⭐ <?= $r['avaliacao'] ?></span>

            <span>⏱ <?= $r['tempo'] ?></span>

        </div>

        <h3 class="preco">

            <?= htmlspecialchars($r['preco']) ?>


        </a>

    </div>

</div>

<?php endforeach; ?>

</section>

<?php include 'includes/rodape.php'; ?>