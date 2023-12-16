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
            <h1>Vyhledávání</h1>
        </section>
        <form action="./find-book.php" method="POST">
            <input type="text" name="book_name" placeholder="Název knihy"><br>
            <input type="text" name="isbn" placeholder="ISBN"><br>
            <input type="text" name="first_name" placeholder="Křestní jméno autora"><br>
            <input type="text" name="second_name" placeholder="Příjmení autora" ><br>
            <input type="submit" value="Hledat">
        </form>
    </main>
</body>
</html>