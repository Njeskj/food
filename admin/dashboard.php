<?php
// Inclua o arquivo de conexão com o banco de dados
include '../includes/db_connect.php';

// Inclua o cabeçalho da área administrativa
include '../includes/admin_header.php';

// Verifique se o usuário está logado (ou seja, se há uma sessão de admin válida)
// Se não estiver logado, redirecione-o para a página de login
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login.php');
    exit;
}

// Consulta para buscar todos os restaurantes cadastrados no banco de dados
$sql = "SELECT * FROM restaurantes";
$result = mysqli_query($conn, $sql);

?>

<!-- Conteúdo da página de dashboard -->
<h1>Painel de Controle - Área Administrativa</h1>

<!-- Lista de restaurantes cadastrados -->
<h2>Restaurantes Cadastrados</h2>

<?php
// Verifique se há restaurantes cadastrados
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Exiba as informações de cada restaurante
        echo '<div>';
        echo '<h3>' . $row['NomeRestaurante'] . '</h3>';
        echo '<p>Descrição: ' . $row['Descricao'] . '</p>';
        echo '<p>Endereço: ' . $row['Endereco'] . '</p>';
        echo '<p>Telefone: ' . $row['Telefone'] . '</p>';
        echo '<p>Email: ' . $row['Email'] . '</p>';
        echo '</div>';
    }
} else {
    // Caso não haja restaurantes cadastrados, exiba uma mensagem informativa
    echo '<p>Nenhum restaurante cadastrado no momento.</p>';
}

// Libere os resultados da consulta
mysqli_free_result($result);

// Inclua o rodapé da área administrativa
include '../includes/admin_footer.php';
?>
