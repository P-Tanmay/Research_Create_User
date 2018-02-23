<?php
// ini_set('display_errors', 1);
// error_reorting(E_ALL);
	require_once('phpscripts/config.php');
	// confirm_logged_in();

	if(isset($_POST['submit'])) {
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		// $password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$userlvl = trim($_POST['userlvl']);
		if (empty($userlvl)) {
			$message = "please select a user level";
		}else {
			$result = AddNewUser($fname, $username, $email, $userlvl);
			$message = $result;
		}
	}

?>


<style media="screen">
  body {
    margin-top: 10%;
    text-align: center;
    font-size: 20px;
  }

  h1 {
    color: #4d7ead;
  }
  input {
    width: 25%;
    height: 40px;
    background-color: #ddd;
    outline: none;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }

  select {
    width: 25%;
    height: 40px;
    display: inline-block;
    border: none;
    background: #d2e5ff;
  }

  #submit {
    background-color: #4d7ead;
    color: white;
  }
</style>







<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
</head>
<body>
	<h1>Welcome Company Name to your Creat user page</h1>
	<?php if (!empty($message)) {echo $message;} ?>
	<form action="admin_createuser.php" method="post">


		<label>First Name</label><br>
		<input type="text" name="fname" value="<?php if (!empty($fname)) {echo $fname;} ?>" ><br><br>

		<label>Username:</label><br>
		<input type="text" name="username" value="<?php if (!empty($username)) {echo $username;} ?>"><br><br>

		<label>Emails:</label><br>
		<input type="text" name="email" value="<?php if (!empty($email)) {echo $email;} ?>"><br><br>

		<label>User Level:</label><br>
		<select name="userlvl"><br>
			<option value="">Please select the user level</option>
			<option value="2">Web Admin</option>
			<option value="1">Web Master</option>
		</select><br><br>
		<input id="submit" type="submit" name="submit" value="Create User">
	</form>

</body>
</html>
