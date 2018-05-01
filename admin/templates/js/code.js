$(function () {
	var urladd = $(location).attr('href');
	if (urladd == "http://localhost:9000/admin/admins.php") {
		urladd = "http://localhost:9000/admin/ajax/admins.ajax.php";
		getAllUsers(urladd);
	}
	else if (urladd == "http://localhost:9000/admin/students.php") {
		urladd = "http://localhost:9000/admin/ajax/students.ajax.php";
		getAllUsers(urladd);
	}
	else if (urladd == "http://localhost:9000/admin/teachers.php") {
		urladd = "http://localhost:9000/admin/ajax/teachers.ajax.php";
		getAllUsers(urladd);
	}
	else {
		urladd = "http://localhost:9000/admin/ajax/courses.ajax.php";
		getAllCourses(urladd);
	}
	console.log(urladd);
});


function getAllUsers(urladd) {
	$.ajax({
		url: urladd,
		type: 'POST',
		data: {getAll: ''},
		success: function (data) {
			$('#user-data').html(data);
		}
	});
}

function getAllCourses(urladd) {
	$.ajax({
		url: urladd,
		type: 'POST',
		data: {getAll: ''},
		success: function (data) {
			$('#course-data').html(data);
		}
	});
}

$(document).on('click', '.del', function() {
	event.preventDefault();
	var id = $(".del").attr('user-id');
	$.ajax({
		url: urladd,
		type: 'POST',
		data: {del: id},
		success:function (data) {
			alert(data);
			getAllUsers(urladd);
		}
	});
}); 