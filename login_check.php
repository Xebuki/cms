<?php
include 'logowanie.php';
include 'navbar.php';
//include 'rejestracja.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Logowanie do systemu</title>
</head>
<body>
<?php
        $login = $_POST['login'];
	$password = $_POST['password'];
        $objLogin = new logowanie();
        
//        $objRegister = new rejestracja();

if ($objLogin->userLogin("$login", "$password") == true) {
echo '<script> Swal.fire({ type: "success", text: "Success! You will be redirected"}) </script>';
header("Refresh:3; index.php");
} else {
echo '<script> Swal.fire({ type: "error", text: "Incorrect login or password! You will be redirected"}) </script>';
header("Refresh:3; login.php");
}
//        if($objRegister->isThereAnyone("$login") == true){
//        if ($objRegister->userSignup("$login", "$password") == true) {
//            echo"dodano";
//        }else echo "nie dodano";
//        }else echo "Login wykorzystany";
?>
</body>
</html>