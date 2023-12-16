<?php

    require "assets/functions.php";

    $connection = connectionDB();
    $books = getAllBooks($connection, "id, isbn, book_name, first_name, second_name, description");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php" ?>
    
    <main>
        <section class="main-heading">
            <h1>Seznam knih</h1>
        </section>
        <section class="books-list">
            <?php if (empty($books)): ?>
                <p>Žádné knihy nebyly nalezeny.</p>
            <?php else: ?>
                <?php foreach ($books as $one_book): ?>
                    <h3><?= htmlspecialchars($one_book['book_name']) ?></h3>
                    <p>Autor: <?= htmlspecialchars($one_book['first_name']) ?> <?= htmlspecialchars($one_book['second_name']) ?></p>
                    <p>ISBN: <?= htmlspecialchars($one_book['isbn']) ?></p>
                    <p>Popis: <?= htmlspecialchars($one_book['description']) ?></p>
                <?php endforeach; ?>
            <?php endif ?>
        </section>
    </main>

</body>
</html>