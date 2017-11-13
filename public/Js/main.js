$(document).ready(function(){

	$( ".display-user li" ).each(function(index) 
	{
		index++;
		$('#result_count').html(index);
	});

function titleCase(str) {
  return str.split(' ').map(function(val){ 
    return val.charAt(0).toUpperCase() + val.substr(1).toLowerCase();
  }).join(' ');
}
	//$('.panel-body').css("display","none");
	$('.update').click(function(e){
		e.preventDefault();
			$('.update-form').css('display','block');
			//$('.update-form').fadeIn(1000,function);
			$('.overlay').css('display','block');
		
	});


	$('#image-upload').click(function(e){
		//e.preventDefault();
			$('.upload-image').css('display','block');
			$('.overlay').css('display','block');

	});





	$('.overlay').click(function(){
		
		$('.update-form').css('display','none');
		//$('.overlay').css('display','none');
		jQuery(this).fadeOut(500, function(){
			$('.overlay').css('display','none');
		});
	});
	
	$('.delete').click(function(){
		var name = $('.name').text();
		var email = $('.email').text();
		//alert(email);
		if(confirm("Are you sure to delete "+name+"'s record ??"))
		{
			$.ajax({
				type:'GET',
				url: window.location.href+'/delete',
				data:{
					email : email,
				},
				success:function(data){
                 //alert();
                 window.location = 'http://local.laravel.com/contact';

            	 },
                 error: function (data) {
                 	//alert(data);
                	}
			});
			
		}
	});
	
	$('.search').on('keyup',function(event){
		var searchtext = $(this).val().toLowerCase();
		var result_count = 0;
		$( ".display-user li" ).each(function(index) 
		{
  			if($(this).text()!='')
  			{	
	  			if($(this).text().toLowerCase().indexOf(searchtext)>=0){
	  				//console.log($( this ).text());
	  				$(this).css('display','block');
	  				result_count++;
	  				//console.log(index);
	  				$('#result_count').html(result_count);
	  			}
	  			else{
	  				$(this).css('display','none');
	  				$('#result_count').html(result_count);
	  				//result_count--;
	  			}
  			}
		});
	});
			








	//registeration form
	status1 = "undone";
	status2 = "undone";
	status3 = "undone";
	status4 = "undone";

		$('.name').on('focus',function(){
			$('.name').css('border-radius','5px 5px 0px 0px');
			$('#name-check').show(500,function(){
				
			});			
		});
		$('.name').on('blur',function(){
			$('#name-check').hide(500,function(){
				$('.name').css('border-radius','5px 5px 5px 5px');
			});				
		});



		$('.email').on('focus',function(){
			$('.email').css('border-radius','5px 5px 0px 0px');
			$('#email-check').show(500,function(){
				
			});			
		});
		$('.email').on('blur',function(){
			$('#email-check').hide(500,function(){
				$('.email').css('border-radius','5px 5px 5px 5px');
			});				
		});



		$('.pass').on('focus',function(){
			$('.pass').css('border-radius','5px 5px 0px 0px');
			$('#password-meter').show(500,function(){
				
			});			
		});
		$('.pass').on('blur',function(){
			$('#password-meter').hide(500,function(){
				$('.pass').css('border-radius','5px 5px 5px 5px');
			});				
		});



		$('.confrm_pass').on('focus',function(){
			$('.confrm_pass').css('border-radius','5px 5px 0px 0px');
			$('#password-confirm').show(500,function(){
				
			});			
		});

		$('.confrm_pass').on('blur',function(){
			$('#password-confirm').hide(500,function(){
				$('.confrm_pass').css('border-radius','5px 5px 5px 5px');
			});				
		});

	



		$('.name').on('keyup',function(){
			var name = $('.name').val();
			if(name == ""){
				status1 = "undone";
			}
			//console.log(name.indexOf(' '));
			//alert(name.match(/([!,%,&,@,#,$,^,*,?,_,~])/));
			if(name.indexOf(' ')<=0 || name.indexOf(' ') == name.length-1 || name.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){
				status1 = "undone";
				$('#name-check').css('background-color','red');
			}
			else{
				status1 = "ok";
				$('#name-check').css('background-color','green');
			}
		});

		$('.email').on('keyup',function(){
			var email = $('.email').val();
			var atpos = email.indexOf('@');
			var dotpos = email.lastIndexOf('.');
			var len = email.length;

			//alert(name.match(/([!,%,&,@,#,$,^,*,?,_,~])/));
			if(atpos>1 && atpos < dotpos+2 && dotpos+2 < len){
				$('#email-check').css('background-color','green');
				status2 = "ok";
			}
			else{
				$('#email-check').css('background-color','red');
				status2 = "undone";
			}
		});


		$('.pass').on('keyup',function(){

			var pass1 = $('.pass').val();
			$('.alert_pass').html(checkStrength(pass1));
			$('.alert_pass').fadeIn(100,function(){
				setTimeout(function(){
					$('.alert_pass').fadeOut(1000);
				},3000);
			});
		});
		
		function checkStrength(password)
		{ 
		//initial strength var 
		
		var strength = 0;
		//if the password length is less than 6, return message. 
		if (password.length < 6) { 
			$('#password-meter').removeClass();
			$('#password-meter').addClass('short');
			$('.confrm_pass').attr('disabled','disabled');
			return 'Too short';
		} 
		//if length is 8 characters or more, increase strength value 
		if (password.length > 7) 
			strength += 1;
		//if password contains both lower and uppercase characters, increase strength value 
		if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) 
			strength += 1;
		//if it has numbers and characters, increase strength value 
		if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) 
			strength += 1; 
		//if it has one special character, increase strength value 
		if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) 
			strength += 1;
		//if it has two special characters, increase strength value 
		if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) 
			strength += 1;
		//console.log(strength);
		//now we have calculated strength value, we can return messages //if value is less than 2 
		if (strength < 2 ) { 
			$('#password-meter').removeClass();
			 $('#password-meter').addClass('weak');
			 $('.confrm_pass').attr('disabled','disabled');
			 status3 = "undone";
			 return 'Weak'; 
			}
		else if (strength == 2 ) { 
			 $('#password-meter').removeClass();
			 $('#password-meter').addClass('ok');
			 $('.confrm_pass').attr('disabled','disabled');
			 status3 = "undone";
			 return 'Ok'; 
			} 
		else if (strength > 2 && strength < 5) { 
			 $('#password-meter').removeClass();
			 $('#password-meter').addClass('good');
			 $('.confrm_pass').removeAttr('disabled');
			 status3 = "ok";
			 return 'Good';
			 } 
		else { 
			 $('#password-meter').removeClass();
			 $('#password-meter').addClass('strong');
			 $('.confrm_pass').removeAttr('disabled');
			 status3 = "ok";
			 return 'Strong'; 
			} 

		}



		$('.confrm_pass').on('keyup',function(){
			var pass1 = $('.pass').val();
			var pass2 = $('.confrm_pass').val();
			if(pass1.indexOf(pass2)==0){
				$('#password-confirm').css('background-color','green');
				status4 = "ok";
			}
			else{
				$('#password-confirm').css('background-color','red');
				status4 = "undone";
			}

		});





		$('#register-btn').click(function(event){
		event.preventDefault();
		var name = titleCase($('.name').val());
		var email = $('.email').val();
		var pass1 = $('.pass').val();
		var pass2 = $('.confrm_pass').val();
		var _token = $('#_token').val();

		//registration form validation 
		
		if(name!=''){
			if(status1 == "ok"){					//name validation
				$('#alert_name').html('');
				$('.name').css('border','1px solid green');
			}
			else{
				$('#alert_name').html('Full name please');
				$('.name').css('border','1px solid red');

			}
		}else{
			$('#alert_name').html('Required*');
			$('.name').css('border','1px solid red');
		}

		if(email!=''){
			//console.log(atpos+" "+dotpos+" "+len)
			if(status2 == "ok"){
				$('#alert_email').html('');
				$('.email').css('border','1px solid green');				// email validation
			}
			else{
				$('#alert_email').html('Enter valid Email id');
				$('.email').css('border','1px solid red');
			}
			}else{
				$('#alert_email').html('Required*');
				$('.email').css('border','1px solid red');
			}



		if(pass1!=''){
			if(status3 == "ok"){
				$('#alert_password').html('');
				$('.pass').css('border','1px solid green');
			}
			else{
				$('#alert_password').html('Try differnt combination.');
				$('.pass').css('border','1px solid red');

		}
		}else{
			$('#alert_password').html('Required*');
			$('.pass').css('border','1px solid red');
			$('.password-meter').css('display','none');
		}


		if(pass2!=''){
			if(status4 == "ok"){
				$('#alert_confrm_pass').html('');
				$('.confrm_pass').css('border','1px solid green');
			}
			else{
				$('#alert_confrm_pass').html('Type same password.');
				$('.confrm_pass').css('border','1px solid red');			
		}
		}else{
			$('#alert_confrm_pass').html('Required*');
			$('.confrm_pass').css('border','1px solid red');
		}
	

		if(status1 == "ok" && status2 == "ok" && status3 == "ok" && status4 == "ok"){

		$.ajax({
			type:'post',
			url: window.location.href,
			data:{
					"_token" : _token,
					"name": name,
					"email" : email,
					"pass" : pass1,
				},
			success:function(data){
                 	
                 	//console.log(data);
                 	alert("Successfully Registered");
                 	window.location = "http://local.laravel.com/login";
            	 },
            error: function (data) {
                 	//alert(data);
                 	alert("There is some error !");
                }
			});
			}

		});


		//login form

		

});