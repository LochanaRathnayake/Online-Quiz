<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/functions.php') ?>

<?php 

	$message = "";
	$fname = '';
	$lname = '';
	$user_Name = '';
	$password = '';
	$re_password = '';

	if (isset($_POST['submit'])) {
		
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$user_Name = $_POST['Email'];
		$password = $_POST['Password'];
		$re_password = $_POST['RePassword'];
		
		$req_fields = array('$user_Name', '$password', '$re_password', '$fname', '$lname');
		$message[] = check_req_fields($req_fields);

		if ($re_password != $password) {
			$message[] = 'Passwords are not matching, try again';
		}

		$max_len_fields = array('$user_Name' => 100, '$password' => 40, '$fname' => 40, '$lname' => 40);
		$message[] = check_max_len($max_len_fields);

		$email = mysqli_real_escape_string($connection, $user_Name);
		$query = "SELECT * FROM users WHERE email = '{$email}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);
		verify_query($result_set);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$message[] = 'Email address already exists';
			}
		}

		if (empty($message[0]) && empty($message[1]) && empty($message[2]) && empty($message[3]) && empty($message[4]) ) {

			$password = mysqli_real_escape_string($connection, $password);
			$fname = mysqli_real_escape_string($connection, $fname);
			$lname = mysqli_real_escape_string($connection, $lname);

			$hashed_password = sha1($password);

			$query = "INSERT INTO users (email, password, First_Name, Last_Name ) VALUES ('$email', '$hashed_password', '$fname', '$lname')";

			$result = mysqli_query($connection, $query);

			verify_query($result);

			if ($result) {
				$message[] = 'Successfully registrated';
				header('Location: ../index.php?');
			}

			if (!$result) {
				$message[] = 'Failed to registration.';
			}
		}

		err($message);
	}
?> 

<html>
<head>
<title> quiz.signup</title>
<link rel  ="stylesheet" href ="../asserts/css/q.css">
</head>
<body>


<form action="registration.php" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
	
	
	 <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" required><br>
	
	 <label for="lname"><b>Last name</b></label>
    <input type="text" placeholder="Enter Last name" name="lname" required><br>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="Email" required><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required><br>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="RePassword" required><br>

   



    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="submit">Sign Up</button>
    </div>
  </div>
</form>
</body>
</html>
