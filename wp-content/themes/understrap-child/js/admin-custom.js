window.addEventListener('load', function(){

	let cities = document.querySelectorAll('input.city')

	cities.forEach(item => {
		item.addEventListener('change', el=>{
			document.cookie = encodeURIComponent('cityId') + '=' + encodeURIComponent(el.target.value)
		})
	})

})