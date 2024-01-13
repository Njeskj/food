<main>
    <h1>Menu</h1>
    <ul>
        <?php
            // Supondo que você tenha um arquivo JSON na pasta "data" com os dados do menu
            $menu_data = file_get_contents('data/menu.json');
            $menu_items = json_decode($menu_data, true);

            foreach ($menu_items as $item) {
                echo "<li>{$item['name']} - {$item['price']} BRL</li>";
            }
        ?>
    </ul>
</main>
