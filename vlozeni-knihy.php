<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require "header.php" ?>
    <main>
        <form action="add-book.php" method="POST">
            <input type="text" name="book_name" placeholder="Název knihy" required ><br>
            <input type="text" name="isbn" placeholder="ISBN" required><br>
            <input type="text" name="first_name" placeholder="Křestní jméno autora" required><br>
            <input type="text" name="second_name" placeholder="Příjmení autora" ><br>
            <input type="text" name="description" placeholder="Popis knihy" required ><br>
            <input type="submit" value="Přidat">
        </form>
    </main>
</body>
</html>