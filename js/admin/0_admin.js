//Include this code on any page that needs to check for a login. Make sure not to execute after the DOM has loaded. We want to have it reroute before it loads any code (you'll see the pages html load before it reroutes otherwiese) 
const CheckLogin = {
	checkLogin: () => {	
		if(!sessionStorage.login || sessionStorage.login == 'false'){
			sessionStorage.redirect = window.location.href;
			window.location.href = 'login.php?page=login';
		}
	}
}

CheckLogin.checkLogin();