$(document).ready(function() {

	var logoutBtn = $(".logout-button");
	var currentUser;
	var backBtn = $(".back-button");
	var confirmLogBtn = $(".confirm-log-button");
	var userName = $("#username");
	var pass = $("#password");
	var regUsername = $("#reg-username");
	var regPass = $("#reg-password");
	var regPhone = $("#reg-phone");
	var userCheckBtn = $(".user-check-button");
	var userMail = $("#user-mail");
	var confRegBtn = $(".confirm-registration-button");
	var reTypePass = $("#retype-password");
	var delAcc = $("#delete-acc");

	backBtn.css("display","flex");

	var objRole = "user";

	var userExist=false;
	var passExist=false;
	var mailExist=false;
	var rePass=false;
	var userRole=false;

		//CHECK USER ON LOG IN
		confirmLogBtn.on("click",function(e) {
			userExist=false;
			passExist=false;
			userRole=false;
			
			e.preventDefault();
			$.ajax({
				method: "GET",
				url: "/reg_and_login/js/users.json",
				dataType: "json",
				success: function(json) {
					$(json.users).each(function(i,data){
						if(userName.val()===data.username) {
							userExist=true;
							if(pass.val()===data.password) {
								passExist=true;
								currentUser=data.username;
							}
							if(data.role==="administrator"){
								userRole=true;
							}
						}
						
					});
					if(userExist===true) {
						if(passExist===true) {
							document.cookie="user=" + currentUser + "; path=/";
							window.location.href = "welcome-page.php";
								if(userRole===true) {
									document.cookie="user=Admin; path=/";
									window.location.href = "admin-main.php";
								}
						} else {
							alert("Password inccorect");
						}
					} else {
						alert("Username inccorect");
					}
				}	
			});
		});

		//LOGOUT BUTTON
		logoutBtn.on('click', function() {
			document.cookie = "user=" + currentUser + ";  expires=Thu, 18 Dec 2013 12:00:00 UTC';  path=/";
			window.location.href = "index.php";
		});
		//CHECK IF USER EXIST ON BUTTON CHECK USERNAME
		userCheckBtn.on("click",function() {
			userExist=false;
			if(!regUsername.val()) {
				alert("Please insert username!!!");
			} else {
				$.ajax({
					method: "GET",
					url: "/reg_and_login/js/users.json",
					dataType: "json",
					success: function(json) {
						$(json.users).each(function(i,data) {
							if(regUsername.val()===data.username) {
								userExist=true;
							}
						});
						if(userExist===true) {
							alert("User already exist");

						} else {
							alert("It's OK,Username is free!");
						}
					}
				});
			}	
		});

		//Confirm REGISTRATION
		confRegBtn.on("click",function(e) {
			userExist=false;
			mailExist=false;
			rePass=false;
			e.preventDefault();
			if(reTypePass.val()===regPass.val()) {
				rePass=true;
			if(userMail.val()) {
				$.ajax({
					method: "GET",
					url: "/reg_and_login/js/users.json",
					dataType: "json",
					success: function(json) {
						$(json.users).each(function(i,data) {
							if(regUsername.val()===data.username) { 
								userExist=true;
							};
							if(userMail.val()===data.email) {
								mailExist=true;
							};
						});
						if(userExist===true) {
							alert("User already exist");
						}
						else if(mailExist===true) {
							alert("Mail already exist");
						}
						else if(rePass===false) {
							alert("Password doesn't match.Please check and type password again");
						}
						 else {

							let username = regUsername.val();
							let email = userMail.val();
							let password =	regPass.val();
							let phone = regPhone.val();
							if ( phone && username && email && password ) {

								newData = {
									"role" : objRole,
									"username" : username,
									"password" : password,
									"email" : email,
									"phone" : phone
								};							
								$.ajax({
									method: "POST",
									url: "/reg_and_login/reg-page.php",
									data: newData,
									success: function(data) {
										console.log('data: ', data);
										alert('Uspesno ste registrovani, molimo vas ulogujte se');
										window.location.href = "/reg_and_login/validate-log.php";
									},
									error: function(err) {
										console.log("error: ",err);
									}
								});
							} else {
								alert('Please fill all fields!');
							}
						}
					}
				});
			} else {
				alert("Mail field is empty!");
				}
			}else {
				alert("Check your password!");
			};
		});

		let imgInput = $('#imgUrl');
		let imgUrl;
		imgInput.on('change', function(el) {
			var reader = new FileReader();
			reader.readAsDataURL(this.files[0]);
			reader.onload = function() {
				imgUrl = reader.result;
			};
			this.files[0]='';
		});
		let userLogoSrc = $('#user-logo').attr('src');
		let updateForm = $('#update-user');

		updateForm.on("submit",function(el) {
			el.preventDefault();
			
			username = $('input[name="username"]').val();
			password = $('input[name="password"]').val();
			email = $('input[name="email"]').val();
			phone = $('input[name="phone"]').val();
			newData= {
				"role" : objRole,
				"username" : username,
				"password" : password,
				"email" : email,
				"phone" : phone
			}
			if ( imgUrl ) {
				newData.img = imgUrl;
			} else if ( userLogoSrc ) {
				newData.img = userLogoSrc;
			} 
			
			$.ajax({
				method: "PUT",
				url: "/reg_and_login/update-user.php",
				DataType: "json",
				data: newData,
				beforeSend: function() {
					console.log('please wait while your data is updating...');
				},
				success: function(putData) {
					console.log('success: ', putData);
					location.reload();
				},
				error: function(xlr) {
					console.log('error: ', xlr);
				}
			});
		});
		delAcc.on("click",function() {
			$.ajax({
				method: "DELETE",
				url: "/reg_and_login/update-user.php",
				beforeSend: function() {
					console.log('please wait while your data is deleting...');
				},
				success: function(deleteData) {
					console.log('success: ', deleteData);
					document.cookie = "user=" + currentUser + ";  expires=Thu, 18 Dec 2013 12:00:00 UTC';  path=/";
					window.location.href = "/reg_and_login";
				},
				error: function(xlr) {
					console.log('error: ', xlr);
				}
			})
		})
	});