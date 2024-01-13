
<!-- // Header -->
<?php include_once 'includes/header.php'; ?>

<h1>Lista de Restaurantes</h1>
    <div class="grid-container">
        <?php
        // Inclui o arquivo de conexão com o banco de dados
        include 'db/connection.php';

        // Consulta para obter os dados da tabela 'restaurantes'
        $query = "SELECT * FROM restaurantes";
        $stmt = $conn->query($query);

        // Verifica se a consulta retornou resultados
        if ($stmt->rowCount() > 0) {
            // Loop para exibir os dados dos restaurantes
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='restaurante'>";
                echo "<h2>{$row['NomeRestaurante']}</h2>";
                echo "<p>{$row['Descricao']}</p>";
                echo "<p>Endereço: {$row['Endereco']}</p>";
                echo "<p>Telefone: {$row['Telefone']}</p>";
                echo "<p>Email: {$row['Email']}</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum restaurante encontrado.</p>";
        }

        // Fecha a conexão com o banco de dados
        $conn = null;
        ?>
    </div>
   
   <!-- // Footer -->
<?php include_once 'includes/footer.php'; ?>
