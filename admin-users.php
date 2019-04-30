<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 mt-3">
            <?php
                $jsonData = file_get_contents("js/users.json");
                $allUsers = json_decode($jsonData,true);
                $usersArray = $allUsers["users"];

                foreach($usersArray as $user) {
                    if($user["role"]==="user") {
                        echo "<div class='border border-danger mb-3 text-center bg-light'>";
                        echo "<span class='font-weight-bold'>Role</span>: ". "" .$user["role"];
                        echo "<br><span class='font-weight-bold'>Username</span>: ". "" .$user["username"];
                        echo "<br><span class='font-weight-bold'>Password</span>: ". "" .$user["password"];
                        echo "<br><span class='font-weight-bold'>E-mail</span>: ". "" .$user["email"];
                        echo "<br><span class='font-weight-bold'>Phone</span>: ". "" .$user["phone"];
                        echo "</div>";
                    } else {
                        echo "<div class='border border-danger mb-3 text-center bg-light'>";
                        echo "<span class='font-weight-bold'>Role</span>: ". "" .$user["role"];
                        echo "<br><span class='font-weight-bold'>Username</span>: ". "" .$user["username"];
                        echo "<br><span class='font-weight-bold'>Password</span>: ". "" .$user["password"];
                        echo "</div>";
                    }
                    
                }  
            ?>
        </div>
        <div class="col-12 text-center">
            <a href="admin-main.php" class="btn btn-primary mb-4">Back</a>
        </div>
    </div>
</div>

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>