<?php
session_start();
require_once 'admin/backend/config.php';
?>

<!doctype html>
<html lang="nl">

<head>
    <title>Attractiepagina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
</head>

<body>

    <?php require_once 'header.php'; ?>
    <div class="container content">
        <aside>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia modi dolore magnam! Iste libero voluptatum autem, sapiente ullam earum nostrum sed magnam vel laboriosam quibusdam, officia, esse vitae dignissimos nulla?
        </aside>
        
        <main>
            <!-- hier komen de attractiekaartjes -->
            <div class="small">
                <img src="img/attracties/adger-kang-oiyzr-SgjBY-unsplash.jpg" alt="img">
                <p>adventureland</p>
                <h3>speedy xl</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, culpa consequatur? Maxime animi ab tenetur facilis mollitia perspiciatis! Quasi qui animi fugit impedit corrupti similique sapiente omnis laboriosam quos itaque.</p>
                <p>129cm minimale lengte</p>               
            </div>
            <div class="large">
                

            </div>
        </main>
    </div>

</body>

</html>
