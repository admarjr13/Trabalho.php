<?php

session_start();

$usuarioCorreto = "admin";

$senhaHash = password_hash("1234", PASSWORD_DEFAULT);

$erro = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $usuario = $_POST['usuario'] ?? '';

    $senha = $_POST['senha'] ?? '';

    if(
        !empty($usuario) &&
        !empty($senha)
    ){

        if(
            $usuario === $usuarioCorreto &&
            password_verify($senha, $senhaHash)
        ){

            $_SESSION['logado'] = true;

            $_SESSION['usuario'] = $usuario;

            header("Location: protegido.php");

            exit;

        }else{

            $erro = "Usuário ou senha inválidos.";

        }

    }else{

        $erro = "Preencha todos os campos.";

    }

}

include 'includes/cabecalho.php';

?>

<section class="login-container">

    <div class="login-box">

        <h1>🔐 Login Administrativo</h1>

        <p>
            Acesse a área protegida do sistema.
        </p>

        <?php if($erro): ?>

            <div class="erro-login">

                <?= htmlspecialchars($erro) ?>

            </div>

        <?php endif; ?>

        <form method="POST">

            <input type="text"
                   name="usuario"
                   placeholder="Usuário">

            <input type="password"
                   name="senha"
                   placeholder="Senha">

            <button type="submit" class="btn-login">

                Entrar

            </button>

        </form>

        <div class="login-info">

           

        </div>

    </div>

</section>

<?php include 'includes/rodape.php'; ?>