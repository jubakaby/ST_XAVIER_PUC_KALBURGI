$(document).ready(function(){
	var addStudent = $("#newRegistration");
	var validator = addStudent.validate({
		rules:{
			fname :{ required : true },
			email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post"} },
			password : { required : true,minlength: 6 },
			cpassword : {required : true, equalTo: "#password"},
			mobile : { required : true, digits : true, maxlength: 10, remote : { url : baseURL + "checkMobileNumberExists", type :"post"} },
			registration_number : { required : true,  remote : { url : baseURL + "checkRegisterNumberExists", type :"post"} },
		},
		messages:{
			fname :{ required : "This field is required" },
			email : { required : "This field is required", email : "Please enter valid email address" ,remote : "Email already taken" },
			password : { required : "This field is required", minlength:"Password length minimum 6 letter" },
			cpassword : { required : "This field is required", equalTo: "Password mismatch" },
			mobile : { required : "This field is required",maxlength:"Enter valid phone number", digits : "Please enter numbers only" ,remote : "Mobile Number Already Registred" },
			registration_number : { required : "This field is required", maxlength:"Enter valid Register number" ,remote : "Register Number is Already Registred" },			
		}
	});
});
