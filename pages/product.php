<?php
// Simulando um banco de dados com informações dos produtos
$products = array(
    array(
        'name' => 'Pizza de Calabresa',
        'price' => 25.00,
        'description' => 'Deliciosa pizza de calabresa com queijo derretido e molho de tomate.',
        'options' => array('Tamanho' => array('Pequena', 'Média', 'Grande')),
    ),
    array(
        'name' => 'Hambúrguer',
        'price' => 15.00,
        'description' => 'Suculento hambúrguer com carne, queijo, alface e molho especial.',
        'options' => array('Adicionais' => array('Ovo', 'Bacon', 'Queijo Extra')),
    ),
    // Adicione mais produtos aqui...
);

// Obtém o ID do produto a partir do parâmetro "id" da URL
$product_id = $_GET['id'] ?? null;

// Verifica se o ID é válido e se o produto existe no banco de dados simulado
if ($product_id !== null && array_key_exists($product_id, $products)) {
    $product = $products[$product_id];
} else {
    // Redirecionar para uma página de erro ou para a página inicial
    header("Location: index.php?page=home");
    exit;
}
?>

<main>
    <h1><?php echo $product['name']; ?></h1>
    <p><?php echo $product['description']; ?></p>
    
    <?php if (!empty($product['options'])): ?>
        <h2>Opções:</h2>
        <ul>
            <?php foreach ($product['options'] as $option_name => $options): ?>
                <li>
                    <?php echo $option_name; ?>:
                    <?php foreach ($options as $option): ?>
                        <label>
                            <input type="radio" name="<?php echo $option_name; ?>" value="<?php echo $option; ?>">
                            <?php echo $option; ?>
                        </label>
                    <?php endforeach; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <p>Preço: R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></p>

    <button onclick="addToCart(<?php echo $product_id; ?>)">Adicionar ao Carrinho</button>
</main>

<script>
    function addToCart(productId) {
        // Implemente a lógica para adicionar o produto ao carrinho usando JavaScript
        // Você pode usar localStorage ou sessionStorage para armazenar temporariamente os itens do carrinho
        // e enviar os dados do carrinho para o servidor quando o usuário finalizar o pedido.
        alert('Produto adicionado ao carrinho!');
    }
</script>
