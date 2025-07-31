<!doctype html>
<html lang="en">
<head>
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


    <?php
        $name = "Dark Matter";
        $read = false;

        if ($read) {
            $message = "Você leu o \"$name\"!";
        }
        else {
            $message = "Você não leu o \"$name\"!";
        }
    ?>

    <h1>
        <?= $message ?>
    </h1>


</body>
</html>