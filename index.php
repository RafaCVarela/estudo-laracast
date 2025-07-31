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
    </style>
</head>


<body>

    <h1>Livros Recomendados</h1>

    <?php

        $books = [
            [
                    "name" => "Androides Sonham com Ovelhas Elétricas?",
                    "author" => "Philip K. Dick",
                    "purchaseUrl" => "http://exemple.com"
            ],
            [
                    "name" =>"Projeto Avé Maria",
                    "author" => "Andy Weir",
                    "purchaseUrl" => "http://exemple.com"
            ]
        ];

    ?>

    <ul>
        <?php foreach($books as $book): ?>
            <li>
                <a href="$book['purchaseUrl']">
                    <?= $book['name']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>