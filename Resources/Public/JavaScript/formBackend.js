/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$('td').each(function() {
	var description = $.trim($(this).text());
	var descriptionLength = description.length;
	if(descriptionLength > 30) {
		$(this).text(description.slice(0, 27)+'...');
		$(this).addClass('more');
	}
});
