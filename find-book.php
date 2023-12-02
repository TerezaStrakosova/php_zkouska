<?php

require "functions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isbn = $_POST["isbn"];
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $book_name = $_POST["book_name"];

    $connection = connectionDB();

    // Použití prepared statement pro bezpečné zpracování vstupních dat
    $sql = "SELECT isbn, first_name, second_name, book_name, description FROM book 
            WHERE (book_name LIKE ? OR ? = '') AND
                  (isbn LIKE ? OR ? = '') AND
                  (second_name LIKE ? OR ? = '') AND
                  (first_name LIKE ? OR ? = '')";

    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt === false) {
        echo "Chyba při přípravě dotazu: " . mysqli_error($connection);
    } else {
        $book_name_param = "%$book_name%";
        $isbn_param = "%$isbn%";
        $second_name_param = "%$second_name%";
        $first_name_param = "%$first_name%";

        mysqli_stmt_bind_param($stmt, "ssssssss", $book_name_param, $book_name, $isbn_param, $isbn, $second_name_param, $second_name, $first_name_param, $first_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Vypsání výsledků na stránku
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>ISBN: " . htmlspecialchars($row['isbn']) . "</p>";
            echo "<p>Autor: " . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['second_name']) . "</p>";
            echo "<p>Název knihy: " . htmlspecialchars($row['book_name']) . "</p>";
            echo "<p>Popis: " . htmlspecialchars($row['description']) . "</p>";
            echo "<hr>";
            echo "<br>";
            echo "<a href='vyhledavani.php'>Zpět na vyhledávání</a>";
        }

        // Zpráva, pokud nebyly nalezeny žádné výsledky
        if (mysqli_num_rows($result) === 0) {
            echo "<p>Žádné knihy nebyly nalezeny.</p>";
            echo "<a href='vyhledavani.php'>Zpět na vyhledávání</a>";
        }

    }
}

?>