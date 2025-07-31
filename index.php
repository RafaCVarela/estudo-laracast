<?php

$books = [
    [
        "name" => "Androides Sonham com Ovelhas Elétricas?",
        "author" => "Philip K. Dick",
        "releaseYear" => 1968,
        "purchaseUrl" => "https://www.amazon.com.br/Blade-Runner-Androides-ovelhas-el%C3%A9tricas/dp/8576574403"
    ],
    [
        "name" =>"Projeto Avé Maria",
        "author" => "Andy Weir",
        "releaseYear" => 2021,
        "purchaseUrl" => "https://www.amazon.com.br/Project-Hail-Mary-Andy-Weir/dp/171363029X"
    ],
    [
        "name" => "Perdido em Marte",
        "author" => "Andy Weir",
        "releaseYear" => 2011,
        "purchaseUrl" => "https://www.amazon.com.br/Perdido-em-Marte-Andy-Weir/dp/8580414482"
    ]
];

// Função gernérica criada para filtrar
// Parametros são um array e uma função lambda ou função anônima ($items e $fn)
function filter ($items, $fn) {

    // Array filtrada
    $filteredItems = [];

    // Looping para array assiociativa aninhada numa array
    foreach ($items as $item){
        if ($fn($item)){
            $filteredItems[] = $item;
        }
    }

    // Retorna a array filtrada
    return $filteredItems;
}

// Variável que armazenara a array filtrada, perceba que ela já tem o item que queremos, os livros
// Aqui seja chamarmos a função acima "filter" ou a buildin "array_filter" dá no mesmo, mais informações adiante
$filteredBooks = array_filter($books, function ($book){
    // Função lambda que nos permite controlar melhor qual item queremos filtrar
    return $book['releaseYear'] >= 2000;
});


require "index.view.php";
