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
    <link
        href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
</head>

<body>

    <?php require_once 'header.php'; ?>
    <div class="container content">
        <aside>

            <?php

            require_once 'admin/backend/conn.php';

            if (empty($_GET['theme']) && !isset($_GET['fastpass']) && empty($_GET['length']) && empty($_GET['name'])) {

                $query = "SELECT * FROM rides";

                $statement = $conn->prepare($query);

                $statement->execute();

            } else if (isset($_GET['theme'])) {

                $query = "SELECT * FROM rides WHERE lower(themeland = :theme)";

                $statement = $conn->prepare($query);

                $statement->execute([":theme" => $_GET['theme']]);

            } else if (isset($_GET['fastpass'])) {

                $query = "SELECT * FROM rides WHERE lower(fast_pass = :fastpass)";

                $statement = $conn->prepare($query);

                $statement->execute([":fastpass" => $_GET['fastpass']]);

            } else if (isset($_GET['length'])) {

                $query = "SELECT * FROM rides WHERE lower(min_length <= :length) ORDER BY min_length DESC";

                $statement = $conn->prepare($query);

                $statement->execute([":length" => $_GET['length']]);

            } else if (isset($_GET['name'])) {

                $testName = $_GET['name'];

                $query = "SELECT * FROM rides WHERE lower(title) LIKE '$testName%'";

                $statement = $conn->prepare($query);

                $statement->execute([":name" => $_GET['name']]);

            }

            $rides = $statement->fetchAll(PDO::FETCH_ASSOC);

            ?>
            <div class="dropdown">
                <form action="" method="GET">
                    <select name="fastpass">
                        <option value="">Fast_pass nodig</option>
                        <option value="1">ja</option>
                        <option value="0">nee</option>
                    </select>
                    <input type="submit" value="filter">
                </form>
                <form action="" method="GET">
                <select name="theme">
                        <option value="">themagebied</option>
                        <option value="familyland">familyland</option>
                        <option value="adventureland">adventureland</option>
                        <option value="waterland">waterland</option>
                    </select>
                    <input type="submit" value="filter">
                </form> 
                <form action="" method="GET">
                <select name="length">
                        <option value="">min length</option>
                        <option value="200">langer dan 1 meter</option>
                        <option value="100">korter dan 1 meter</option>
                    </select>
                    <input type="submit" value="filter">
                </form>
            </div>

        </aside>
        <main>

            <div class="grid">
                <?php foreach ($rides as $ride): ?>


                    <?php if ($ride['fast_pass'] == 0): ?>
                        <div class="kaart">

                            <img src="img/attracties/<?php echo $ride['img_file']; ?>" height="200">
                            <div class="kaarttekst">
                                <h1>
                                    <?php echo $ride['themeland']; ?>
                                </h1>
                                <h2>
                                    <?php echo $ride['title']; ?>
                                </h2>
                                <p>
                                    <?php echo $ride['description']; ?>
                                </p>
                                <?php if (isset($ride['min_length'])): ?>

                                    <h3>
                                        <?php echo $ride['min_length']; ?> cm minimale lengte
                                    </h3>

                                <?php endif; ?>
                            </div>
                        </div>

                    <?php elseif ($ride['fast_pass'] == 1): ?>
                        <div class="kaart2">
                            <img src="img/attracties/<?php echo $ride['img_file']; ?>" height="200">
                            <div class="kaart2divs">
                                <div class="kaart2div1">
                                    <h1>
                                        <?php echo $ride['themeland']; ?>
                                    </h1>
                                    <h2>
                                        <?php echo $ride['title']; ?>
                                    </h2>
                                    <p>
                                        <?php echo $ride['description']; ?>
                                    </p>
                                    <?php if (isset($ride['min_length'])): ?>
                                        <h3>
                                            <?php echo $ride['min_length']; ?> cm minimale lengte
                                        </h3>
                                    <?php endif; ?>
                                </div>
                                <div class="kaart2div2">
                                    <div class="kaart2div2tekst1">
                                        <p>Deze attractie is alleen te<br>bezoeken met een fastpass</p>
                                    </div>
                                    <div class="kaart2div2tekst2">
                                        <p>Boek nu en sla de wachtrij over:</p>
                                        <div class="kaart2div2tekst2img">
                                            <button><img src="img/Ticket.png">FAST PASS</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        </main>


</body>

</html>