<!DOCTYPE html>
<html>
<head>
    <title>Meu Site Semelhante ao iFood</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <?php // include 'includes/header.php'; ?>

    <?php
        // Obtém o parâmetro "page" da URL ou define a página inicial como padrão
         $page = $_GET['page'] ?? 'home';
         $page_path = "pages/$page.php";

        // Verifica se o arquivo da página existe antes de incluí-lo
        if (file_exists($page_path)) {
            include_once $page_path;
        } else {
           echo "Página não encontrada!";
        }
    ?>

    <?php include_once 'includes/footer.php'; ?>
</body>
</html>
