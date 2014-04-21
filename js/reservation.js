function validate_form() {
	var good = true;
	if (!$('#input-name').val()) { good = false; $('#req-name').show(); }
	if (!$('#input-email').val()) { good = false; $('#req-email').show(); }
	if (!$('#input-phone').val() && !$('#input-cell').val()) { good = false; $('#req-phone').show(); }
	return good;
}
$(document).ready(function() {
	// hide requirement notes upon reset click
	$('#reset').on('click', function () {
		$('.requirement').hide();
	});
	// set focus on name
	if (!("autofocus" in document.createElement("input"))) {
		$("#input-name").focus();
	}
});
