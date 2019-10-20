<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php
  
  $message = array();
  $result = false;

	if(isset($_POST['submit'])) {

		if (!isset($_POST['Email']) || strlen(trim($_POST['Email'])) < 1)  {
      $message[] = "UserName is Missing / Invalid !";
		}

		if (!isset($_POST['Password']) || strlen(trim($_POST['Password'])) < 1)  {
			$message[] = "Password is Missing / Invalid !";
		}

		if (empty($message)) {
			$email = mysqli_real_escape_string($connection, $_POST['Email']);
			$password = mysqli_real_escape_string($connection, $_POST['Password']);
			$hashed_password = sha1($password);

			$query = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$hashed_password}' LIMIT 1";
			$result_set = mysqli_query($connection, $query);

			verify_query($result_set);

			if (mysqli_num_rows($result_set) == 1) {
				$user = mysqli_fetch_assoc($result_set);
				$_SESSION['user_id'] = $user['email'];

				header('Location: src/questions.php');
			}

			else {
				$message[] = 'Invalid UserName / Password !';
			}
		}
    
    err($message);
	}	

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title> quiz.signin</title>
<link rel  ="stylesheet" href ="asserts/css/q.css">
</head>
<body>




<form action="index.php" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign In</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
  


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="Email" required><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required><br>

    


   



    <div class="clearfix">
   <button type="submit" name="submit" class="signinbtn">Sign In</button>
  
      
    <br>
    <p>Don't have a account? </p>
    
  <a href="src/registration.php" class="signupbtn"> Sign up</a>
    </div>
  
  </div>
</form>
</body>
</html>
