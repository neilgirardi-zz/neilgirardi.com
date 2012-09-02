// Replace system fonts with custom fonts using Cufon
// add the CSS class .replace_font to HTML elemets you wish to use with Cufon
// you can also write your own selectors using the same syntx shown below
// just replace '.replace_font' with you class, ID, or HTML selector
$(document).ready(function() {
	Cufon.replace('.replace_font');
	Cufon.replace('a.replace_font');
	Cufon.replace('#mainNav');
	Cufon.replace('label');
	Cufon.replace('#footer');
});