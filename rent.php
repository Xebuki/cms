<?php

include('navbar.php');
include('database.php');

$db = new DataBase();
$result = $db->getRentalBooks();
$_SESSION['currentPage'] = 'Rent';

?>
<div class="container">
    <br />
    <br />
    <br />
    <div class="div_table">
        <table id="editable_table_books" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Tytuł</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Dostepność</th>
                    <th scope="col">Użytkownik</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_array($result)) {

                        echo "<tr>";
                        echo '<td>' . $row['tytul'] . "</td>";
                        echo '<td>' . $row['autor'] . "</td>";
                        echo '<td>' . $row['dostepnosc'] . "</td>";
                        echo '<td>' . $row['id_user'] . "</td>";
                        echo '<td>' . '<form action="grant.php" method="POST">'
                                . '<button type="submit" name="grant" class="btn btn-success" id="">Grant</button>'
                                . '<input type = "hidden" name = "id_rent" value="'.$row["id_rent"].'">'
                                . '</form>' . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Nie znaleziono rekordow";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

