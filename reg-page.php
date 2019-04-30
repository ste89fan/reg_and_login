<?php

		$username = $_POST["username"];
		$pass = $_POST["password"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];

		// $resp = '{' . 'username:' . $username . ", " . 'password: ' . $pass . ", " . 'email: '. $email . ", " . 'phone: ' . $phone . '}';
		// $resp = json_encode($resp);
		// echo $resp;
		$str = file_get_contents("js/users.json");
		$data = json_decode($str, true);
		$role = "user";
		$new_user = (array)["role"=>$role,"username"=>$username,"password"=>$pass,"email"=>$email,"phone"=>$phone];
	 	var_dump($new_user);
		$data["users"][]= $new_user;
		
		$result = json_encode($data);
		file_put_contents("js/users.json",$result);

		//User authorization


		?>