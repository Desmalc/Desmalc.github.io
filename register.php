<?php
require_once "pdo.php";
session_start();

//define variables
$username = $password = $confirm_password = $surname = $firstname = $email = $comment = $language = "";
$username_err = $password_err = $confirm_password_err = "";

if ( isset($_POST['firstname']) && isset($_POST['email'])
     && isset($_POST['password']) && isset($_POST['username']) && isset($_POST['surname']) && isset($_POST['Comment']) && isset($_POST['language'])) {
   $firstname = $_POST['firstname'];
     $surname = $_POST['surname'];
     $language = $_POST['language'];
     $comment = $_POST['Comment'];
    
    // Data validation
    if ( strlen($_POST['username']) < 3) {
        $_SESSION['error'] = 'please enter a username of atleast 3 characters.';
        header("Location: register.php");
        return;
    }
    
    $username = trim($_POST["username"]);
    $sql = "SELECT username FROM users WHERE username = :xyz";
    $stmt = $pdo->prepare($sql);
$stmt->execute(array(":xyz" => $username));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ( $row > 0 ) {
$_SESSION['error'] = "The Username $username  is already taken, please pick another one";
    header("Location: register.php");
      return;}
    
    //validate password
	if(!isset($_POST["password"])){
	$_SESSION['error'] = "plese enter a password.";
    }
	elseif(strlen(trim($_POST["password"])) < 6)
    {
	$_SESSION['error'] = "PASSWORD MUST HAVE AT LEAST 6 CHARACTERS";
        header("Location: register.php");
        return;}
	else{
	$password = trim($_POST["password"]);
    }
    
	//validate  confirm password
	if(empty(trim($_POST["conpassword"]))){
	$_SESSION['error'] = "Please confirm password.";
            header("Location: register.php");
        return;}
	else{
        $confirm_password = trim($_POST["conpassword"]);
	if(isset($password) && ($password != $confirm_password)){
	$_SESSION['error'] = "Password did not match and confirmed password did not match.";
            header("Location: register.php");
        return;}
	}

    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Bad data';
        header("Location: register.php");
        return;
    }

    $sql = "INSERT INTO users (firstname, email, password, username, surname, language)
              VALUES (:name, :email, :password,  :username, :surname, :language)";
    $stmt = $pdo->prepare($sql);
    $salt = 'XyZzy12*_';
    $hashpassword = hash('md5', $salt.$_POST['password']);
    $stmt->execute(array(
        ':name' => $_POST['firstname'],
        ':email' => $_POST['email'],
        ':password' => $hashpassword,
     ':username' => $_POST['username'],
    ':surname' => $_POST['surname'],
    ':language' => $_POST['language']));
    $_SESSION['success'] = 'Record Added';
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
?>

<?php
//place holders for entered values when the form rebounds
$fn = htmlentities($firstname);
$sn = htmlentities($surname);
$un = htmlentities($username);
$pw = htmlentities($password);
$cp = htmlentities($confirm_password);
$em = htmlentities($email);
$ln = htmlentities($language);
$cm = htmlentities($comment);

?>

<html lang="en">

<head>

    <title>Registration</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link href="css/styles.css" rel="stylesheet">
</head>
    <body>
    <div class="container">
    <div class="row row-content">
           <div class="col-12">
              <h3>Register</h3>
           </div>
           <div class="col-12 col-md-9">
<form method="post">
<div class="form-group row">
<label for="firstname" class="col-md-2 col-form-label">First Name</label>
    <div class="col-md-10">
        <input type="text" class="form-control" placeholder="first name" id="firstname"  name="firstname" value="<?= $fn ?>" required></div>
     </div> 
    <div class="form-group row">
                    <label for="lastname" class="col-md-2 col-form-label">Surname</label>
                    <div class="col-md-10">
                    <input type="text" class="form-control" id="lastname" name="surname" value="<?= $sn ?>" placeholder="last name" required></div></div>
    <div class="form-group row">
                    <label for="username" class="col-md-2 col-form-label">Username</label>
                    <div class="col-md-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= $un ?>"placeholder="username" ></div>
                           </div>
                       <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-10">
                    <input type="password" class="form-control" id="password" name="password" value="<?= $pw ?>" placeholder="password"><br>
		<span class="feedback_col"><?php echo $password_err; ?></span></div>
                           </div>
        <div class="form-group row">
                    <label for="conpassword" class="col-md-2 col-form-label">Confirm Password</label>
                    <div class="col-md-10">
                    <input type="password" class="form-control" id="conpassword" name="conpassword" value="<?= $cp ?>" placeholder="password"><br>
		<span><?php  echo '<p style="color:red">'.$confirm_password_err; "</p>\n"?></span></div>
                           </div>
                
                    <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $em ?>"placeholder="email "></div>
                           </div>
                    <div class="form-group row">
                        <div class="col-md-4 offset-md-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="approve" id="approve" value="true" required>
                                <label class="form-check-label" for="approve"><b> may we contact you?</b></label>
                    
                    </div>
                        </div>
                        <div class="col-md-6">
                       <select class="form-control bg-primary text-white" name="language" value="<?= $ln ?>">
                            <option value="0">What Programming Language are you interested in?</option>
                            <option value="JAVASCRIPT">Javascript</option>
                            <option value="HTML">HTML</option>
                            <option value="PHP">PHP</option>
                            <option value="nODEJS">NodeJS</option></select> 
                        </div>
                    </div> 
                                    <div class="form-group row">
                    <label for="comment" class="col-md-2 col-form-label">Tell the Admin why you should be given access to be a programmer on the platform</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="comment" name="Comment" value="<?= $cm ?>"rows="12"></textarea></div>
                           </div>
                    <div class="form-group row">
                        <div class="col-6 offset-md-2 col-md-6">
                        <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <div class="col-6 col-md">
                         <button type="submit" class="btn btn-success text-white"><a href="index.php">Cancel</a></button>
                        </div>
                    </div>
</form>
               <p> Already Registered as a programmer?<a href="login.php">LogIn Here</a></p>
              </div>
               </div>
          
        

    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="js1/scripts.js"></script>
</body>