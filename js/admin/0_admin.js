class Login {
	submitClick() {
		$('#login_box').on('click','.submit', (e) => {
			e.preventDefault();
			const credentials = {};
			const inputs = document.querySelectorAll('input[name]');

			for(const input of inputs){
				if(input.name == 'username'){
					credentials['username'] = input.value;
				} else if(input.name == 'password') {
					credentials['password'] = input.value;
				}
			}

			$.post('admin/checkCredentials.php', credentials, (data) => {
				if(data.status == 'true'){
					//alert('It Worked! Bellissimo!')
					//Makes login box disappear
					document.getElementById("login_box").style.display = "none";
					//For future reference: Should hide the links and then show them; to make this more secure you would have to send them through php 
				} else if (data.status == 'false') {
					console.log(data);
					if(data.error == 1){
						const error = document.getElementById('error');
						error.innerHTML = "<p><small>Incorrect Password</small></p>";
						//let them try again
					} else if (data.error == 2){
						const error = document.getElementById('error');
						error.innerHTML = "<p><small>Username does not exist</small></p>";
						//let them try again. 
					}
				}
			}, 'json');
		});
			
	}
}

$(document).ready( ()=> {
	const login = new Login;
	login.submitClick();
});	