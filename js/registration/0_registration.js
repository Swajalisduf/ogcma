class newCredentials{
	submitClick() {
		$('#registration_form').on('click','.submit', (e) => {
			e.preventDefault();
			const newCredentials = {};
			const inputs = document.querySelectorAll('input[name]');

			//Gather user input from form
			for(const input of inputs){
				if (input.name == 'firstName'){
					newCredentials['firstName'] = input.value;
				} else if (input.name == 'lastName'){
					newCredentials['lastName'] = input.value;
				} else if(input.name == 'email'){
					newCredentials['email'] = input.value;
				} else if(input.name == 'username'){
					newCredentials['username'] = input.value;
				} else if(input.name == 'password') {
					newCredentials['password'] = input.value;
				} else if (input.name == 'securityQuestion'){
					newCredentials['securityQuestion'] = input.value;
				} else if (input.name == 'securityAnswer') {
					newCredentials['securityAnswer'] = input.value;
				}
			}
			
			//Send user registration info to server. Redirect to redirect.php on success.
			$.post('admin/addNewUser.php', newCredentials, (data)=> {
				if(data.status == 'true'){
					window.location.href = 'redirect.php';
				} else if(data.status == 'false'){
					console.log(data.error);
				}
			}, 'json');
		});
	}	
}


$(document).ready( ()=> {
	const login = new newCredentials;
	login.submitClick();
});