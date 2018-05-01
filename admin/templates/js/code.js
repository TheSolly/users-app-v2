$(function () {
	url = pageUrl();
	getAllCourses(url);
	getAllUsers(url);

});

function pageUrl() {
	var urladd = $(location).attr('href');
	if (urladd == "http://localhost:9000/admin/admins.php") {
		urladd = "http://localhost:9000/admin/ajax/admins.ajax.php";
	}
	else if (urladd == "http://localhost:9000/admin/students.php") {
		urladd = "http://localhost:9000/admin/ajax/students.ajax.php";
	}
	else if (urladd == "http://localhost:9000/admin/teachers.php") {
		urladd = "http://localhost:9000/admin/ajax/teachers.ajax.php";
	}
	else {
		urladd = "http://localhost:9000/admin/ajax/courses.ajax.php";
	}
	return urladd;
}
function getAllUsers(url) {
	$.ajax({
		url: url,
		type: 'POST',
		data: {getAll: ''},
		success: function (data) {
			$('#user-data').html(data);
		}
	});
}

function getAllCourses(url) {
	$.ajax({
		url: url,
		type: 'POST',
		data: {getAll: ''},
		success: function (data) {
			$('#course-data').html(data);
		}
	});
}

$(document).on('click', '.del', function() {
	event.preventDefault();
	var id = $(".del").attr('id');
	$.ajax({
		url: pageUrl(),
		type: 'POST',
		data: {del: id},
		success:function (data) {
			alert(data);
			url = pageUrl();
			getAllCourses(url);
			getAllUsers(url);

		}
	});
}); 