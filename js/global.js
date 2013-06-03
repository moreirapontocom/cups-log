/**
 * Go to a element in page
 * @param {String} Target element ID (required)
 */
function goTo(target) {
	$('html, body').animate({
	    scrollTop: $("#" + target).offset().top
	}, 2000);
}

/**
 * Go to page
 * @param {String} Target URL (optional)
 */
function go(page) {
	//loading(1);
	if ( page != '' )
		window.open(page,'_self');
	else
		history.back();
}

/**
 * Close warning message
 */
function close_warning_message() {
	$('#warnings').fadeOut();
	$('#warnings_ajax').fadeOut();
}

/**
 * Show warning message by javascript
 * Used only on AJAX calls
 * @param {Integer} Message type (required) [1: Success | 2: Warning | 3: Error]
 * @param {String} Message (required)
 * @return {Void}
 */
function warning(type,message) {
	if ( type == 1 ) {
		$('#warnings_ajax').removeClass('alert-error');
		$('#warnings_ajax').removeClass('alert-block');
		
		$('#warnings_ajax').addClass('alert-success');
	} else if ( type == 2 ) {
		$('#warnings_ajax').removeClass('alert-success');
		$('#warnings_ajax').removeClass('alert-error');

		$('#warnings_ajax').addClass('alert-block');
	} else if ( type == 3 ) {
		$('#warnings_ajax').removeClass('alert-success');
		$('#warnings_ajax').removeClass('alert-block');
		
		$('#warnings_ajax').addClass('alert-error');
	}

	$('#warnings_ajax').fadeIn();
	$('#warnings_ajax').html(message);

	setTimeout("close_warning_message()", 20000);
}

/**
 * Generic popup confirmation
 * @param {String} Message (required)
 * @return {Alert} Alert to confirm action
 */
function confirmation(message) {
	var ops;
	ops = window.confirm(message);
	if ( ops == true ) {
		return true;
	} else {
		return false;
	}
}
/*
function loading(action) {
	var image = $('img#loading');
	if ( action == 1 ) image.fadeIn();
	else image.fadeOut();
}
*/

/* usage
$(function() {
	if ( LerCookie('eacsoftware_popup_gostei_noticia') == false )
		$('#mensagem_gostei_noticia').fadeIn();
})
*/
/*
function cookie_create(name, value, days) {
	$.cookie(name, value, { expires: days });
}

function cookie_exists(name) {
	if ( $.cookie(name) == 1 )
		return true;
	else
		return false;
}

function cookie_get_value(name) {
	if ( $.cookie(name) == 1 )
		return $.cookie(name);
	else
		return false;
}

function cookie_delete(name) {
	$.cookie(name, null);
}
*/
