const userEvents = {
	clicked: true,
	build: () => {
		const hamburger = document.querySelector('.hamburger');

		hamburger.addEventListener('click', userEvents.menu)
	},

	menu: (e) => {
		e.preventDefault();
		let line1 = document.querySelector('.line1');
		let line3 = document.querySelector('.line3');
		
		if(userEvents.clicked) {
      userEvents.clicked = false;
      line1.classList.remove('line1-reverse');
      line1.classList.add('line1-forward');
      line3.classList.remove('line3-reverse');
      line3.classList.add('line3-forward');
    } else {
    	userEvents.clicked = true;
    	line1.classList.remove('line1-forward');
      line1.classList.add('line1-reverse');
      line3.classList.remove('line3-forward');
      line3.classList.add('line3-reverse');
   	} 
	}
}

document.addEventListener('DOMContentLoaded', userEvents.build)