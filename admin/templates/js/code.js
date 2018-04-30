$(function () {
	getAllUsers();
});


function getAllUsers() {
	$.ajax({
		url: 'http://localhost:9000/admin/ajax/users.ajax.php',
		type: 'POST',
		data: {getAll: ''},
		success: function (data) {
			$('#user-data').html(data);
		}
	});
}

$(document).on('click', '.del', function() {
	event.preventDefault();
	var id = $(".del").attr('user-id');
	$.ajax({
		url: 'http://localhost:9000/admin/ajax/users.ajax.php',
		type: 'POST',
		data: {del: id},
		success:function (data) {
			alert(data);
			getAllUsers();
		}
	});
});
