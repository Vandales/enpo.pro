(function () {

	'use strict'


	if(document.getElementById('submit')){
		document.getElementById('submit').addEventListener('click', ev=> {

			ev.preventDefault()

			const form = document.getElementById('add-object-form')
			const url = '/wp-json/pnb/post'
			let data = new FormData(form)
			let check = 1
			let required = form.querySelectorAll('*[required]')

			data.append('city', form.querySelector('input[type=radio]:checked').getAttribute('data-id'))

			required.forEach(el => {
				el.nextElementSibling.innerHTML = ''
			})
			required.forEach(el => {
				if(el.value == '') {
					el.nextElementSibling.innerHTML = el.validationMessage
					check = 0
				}
			})

			if(check == 1){
				let go = fetch(url, {
					method: 'POST',
					headers: {
						'Authorization': 'Basic ' + btoa(unescape(encodeURIComponent( 'login:kxKk_aJxi_X66R_kSGS_y7ew_x9qX' ))) 
					},
					body: data
				})
				go.then(data => {
					data.status == 200 ? alert('Объект создан') : alert('Что-то пошло не так. Попробуйте чуть позднее.')
					form.reset()
				})
			} 


		})
	}
	AOS.init({
		duration: 800,
		easing: 'slide',
		once: true
	});

	let tinySdlier = function() {

		var propertySlider = document.querySelectorAll('.property-slider');
		var imgPropertySlider = document.querySelectorAll('.img-property-slide');

		if ( imgPropertySlider.length > 0 ) {
			var tnsPropertyImageSlider = tns({
				container: '.img-property-slide',
				mode: 'carousel',
				speed: 700,
				items: 1,
				gutter: 30,
				autoplay: true,
				controls: false,
				nav: true,
				autoplayButtonOutput: false
			});
		}

		if ( propertySlider.length> 0 ) {
			var tnsSlider = tns({
				container: '.property-slider',
				mode: 'carousel',
				speed: 700,
				gutter: 30,
				items: 3,
				autoplay: true,
				autoplayButtonOutput: false,
				controlsContainer: '#property-nav',
				responsive: {
					0: {
						items: 1
					},
					700: {
						items: 2
					},
					900: {
						items: 3
					}
				}
			});
		}
	}
	tinySdlier();

})()