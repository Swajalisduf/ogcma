<?php
	require_once 'includes/partials/header.php';
?>
<div id="container2">
		<img class='top-image' src='images/background_top_1300px.png' alt='background'>
	<div id="registration_box">
		<div id="registration_form">
			<h1>Create an account</h1>
			<form method="post">
				<label>
					<p>First Name
						<input type="text" name="firstName" value="" placeholder="Your First Name" required></p>
				</label>
				
				<label>
					<p>Last Name
						<input type="text" name="lastName" value="" placeholder="Your Last Name" required></p>
				</label>
			
				<label>
					<p>Email
						<input type="text" name="email" value="" placeholder="Your Email" required></p>
				</label>
			
				<label>
					<p>Username
						<input type="text" name="username" value="" placeholder="Your Username" required></p>
				</label>
			
				<label>
					<p>Password
						<input type="password" name="password" value="" placeholder="Your Password" required></p>
				</label>
				
				<label>
					<p>Security Question
						<select name="securityQuestion" required>
							<option value="1">Mother's Maiden Name</option>
							<option value="2">First Grade Teacher's Name</option>
							<option value="3">Favorite Food</option>
						</select></p>
				</label>
				
				<label>
					<p>Answer to Security Question
						<input type="text" name="securityAnswer" value="" placeholder="Answer to Security Question" required></p>
				</label>
				
					<p><button class="submit">Create</button></p>
			</form>
		</div>		
	</div>
<?php
	require_once 'includes/partials/footer.php';
