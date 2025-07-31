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
                    "releaseYear" => 1968,
                    "purchaseUrl" => "http://exemple.com"
            ],
            [
                    "name" =>"Projeto Avé Maria",
                    "author" => "Andy Weir",
                    "releaseYear" => 2021,
                    "purchaseUrl" => "http://exemple.com"
            ],
            [
                    "name" => "Perdido em Marte",
                    "author" => "Andy Weir",
                    "releaseYear" => 2011,
                    "purchaseUrl" => "http://exemple.com"
            ]
        ];

        function filterByAuthor ($books, $author) {

            $filteredBooks = [];

            foreach ($books as $book){
                if ($book['author'] === $author){
                    $filteredBooks[] = $book;
                }
            }

            return $filteredBooks;
        }

    ?>

    <ul>
        <?php foreach(filterByAuthor($books, 'Philip K. Dick') as $book): ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>">
                    <?php echo "{$book['name']} ({$book['releaseYear']})";?> - Escrito por <?= $book['author'];?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
