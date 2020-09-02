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
        <table id="editable_table_books" class="table table-hover">
            <button class="btn btn-success" id='button_add_row' style='float: right'>Add Row</button>
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
function add(){
    
}

        
        ?>
<script>
    $(document).ready(function () {
        $('#editable_table_books').Tabledit({
            url: 'action_books.php',
            columns: {
                identifier: [0, "ID"],
                editable: [[1, 'tytul'], [2, 'autor'], [3, 'dostepnosc']]
            },
            restoreButton: false,
            onSuccess: function (data, textStatus, jqXHR)
            {
                if (data.action == 'delete')
                {
                    $('#' + data.ID).remove();
                }
            }
        });

    });

    $("#button_add_row").click(function () {
        var tableditTableName = '#editable_table_books';  // Identifier of table
        var newID = parseInt($(tableditTableName + " tr:last").attr("ID")) + 1;
        var clone = $("table tr:last").clone();
        $(".tabledit-span", clone).text("");
        $(".tabledit-input", clone).val("");
        clone.prependTo("table");
        $(tableditTableName + " tbody tr:first").attr("ID", newID);
        $(tableditTableName + " tbody tr:first td .tabledit-span.tabledit-identifier").text(newID);
        $(tableditTableName + " tbody tr:first td .tabledit-input.tabledit-identifier").val(newID);
        $(tableditTableName + " tbody tr:first td:last .tabledit-edit-button").trigger("click");
        
        
    });
</script>

