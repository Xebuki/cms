<?php
include 'logowanie.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Wylogowanie z systemu</title>
</head>
<body>
<?php

$objLogin = new logowanie();

if ($objLogin->logout()) {
echo '<script>Swal.fire("Success!, "You will be redirected") </script>';
header("Refresh:3; index.php");
} else {
echo '<script> Swal.fire({ type: "error", text: "Something went wrong! You will be redirected"}) </script>';
header("Refresh:3; index.php"); 
}

?>
</body>
</html>