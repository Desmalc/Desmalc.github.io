<?php
//initialise the session
session_start();
//check if the user is already logged in and has a session, if yes then redirect him to welcome page
if(isset($_SESSION["username"]) && $_SESSION["loggedin"] == true){
	header("location: index.php");
    exit;}
	//include config file 
	require_once "pdo.php";
	//Define variables and initialise empty variables
	$username = $password = "";
	$username_err = $password_err = "";

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to index1.php page as d holding page(home page)
    header("Location: index.php");
    return;
}
if ( isset($_POST['username']) && isset($_POST['password']) ) {
	//processing form data when form is submitted
		//check if username is empty
if(empty(trim($_POST["username"]))){
		$_SESSION['error'] = "please enter a username";
  header('Location: login.php');
  return;}
		else{
		$username = trim($_POST["username"]);}
		//check if password is empty
	if(empty(trim($_POST["password"]))){
	$_SESSION['error'] = "Please enter your password.";
     header('Location: login.php');
  return;}
	else{
	$password = trim($_POST["password"]);}

$salt = 'XyZzy12*_';
$sql = "SELECT user_id, username, password FROM users WHERE username = :xyz";
    $stmt = $pdo->prepare($sql);
$stmt->execute(array(":xyz" => $username));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row > 0 ) {
 $dbpassword = $row['password'];
 $hashpassword = hash('md5', $salt.$_POST['password']);
    if($dbpassword == $hashpassword){
   //password is correct, so start a new session
   session_start();
 //store data in session variables
							$_SESSION["loggedin"] = true;
							$_SESSION["id"] = $id;
							$_SESSION["username"] = $username;
							//redirect user to welcome page
						header("location: view.php");
     
 } 
    else{
        $username_err = "Password incorrect";}
    }

    				else{//if the name doesnt exist as in line 39, display an error message if username doesnt exists
				$username_err = "No account found with that username.";}
}


 


			
			else{//if the stmt statment on line 35 doesnt execute,echo something is wrong
			echo "oops!, something went wrong. Please try again later.";}

		
 
	
    
 ?>
<?php if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
} ?>
<!DOCTYPE html>
<html lang="en">
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title> Student login </title>
<link rel="stylesheet" type="text/css" href="http://localhost/first%20php%20page/basic.css"/>
</head>
<body>
<header>
 <h1 style="color: white;"> Login</h1>
 </header>
 <hr>
<div id="main">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
		
				<div class="form-group <?php echo (!empty($username_err))? 'has-error' : '';?>">
		<label>User Name:</label><br>
		<input name="username" id="username" value= "<?php echo $username; ?>" type="text"  border="5" style="border:solid; color:rgb(0, 100, 100);"/><br>
		<span class="feedback_col"><?php echo $username_err; ?></span>
		</div>
			<br>	
			<div class= "form-group <?php echo (!empty($password_err))? 'has-error' : ''; ?>">
		<label>Password:</label><br>
		<input name="password" id="password" value="<?php echo $password; ?>"  border="5" style="border:solid; color:rgb(0, 100, 100);"   type="password"/> <p>(case matters)</p><br>
		<span class="feedback_col"><?php echo $password_err; ?></span>
		</div>
				<br>
		<label><input type="submit"  value="Login"></label>
		<br>
		<label><input type="reset"  value="reset"></label>
		<p> Dont have an account?<a href="http:\\localhost\first%20php%20page\register.php" style="color:rgb(0, 100, 100);">Register Here</a></p><br>
      <input type="submit" name="cancel" value="Cancel">
		</form>
		</div>
		</body>
		</html>
	