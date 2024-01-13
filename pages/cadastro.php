<?php
// Inclua o arquivo de conexão com o banco de dados
include '../includes/db_connect.php';

// Inclua o cabeçalho
include '../includes/header.php';

// Variáveis para armazenar os dados do formulário
$nome_restaurante = '';
$descricao = '';
$endereco = '';
$telefone = '';
$email = '';

// Variável para exibir mensagens de erro
$erro = '';

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os dados do formulário
    $nome_restaurante = $_POST["nome_restaurante"];
    $descricao = $_POST["descricao"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

    // Valide os dados do formulário (faça a validação de acordo com suas regras)
    // Aqui você pode verificar se os campos obrigatórios foram preenchidos e se os formatos estão corretos

    // Se os dados forem válidos, insira o novo restaurante no banco de dados
    if (empty($erro)) {
        $sql = "INSERT INTO restaurantes (NomeRestaurante, Descricao, Endereco, Telefone, Email)
                VALUES ('$nome_restaurante', '$descricao', '$endereco', '$telefone', '$email')";
        if (mysqli_query($conn, $sql)) {
            // Redirecione para a página de listagem de restaurantes após o cadastro bem-sucedido
            header('Location: restaurantes.php');
            exit;
        } else {
            $erro = "Erro ao cadastrar o restaurante. Por favor, tente novamente.";
        }
    }
}
?>

<!-- Conteúdo da página de cadastro de restaurantes -->
<h1>Cadastrar Novo Restaurante</h1>

<!-- Exiba mensagens de erro, caso existam -->
<?php if (!empty($erro)) {
    echo '<p>' . $erro . '</p>';
} ?>

<!-- Formulário de cadastro de restaurante -->
<form method="post">
    <label for="nome_restaurante">Nome do Restaurante:</label>
    <input type="text" name="nome_restaurante" id="nome_restaurante" value="<?php echo $nome_restaurante; ?>" required>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao" required><?php echo $descricao; ?></textarea>

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" id="endereco" value="<?php echo $endereco; ?>" required>

    <label for="telefone">Telefone:</label>
    <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone; ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>

    <button type="submit">Cadastrar</button>
</form>

<?php
// Inclua o rodapé
include '../includes/footer.php';
?>
