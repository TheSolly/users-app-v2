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


$(document).on('submit', '#form-update', function(e){
	e.preventDefault();
	// var formData = $("#form-update").serialize();
	var formData = new FormData(this);
	// var formData = {
 //            'id'              : $('input[name=id]').val(),
 //            'full_name'             : $('input[name=full_name]').val(),
 //            'username'             : $('input[name=username]').val(),
 //            'email'             : $('input[name=email]').val(),
 //            'password'             : $('input[name=password]').val(),
 //            're_password'             : $('input[name=re_password]').val()
 //        }; 
	console.log(formData);
	$.ajax({
		url: url,
		type: 'POST',
        data: formData,
		contentType: false,
		processData: false,
		success:function (data) {
			$("#form-update").remove();
			$('.add-new').show();
			url = pageUrl();
			getAllCourses(url);
			getAllUsers(url);
		}
	});
	
});



$(document).on('click', '.edit', function() {
	var id = $(this).attr('id');
	console.log(id);
	$.ajax({
		url: url,
		type: 'POST',
		data: {edit: id},
		success:function (data) {	
			$('#edit-or-add').append(data);
			$('.add-new').hide();
		}

	});
}); 


$(document).on('click', '.del', function() {
	var id = $(this).attr('id');
	$.ajax({
		url: url,
		type: 'POST',
		data: {del: id},
		success:function (data) {	
			var username = $(".user-name").attr('id');
			swal({
			  type: 'success',
			  title: username + ' have been deleted successfully!',
			  showConfirmButton: false,
			  timer: 2000
			});
			url = pageUrl();
			getAllCourses(url);
			getAllUsers(url);

		}
	});
}); 