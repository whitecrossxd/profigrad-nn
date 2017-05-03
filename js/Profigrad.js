	 function parallax()
	 {
		var slow = $('.slow');

		slow.removeClass('bounceInDown');

		slow.css
		({
			'padding-top': 100 + ($(window).scrollTop() / 1.888) + "px",
			'opacity': 1 - ($(window).scrollTop() / 350)
		});
	 }