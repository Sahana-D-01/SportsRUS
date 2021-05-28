 <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "sportsrus";
    $conn = mysqli_connect($servername, $username, $password, $db);
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
	$email = $_POST['email'];
    $pass = $_POST['password'];

  	$query_code = "SELECT email_id FROM user WHERE email_id='{$email}'";
	$result_login = mysqli_query($conn,$query_code);
	$anything_found = mysqli_num_rows($result_login);

	if($anything_found > 0) {
		$formOk = false;
		echo "logged in!!";  
	}
	else{
		echo "does not exist";
	}
?>