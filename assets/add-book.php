<?php

require "functions.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){  // kod se provede až bude formulář odeslán

    $isbn = $_POST["isbn"];
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $book_name = $_POST["book_name"];
    $description = $_POST["description"];
    
    $connection = connectionDB();

    createNewBook($connection, $isbn, $first_name, $second_name, $book_name, $description);

}
