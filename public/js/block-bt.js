$(document).ready(function() {
    document.oncontextmenu = function() {
		Swal.fire({
		  type: 'warning',
		  title: 'Esta acción no esta permitida',
		  showConfirmButton: false,
		});
		return false;
    }

});