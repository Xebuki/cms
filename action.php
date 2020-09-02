
<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'project');

$input = filter_input_array(INPUT_POST);

$temp_login = mysqli_real_escape_string($connect, $input["login"]);
$temp_access = mysqli_real_escape_string($connect, $input["access"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE users 
 SET id_user = '".$input["id_user"]."',
 login = '".$temp_login."', 
 access = '".$temp_access."' 
 WHERE id_user = '".$input["id_user"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM users 
 WHERE id_user = '".$input["id_user"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>