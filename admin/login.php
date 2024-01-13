<?php
// Inclua o arquivo de conexão com o banco de dados
include '../db/connection.php';

// Inicialize a sessão
session_start();

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificar se o nome de usuário e senha são válidos (Exemplo básico, não recomendado para uso em produção)
    if ($username === "seu_usuario" && $password === "sua_senha") {
        // Login bem-sucedido, armazene o status do login na sessão
        $_SESSION["loggedin"] = true;
        // Redirecione para a página de dashboard após o login
        header("Location: admin/dashboard.php");
        exit;
    } else {
        // Login inválido, exiba uma mensagem de erro
        $loginError = "Nome de usuário ou senha inválidos.";
    }
}
?>

<?php include_once '../includes/header.php'; ?>

    <h1>Login</h1>
        <?php if (isset($loginError)) { ?>
            <p><?php echo $loginError; ?></p>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Nome de usuário:</label>
            <input type="text" name="username" required>
            <br>
            <label for="password">Senha:</label>
            <input type="password" name="password" required>
            <br>
            <input type="submit" value="Entrar">
        </form>
        
<?php include_once '../includes/footer.php'; ?>
