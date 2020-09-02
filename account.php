<?php
include('database.php');
include('navbar.php');

$db = new DataBase();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$result = $db->getThisUser($_SESSION['id_user']);
$result_book = $db->myBooks($_SESSION['id_user']);
//var_dump($x);
//echo $_SESSION['id_user'];
?>
<div class="container">
    <div class="table">
        <table id="table" class="table table-bordered table-striped">
<!--echo '<td>' . '<button id="showit">Change</button>' . "</td>";-->
            <thead>
                <tr>
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
                        echo '<td>' . $row['login'] . "</td>";
//                        echo '<td>' . '<a class="btn btn-primary" role="button" value="show">Change</a>' . "</td>";
                        echo '<td>' . '<form action="" method="POST"><button type="submit" name="show" class="btn btn-primary" id="change_password">Change</button></form>' . "</td>";
//                        echo '<td>' . '<button type="submit" value="" class="btn btn-primary">' . "</td>";
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
                if ($result_book->num_rows > 0) {
                    while ($row = mysqli_fetch_array($result_book)) {

                        echo "<tr>";
                        echo '<td>' . $row['id_rent'] . "</td>";
                        echo '<td>' . $row['tytul'] . "</td>";
                        echo '<td>' . $row['autor'] . "</td>";
                        echo '<td>' . $row['dostepnosc'] . "</td>";
                        echo '<td>' . '<form action="return.php" method="POST">'
                                . '<button type="submit" name="return" class="btn btn-primary" id="">Return</button>'
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
    <?php
    if (filter_has_var(INPUT_POST, "show")) {
        ?>
        <div id="myform" class="wrapper">
            <form class="form-signin" method="post" action="change_password_check.php">       
                <h2 class="form-signin-heading">Change password</h2>
                <input type="text" class="form-control" name="password" placeholder="Password" required="" autofocus="" />
                <input type="password" class="form-control" name="new_password" placeholder="New password" required=""/>
                <input type="password" class="form-control" name="rpassword" placeholder="Repeat password" required=""/>     
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>   
            </form>
        </div>
    <?php } ?>
</div>
<?php
if (filter_has_var(INPUT_POST, "show")) {
    
}
?>
