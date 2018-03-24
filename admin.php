<?php
	require_once 'includes/partials/header.php';
?>

	<div id="container2">
			<img class='top-image' src='images/background_top_1300px.png' alt='background'>
		<div id="login_box">
			<div id="login_content">
				<form id="login_form" method="post">
				<h1>Login</h1>
				<label>Username</label>
						<input type="text" name="username" value="" placeholder="Your Username">
				<label>Password</label>
						<input type="password" name="password" value="" placeholder="Your password">			
				<button class="submit">Login</button>
				</form>
				
					<a href="">Forgot your password?</a>
					<p>Do not have an account?</p>
					<a href="registration.php?page=registration">Create an Account</a>
					<div id="error">
					</div>
			</div>
		</div>
		<div id="options">
			<ul>
				<li><a href="addUsage.php?page=addUsage">Add a Usage</a></li>
				<li><a href="view-database.php?page=view-database&title=View Database">View Entire Database</a></li>
			</ul>
		</div>	
		
	</div>	

<?php
	require_once 'includes/partials/footer.php';
