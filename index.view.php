<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Demo</title>

    <style>
        body {
            display: grid;
            place-content: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
        h1 {
            display: grid;
            place-content: center;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
</head>
<body>

<h1>Livros Recomendados</h1>

<ul>
    <?php foreach($filteredBooks as $book): ?>
        <li>
            <a href="<?= $book['purchaseUrl'] ?>" target="_blank">
                <?php echo "{$book['name']} ({$book['releaseYear']})";?> - Escrito por <?= $book['author'];?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
