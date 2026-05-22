<?php

session_start();

require 'dados.php';

require 'funcoes.php';

if(!isset($_SESSION['novas_receitas'])){

    $_SESSION['novas_receitas'] = [];

}

$receitas = array_merge(
    $receitas,
    $_SESSION['novas_receitas']
);

$tipo = $_GET['tipo'] ?? '';

$busca = $_GET['busca'] ?? '';

$resultado = $receitas;


/* FILTRO POR TIPO */

if($tipo){

    $resultado = array_filter($resultado, function($r) use ($tipo){

        return stripos($r['tipo'], $tipo) !== false;

    });

}


/* BUSCA POR NOME */

if($busca){

    $resultado = array_filter($resultado, function($r) use ($busca){

        return stripos($r['nome'], $busca) !== false;

    });

}

include 'includes/cabecalho.php';

?>

<section class="filtro-hero">

    <h1>🔎 Explore Receitas</h1>

    <p>
        Encontre receitas doces, salgadas e fitness.
    </p>

</section>

<section class="filtro-container">

    <div class="filtro-box">

        <form method="GET">

            <div class="filtro-grid">

                <input type="text"
                       name="busca"
                       placeholder="Buscar receita..."
                       value="<?= htmlspecialchars($busca) ?>">

                <select name="tipo">

                    <option value="">Todas Categorias</option>

                    <option value="Doce"
                        <?= $tipo == "Doce" ? "selected" : "" ?>>
                        🍰 Doce
                    </option>

                    <option value="Salgado"
                        <?= $tipo == "Salgado" ? "selected" : "" ?>>
                        🍕 Salgado
                    </option>

                    <option value="Fitness"
                        <?= $tipo == "Fitness" ? "selected" : "" ?>>
                        🥗 Fitness
                    </option>

                </select>

                <button type="submit">

                    Buscar

                </button>

            </div>

        </form>

    </div>

</section>

<section class="resultado-info">

    <h2>

        <?= count($resultado) ?>

        receitas encontradas

    </h2>

</section>

<section class="container-cards">

<?php if(count($resultado) > 0): ?>

    <?php foreach($resultado as $r): ?>

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

                    <span>
                        ⭐ <?= htmlspecialchars($r['avaliacao']) ?>
                    </span>

                    <span>
                        ⏱ <?= htmlspecialchars($r['tempo']) ?>
                    </span>

                </div>

                <h3 class="preco">

                    <?= htmlspecialchars($r['preco']) ?>

                </h3>

                

                </a>

            </div>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <div class="nenhum-resultado">

        <h2>😢 Nenhuma receita encontrada.</h2>

    </div>

<?php endif; ?>

</section>

<?php include 'includes/rodape.php'; ?>