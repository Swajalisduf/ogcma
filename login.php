<?php
	require_once "includes/partials/header.php";
?>
<main>
	<div id="login_content">
		<h1>Login</h1>
		<form id="login_form" method="post">
				<input type="hidden" name="redirect" value="">
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
</main>
<?php
	require_once "includes/partials/footer.php";
?>