<?php
include('database.php');
include('navbar.php');

$db = new DataBase();
$result = $db->getAllBooks();
$_SESSION['currentPage'] = 'Books';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
<script src="jquery.tabledit.min.js"></script>

<div class="container">
    <br />
    <br />
    <br />
    <div class="div_table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tytuł</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Dostepnosc</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_array($result)) {

                        echo "<tr>";
                        echo '<td>' . $row['ID'] . "</td>";
                        echo '<td>' . $row['tytul'] . "</td>";
                        echo '<td>' . $row['autor'] . "</td>";
                        echo '<td>' . $row['dostepnosc'] . "</td>";
                         echo '<td>' . '<form action="rent_check.php" method="POST">'
                                . '<button type="submit" name="rent" class="btn btn-primary" id="change_password">Rent</button>'
                                . '<input type = "hidden" name = "id_book" value="'.$row["ID"].'">' 
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
<?php
    if (filter_has_var(INPUT_POST, "")) {
        if(isset($_SESSION['id_user'])){
            $db->rentABook($id_book, $_SESSION['id_user']);
        }


    } ?>
