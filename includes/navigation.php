<!-- Navegação -->
<nav>
    <ul>
        <?php
        // Inclua o arquivo de conexão com o banco de dados
        include '../includes/db_connect.php';

        // Consulta para buscar as opções de navegação no banco de dados
        $sql = "SELECT * FROM opcoes_navegacao";
        $result = mysqli_query($conn, $sql);

        // Verifique se há opções de navegação cadastradas
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li><a href="' . $row['link'] . '">' . $row['titulo'] . '</a></li>';
            }
        }

        // Libere os resultados da consulta
        mysqli_free_result($result);

        // Feche a conexão com o banco de dados
        mysqli_close($conn);
        ?>
    </ul>
</nav>
