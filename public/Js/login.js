$(document).ready(function(){


$('.login-btn').on('click',function() {
	var status1 = "undone";
	var status2 ="undone";
	var email = $('.email').val();
	var pass = $('.pass').val();
	var _token = $('#_token').val();
	//alert(email+" "+pass+" "+_token);
	if(email!=''){
		var atpos = email.indexOf('@');
		var dotpos = email.lastIndexOf('.');
		var len = email.length;
			//console.log(atpos+" "+dotpos+" "+len)
			if(atpos>1 && atpos < dotpos+2 && dotpos+2 < len){
				$('#alert_email').html('');
				status1 = "ok";
				$('.email').css('border','1px solid green');				// email validation
			}
			else{
				status1 ="undone";

				$('#alert_email').html('Enter valid Email id');
				$('#alert_email').fadeIn(100);
				$('.email').css('border','1px solid red');
				$('#alert_email').fadeOut(3000);
			}
	}else{
		status1 ="undone";
		$('#alert_email').fadeIn(100);
		$('#alert_email').html('Required*');
		$('.email').css('border','1px solid red');
		$('#alert_email').fadeOut(3000);
		}

	if(pass!=''){
			status2 = "ok";
			$('.pass').css('border','1px solid green');
		}
		else{
			status2 ="undone";
			$('#alert_password').html('Required*');
			$('#alert_password').fadeIn(100);
			$('.pass').css('border','1px solid red');
			$('#alert_password').fadeOut(3000);
		}


	if(status1 == "ok" && status2 == "ok"){
			$.ajax({
				type : 'post',
				url : window.location.href,
				data : {
					"_token" : _token,
					"email" : email,
					"pass" : pass,
				},
				success: function(data){
					if(data = "successful"){
						//alert("successfully Logged in.");
					window.location = "http://local.laravel.com/dashboard";
					}
					else{
						if(data == "password"){
							$('#check-login').html("Wrong password. Try again.");
							$('#check-login').show(500);

						}
						else if(data == "email"){
							$('#check-login').html("Invalid email & password. Try with valid one.");
							$('#check-login').show(500);
						}
					}
				},
				error: function(data){

				},

			});
		}

	});
});