<?php
// Verifique se foi fornecido um ID de restaurante válido na URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Redirecione para a página de restaurantes caso o ID não seja válido
    header('Location: restaurantes.php');
    exit;
}

// Inclua o arquivo de conexão com o banco de dados
include '../includes/db_connect.php';

// Inclua o cabeçalho
include '../includes/header.php';

// Obtenha o ID do restaurante a partir da URL
$restaurante_id = $_GET['id'];

// Consulta para buscar as informações do restaurante pelo ID
$sql_restaurante = "SELECT * FROM restaurantes WHERE ID = $restaurante_id";
$result_restaurante = mysqli_query($conn, $sql_restaurante);

// Verifique se o restaurante existe
if (mysqli_num_rows($result_restaurante) === 0) {
    // Redirecione para a página de restaurantes caso o restaurante não seja encontrado
    header('Location: restaurantes.php');
    exit;
}

// Busque os detalhes do restaurante
$restaurante = mysqli_fetch_assoc($result_restaurante);

// Consulta para buscar o cardápio do restaurante pelo ID
$sql_cardapio = "SELECT * FROM pratos WHERE RestauranteID = $restaurante_id";
$result_cardapio = mysqli_query($conn, $sql_cardapio);

?>

<!-- Conteúdo da página de cardápio -->
<h1>Cardápio do Restaurante <?php echo $restaurante['NomeRestaurante']; ?></h1>
<p>Descrição: <?php echo $restaurante['Descricao']; ?></p>
<p>Endereço: <?php echo $restaurante['Endereco']; ?></p>
<p>Telefone: <?php echo $restaurante['Telefone']; ?></p>
<p>Email: <?php echo $restaurante['Email']; ?></p>

<!-- Lista de pratos no cardápio -->
<h2>Pratos Disponíveis</h2>

<?php
// Verifique se há pratos no cardápio
if (mysqli_num_rows($result_cardapio) > 0) {
    while ($prato = mysqli_fetch_assoc($result_cardapio)) {
        // Exiba as informações de cada prato
        echo '<div>';
        echo '<h3>' . $prato['NomePrato'] . '</h3>';
        echo '<p>' . $prato['Descricao'] . '</p>';
        echo '<p>Preço: R$ ' . number_format($prato['Preco'], 2, ',', '.') . '</p>';
        echo '</div>';
    }
} else {
    // Caso não haja pratos no cardápio, exiba uma mensagem informativa
    echo '<p>Nenhum prato disponível no cardápio deste restaurante.</p>';
}

// Libere os resultados das consultas
mysqli_free_result($result_restaurante);
mysqli_free_result($result_cardapio);

// Inclua o rodapé
include '../includes/footer.php';
?>
