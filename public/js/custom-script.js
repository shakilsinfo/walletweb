jQuery(document).ready(function () {
	$('.decimal').on('keydown', function (event) {
		return isNumber(event, this);
	});
	function isNumber(evt, element) {
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if ((charCode != 190 || $(element).val().indexOf('.') != -1)  // “.” CHECK DOT, AND ONLY ONE.
				&& (charCode != 110 || $(element).val().indexOf('.') != -1)  // “.” CHECK DOT, AND ONLY ONE.
				&& ((charCode < 48 && charCode != 8)
						|| (charCode > 57 && charCode < 96)
						|| charCode > 105))
			return false;
		return true;
	}
});