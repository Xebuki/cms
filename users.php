<?php
include('database.php');
include('navbar.php');

$db = new DataBase();
$result = $db->getAll();
$_SESSION['currentPage'] = 'Users';
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
        <table id="editable_table" class="table table-hover">

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Login</th>
                    <th scope="col">Password</th>
                    <th scope="col">Access</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_array($result)) {

                        echo "<tr>";
                        echo '<td>' . $row['id_user'] . "</td>";
                        echo '<td>' . $row['login'] . "</td>";
                        echo '<td>' . $row['md5_password'] . "</td>";
                        echo '<td>' . $row['access'] . "</td>";
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


        <script>
            $(document).ready(function(){
                    $('#editable_table').Tabledit({
            url:'action.php',
                    columns:{
                    identifier:[0, "id_user"],
                            editable:[[1, 'login'], [2, 'md5_password'], [3, 'access']]
    },
                    restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
        {
                            if (data.action == 'delete')
                            {
                            $('#' + data.id_user).remove();
                    }
                    }
                    });
                    
                    });  
                </script>
   
