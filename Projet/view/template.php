<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css" class="rel">
    <title><?= $title ?></title>
</head>
<body>
    <main class="principal">
        <h1>KapkanCinema</h1>

        <nav class="navigate">
            <ul>

                <li><a href="index.php?action=listFilms">Films</a></li>
                <li><a href="index.php?action=listGenres">Genre</a></li>
                <li><a href="index.php?action=listActeurs">Acteurs</a></li>
                <li><a href="index.php?action=listRealisateurs">Realisateurs</a></li>
                
            </ul>
        </nav>

    </main>


    <div>
        <?= $content ?>
    </div>


    <footer>
        
    </footer>
        
    <script src="public/js/script.js"></script>
</body>
</html>