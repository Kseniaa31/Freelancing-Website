<?php
session_start();

// Create connection
$conn = new mysqli("localhost", "root", "", "fmarket");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$username=$name=$email=$password=$contactNo=$birthdate=$address="";

if(isset($_POST["register"])){
	$username=test_input($_POST["username"]);
	$name=test_input($_POST["name"]);
	$email=test_input($_POST["email"]);

	$password=test_input($_POST["password"]);
	$pass_hashed = password_hash($password, PASSWORD_DEFAULT);

	$repassword=test_input($_POST["repassword"]);
	$contactNo=test_input($_POST["contactNo"]);
	$gender=test_input($_POST["gender"]);
	$birthdate=test_input($_POST["birthdate"]);
	$address=test_input($_POST["address"]);
	$usertype=test_input($_POST["usertype"]);

	if ($usertype=="freelancer") {
		$sql = "SELECT * FROM freelancer,employer WHERE freelancer.username = '$username' OR employer.username = '$username'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION["errorMsg2"]="The username is already taken";
		}
		else{
			unset($_SESSION["errorMsg2"]);
			$sql = "INSERT INTO freelancer (username, password, Name, email, contact_no, address, gender, birthdate) VALUES ('$username', '$pass_hashed', '$name','$email','$contactNo','$address','$gender','$birthdate')";
			$result = $conn->query($sql);
			if($result==true){
				$_SESSION["Username"]=$username;
				$_SESSION["Usertype"]=1;
				header("location: freelancerProfile.php");
			}

		}
	}
	else{
		$sql = "SELECT * FROM freelancer,employer WHERE freelancer.username = '$username' OR employer.username = '$username'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION["errorMsg2"]="The username is already taken";
		}
		else{
			unset($_SESSION["errorMsg2"]);
			$sql = "INSERT INTO employer (username, password, Name, email, contact_no, address, gender, birthdate) VALUES ('$username', '$pass_hashed', '$name','$email','$contactNo','$address','$gender','$birthdate')";
			$result = $conn->query($sql);
			if($result==true){
				$_SESSION["Username"]=$username;
				$_SESSION["Usertype"]=2;
				header("location: employerProfile.php");
			}

		}
	}
}

if(isset($_POST["login"])){
	session_unset();
	$username=test_input($_POST["username"]);
	$password=test_input($_POST["password"]);
	$pass_hashed = password_hash($password, PASSWORD_DEFAULT); //hash password
	$usertype=test_input($_POST["usertype"]);
	

	if ($usertype == "freelancer") {
		$sql = "SELECT * FROM freelancer WHERE username = '$username'";
		$result = $conn->query($sql);
	
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$storedHash = $row['password'];
	
			if (password_verify($password, $storedHash)) {
				$_SESSION["Username"] = $username;
				$_SESSION["Usertype"] = 1;
				unset($_SESSION["errorMsg"]);
				header("location: freelancerProfile.php");
				exit(); // Make sure to exit after redirecting
			}
		}	
		$_SESSION["errorMsg"] = "Username/password is incorrect";
		header("location: login.php"); // Redirect to login page with error message
		exit(); // Make sure to exit after redirecting
	}

	
	else{
		$sql = "SELECT * FROM employer WHERE username = '$username'";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$row = $result->fetch_assoc();
			$storedHash = $row['password'];
	
			if (password_verify($password, $storedHash)) {
				$_SESSION["Username"] = $username;
				$_SESSION["Usertype"] = 2;
				unset($_SESSION["errorMsg"]);
				header("location: employerProfile.php");
				exit(); // Make sure to exit after redirecting
			}
		}	
		$_SESSION["errorMsg"] = "Username/password is incorrect";
		header("location: login.php"); // Redirect to login page with error message
		exit(); // Make sure to exit after redirecting
	}
	
}


if(isset($_SESSION["errorMsg"])){
	$errorMsg=$_SESSION["errorMsg"];
	unset($_SESSION["errorMsg"]);
}
else{
	$errorMsg="";
}

if(isset($_SESSION["errorMsg2"])){
	$errorMsg2=$_SESSION["errorMsg2"];
	unset($_SESSION["errorMsg2"]);
}
else{
	$errorMsg2="";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//$conn->close();
?>