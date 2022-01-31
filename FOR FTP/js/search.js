// JavaScript code
function search_map() {
	let input = document.getElementById('searchbar').value
	input=input.toLowerCase();
	let x = document.getElementsByClassName('map-preview-container', 'map-author');
	
	for (i = 0; i < x.length; i++) {
		if (!x[i].innerHTML.toLowerCase().includes(input)) {
			x[i].style.display="none";
		}
		else {
			x[i].style.display="inline";				
		}
	}
}
