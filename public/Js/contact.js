$(document).ready(function(){

status1 = "undone";
status2 = "undone";
status3 = "undone";
status4 = "undone";
status5 = "undone";
status6 = "undone";
status7 = "undone";



		$('.mobile').on('focus',function(){
			$('.mobile').css('border-radius','5px 5px 0px 0px');
			$('#mobile-check').css('width','inherit');
			$('#mobile-check').show(500,function(){

			});			
		});
		$('.mobile').on('blur',function(){
			$('#mobile-check').hide(500,function(){
				$('.mobile').css('border-radius','5px 5px 5px 5px');
			});				
		});


		$('.gender').on('focus',function(){
			$('.gender').css('border-radius','5px 5px 0px 0px');
			$('#gender-check').css('width','inherit');
			$('#gender-check').show(500,function(){

			});			
		});
		$('.gender').on('blur',function(){
			$('#gender-check').hide(500,function(){
				$('.gender').css('border-radius','5px 5px 5px 5px');
			});				
		});


		$('.street').on('focus',function(){
			$('.street').css('border-radius','5px 5px 0px 0px');
			$('#street-check').css('width','inherit');
			$('#street-check').show(500,function(){

			});			
		});
		$('.street').on('blur',function(){
			$('#street-check').hide(500,function(){
				$('.street').css('border-radius','5px 5px 5px 5px');
			});				
		});


		$('.city').on('focus',function(){
			$('.city').css('border-radius','5px 5px 0px 0px');
			$('#city-check').css('width','inherit');
			$('#city-check').show(500,function(){

			});			
		});
		$('.city').on('blur',function(){
			$('#city-check').hide(500,function(){
				$('.city').css('border-radius','5px 5px 5px 5px');
			});				
		});


		$('.state').on('focus',function(){
			$('.state').css('border-radius','5px 5px 0px 0px');
			$('#state-check').css('width','inherit');
			$('#state-check').show(500,function(){

			});			
		});
		$('.state').on('blur',function(){
			$('#state-check').hide(500,function(){
				$('.state').css('border-radius','5px 5px 5px 5px');
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



		$('.mobile').on('keyup',function(){
			var mobile = $('.mobile').val();
			if(mobile == ""){
				status3 = "undone";
			}
			//console.log(name.indexOf(' '));
			//alert(name.match(/([!,%,&,@,#,$,^,*,?,_,~])/));
			if(mobile.length == 10 && mobile > 0000000000 && mobile.indexOf('0')>0){
				status3 = "ok";
				$('#mobile-check').css('background-color','green');
			}
			else{
				status3 = "undone";
				$('#mobile-check').css('background-color','red');
				
			}
		});

		

		$('.gender').mouseup(function(){
			var value = $(this).val();
			if(value!="select"){
				status4 = "ok";
				$('#gender-check').css('background-color','green');
			}
			else{
				status4 = "undone";
				$('#gender-check').css('background-color','red');
			}
		});


		$('.street').on('keyup',function(){
			var value = $('.street').val();
			if(value!="" && value.length > 3){
				status5 = "ok";
				$('#street-check').css('background-color','green');
			}
			else{
				status5 = "undone";
				$('#street-check').css('background-color','red');
			}
		});



		$('.city').mouseup(function(){
			var value = $(this).val();
			if(value!="select"){
				status6 = "ok";
				$('#city-check').css('background-color','green');
			}
			else{
				status6 = "undone";
				$('#city-check').css('background-color','red');
			}
		});

		$('.state').mouseup(function(){
			var value = $(this).val();
			if(value!="select"){
				status7 = "ok";
				$('#state-check').css('background-color','green');
			}
			else{
				status7 = "undone";
				$('#state-check').css('background-color','red');
			}
			});








		


		$('#contact-btn').click(function(event){
		event.preventDefault();
		var name = $('.name').val();
		var email = $('.email').val();
		var mobile = $('.mobile').val();
		var gender = $('.gender').val();
		var street = $('.street').val();
		var city = $('.city').val();
		var state = $('.state').val();
		var _token = $('#_token').val();

		//registration form validation 
		
		if(name!=''){
			if(status1 == "ok"){					//name validation
				$('#alert_name').html('');
				$('.name').css('border','1px solid green');
			}
			else{
				$('#alert_name').html('Full name please');
				$('#alert_name').fadeIn(100);
				$('#alert_name').fadeOut(5000);
				$('.name').css('border','1px solid red');

			}
		}else{
			$('#alert_name').html('Required*');
			$('#alert_name').fadeIn(100);
			$('#alert_name').fadeOut(5000);
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
				$('#alert_email').fadeIn(100);
				$('#alert_email').fadeOut(5000);
				$('.email').css('border','1px solid red');
			}
			}else{
				$('#alert_email').html('Required*');
				$('#alert_email').fadeIn(100);
				$('#alert_email').fadeOut(5000);
				$('.email').css('border','1px solid red');
			}


		
		if(mobile!=''){
			//console.log(atpos+" "+dotpos+" "+len)
			if(status3 == "ok"){
				$('#alert_mobile').html('');
				$('.mobile').css('border','1px solid green');				// email validation
			}
			else{
				$('#alert_mobile').html('Enter valid Mobile No.');
				$('#alert_mobile').fadeIn(100);
				$('#alert_mobile').fadeOut(5000);
				$('.mobile').css('border','1px solid red');
			}
			}else{
				$('#alert_mobile').html('Required*');
				$('#alert_mobile').fadeIn(100);
				$('#alert_mobile').fadeOut(5000);
				$('.mobile').css('border','1px solid red');
			}


		
		
		if(gender!='select'){
			//console.log(atpos+" "+dotpos+" "+len)
			if(status4 == "ok"){
				$('#alert_gender').html('');
				$('.gender').css('border','1px solid green');				// email validation
			}
			}else{
				$('#alert_gender').html('Required*');
				$('#alert_gender').fadeIn(100);
				$('#alert_gender').fadeOut(5000);
				$('.gender').css('border','1px solid red');
			}


		if(street!=''){
			//console.log(atpos+" "+dotpos+" "+len)
			if(status5 == "ok"){
				$('#alert_street').html('');
				
				$('.street').css('border','1px solid green');				// email validation
			}
			else{
				$('#alert_street').html('Enter full street name');
				$('#alert_street').fadeIn(100);
				$('#alert_street').fadeOut(5000);
				$('.street').css('border','1px solid red');
			}
			}else{
				$('#alert_street').html('Required*');
				$('#alert_street').fadeIn(100);
				$('#alert_street').fadeOut(5000);
				$('.street').css('border','1px solid red');
			}


		if(city!='select'){
			//console.log(atpos+" "+dotpos+" "+len)
			if(status6 == "ok"){
				$('#alert_city').html('');
				$('.city').css('border','1px solid green');				// email validation
				}
			}else{
				$('#alert_city').html('Required*');
				$('#alert_city').fadeIn(100);
				$('#alert_city').fadeOut(5000);
				$('.city').css('border','1px solid red');
			}




		if(state!='select'){

			//console.log(atpos+" "+dotpos+" "+len)
			if(status7 == "ok"){
				$('#alert_state').html('');
				$('.state').css('border','1px solid green');				// email validation
			}
			}else{
				$('#alert_state').html('Required*');
				$('#alert_state').fadeIn(100);
				$('#alert_state').fadeOut(5000);
				$('.state').css('border','1px solid red');
			}


			


		if(status1 == "ok" && status2 == "ok" && status3 == "ok" && status4 == "ok" && status5 == "ok" && status6 == "ok" && status7 == "ok"){
			//alert(window.location.href);
		$.ajax({
			type:'post',
			url: window.location.href,
			data:{
					"_token" : _token,
					"name": name,
					"email" : email,
					"mobile" : mobile,
					"gender" : gender,
					"street" : street,
					"city" : city,
					"state" : state,
				},
			success:function(data){
                 	
                 	//console.log(data);
                 	alert("Response Successfully recorded");
                 	window.location = "http://local.laravel.com/contact";
            	 },
            error: function (data) {
                 	//alert(data);
                 	alert("There is some error !");
                }
			});
			}

			});

});

