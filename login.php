<?php
	require_once "includes/partials/header.php";
?>
<main>
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
</main>
<?php
	require_once "includes/partials/footer.php";
?>