<?php
// Inclua o arquivo de conexão com o banco de dados
include '../includes/db_connect.php';

// Inclua o cabeçalho
include '../includes/header.php';

// Verifique se o carrinho de compras está vazio
if (empty($_SESSION['carrinho']) || !is_array($_SESSION['carrinho'])) {
    echo '<h1>Carrinho de Compras</h1>';
    echo '<p>O seu carrinho de compras está vazio.</p>';
} else {
    // Exiba o conteúdo do carrinho de compras
    echo '<h1>Carrinho de Compras</h1>';
    echo '<table>';
    echo '<tr><th>Prato</th><th>Preço</th></tr>';

    $total_pedido = 0;

    foreach ($_SESSION['carrinho'] as $prato_id => $quantidade) {
        // Consulta para buscar as informações do prato pelo ID
        $sql = "SELECT NomePrato, Preco FROM pratos WHERE ID = $prato_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $prato = mysqli_fetch_assoc($result);
            $preco_total = $prato['Preco'] * $quantidade;
            $total_pedido += $preco_total;

            echo '<tr>';
            echo '<td>' . $prato['NomePrato'] . ' (Quantidade: ' . $quantidade . ')</td>';
            echo '<td>R$ ' . number_format($preco_total, 2, ',', '.') . '</td>';
            echo '</tr>';
        }

        mysqli_free_result($result);
    }

    echo '</table>';

    // Exiba o total do pedido
    echo '<p>Total do Pedido: R$ ' . number_format($total_pedido, 2, ',', '.') . '</p>';
}

// Inclua o rodapé
include '../includes/footer.php';
?>
