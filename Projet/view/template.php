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
                <li>Films</li>
                <li>Genre</li>
                <li>Acteurs</li>
                <li>Réalisateurs</li>
            </ul>
        </nav>

    </main>
    
    <div>
        <?= $content ?>
    </div>

    <footer>
        
    </footer>
</body>
</html>