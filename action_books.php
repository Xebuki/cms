
<?php

//action.php
$connect = mysqli_connect('localhost', 'root', '', 'project');

$input = filter_input_array(INPUT_POST);

$temp_id = mysqli_real_escape_string($connect, $input["ID"]);
$temp_autor = mysqli_real_escape_string($connect, $input["autor"]);
$temp_tytul = mysqli_real_escape_string($connect, $input["tytul"]);
$temp_dostepnosc = mysqli_real_escape_string($connect, $input["dostepnosc"]);

if ($input["action"] === 'edit') {
    $sql = "SELECT ID FROM books WHERE ID = '" . $input["ID"] . "'";
    $result = mysqli_query($connect, $sql);
    if ($result->num_rows > 0) {
        $query = "
        UPDATE books 
        SET autor = '" . $temp_autor . "', 
        tytul = '" . $temp_tytul . "',
        dostepnosc = '" . $temp_dostepnosc . "'
        WHERE ID = '" . $input["ID"] . "'
        ";
        mysqli_query($connect, $query);
    } else if ($result->num_rows == 0) {
        $insert_query = "
        INSERT INTO books (ID, autor, tytul, dostepnosc) VALUES ('" . $input["ID"] . "', '" . $temp_autor . "', '" . $temp_tytul . "', '" . $temp_dostepnosc . "');";
        mysqli_query($connect, $insert_query);
        return $insert_query;
    }
}
if ($input["action"] === 'delete') {
    $query = "
 DELETE FROM books 
 WHERE ID = '" . $input["ID"] . "'
 ";
    mysqli_query($connect, $query);
}

echo json_encode($input);
?>