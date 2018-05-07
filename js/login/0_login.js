class Login {
	submitClick() {
		$('#login_content').on('click','.submit', (e) => {
			e.preventDefault();
			const credentials = {};
			const inputs = document.querySelectorAll('input[name]');

			for(const input of inputs){
				credentials[input.name] = input.value;
			}
			console.log(credentials);
			$.post('admin/checkCredentials.php', credentials, (data) => {
				if(data.status == 'true'){
					//In order to make sure that a given person can't just change their sessionStorage login to true (like through the console) to access a page that requires a login a unique token that the database could recognize for that individual user. If this project ever gets to that scale then you can address this potential issue.
					sessionStorage.login = 'true';
					window.location.href = sessionStorage.getItem('redirect');
					
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
			
	} //end submitClick

	getRedirect() {
		let input = document.getElementsByName('redirect')[0];
		let url = window.location.href;
		console.log(url);
		input.value = '';
	}
}

$(document).ready( ()=> {
	const login = new Login;
	login.submitClick();

});	