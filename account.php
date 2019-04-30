<html>
<body>



<?php

if(isset($_COOKIE["user"])){
    $current_user_logged = $_COOKIE["user"];
    $current_username = file_get_contents("js/users.json");
    $current_username_json = json_decode($current_username, true);

    foreach($current_username_json["users"] as $current_user_value) {
        if($current_user_value["username"] === $current_user_logged) {
            $current_user = $current_user_value;
        }  
    }
}

    include("header.php");
    if(isset($current_user)) {
?>

    <div class="container">
        <form id="update-user" action="update-user.php">
            <div class="row mt-4 border border-info align-items-center p-3">
                <div class="col-12 d-flex justify-content-center"> 
                    <label>   
                        <?php if (isset($current_user["img"])){ ?>
                            <img id="user-logo" src="<?php echo $current_user['img'] ?>" alt="Image of <?php echo $current_user["username"]?>" style="width:100px"/>
                        <?php } ?>
                    </label>
                
                
                    <label>
                        <input type="file" id="imgUrl" name="imgUrl"/><br>
                    </label>
                    <label>
                        <input class="text-center user-account-field" name="username" readonly value="<?php echo $current_user["username"]?>"/>
                    </label>
                </div>
            </div>
            <div class="row mt-5 border border-info p-3">
                <div class="col-12 d-flex flex-column align-items-center">
                    <label for="password">Password: <input required class="text-center password-account-field" id="password" name="password" type="text" value="<?php echo $current_user["password"]?>" minlength="3"/></label>
                    <label for="email">E-mail: <input required class="text-center email-account-field" id="email" name="email" type="text" value="<?php echo $current_user["email"]?>"/></label>
                    <label for="phone">Phone: <input required class="text-center phone-account-field" id="phone" name="phone" type="text" value="<?php if (isset($current_user["phone"])) {echo $current_user["phone"];}?>"/></label>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="d-flex flex-column align-items-center">
                    <div class="mt-2">                       
                        <input type="submit" value="Save" class="btn btn-primary">
                        <input type="hidden" name="id" value="<?php echo $current_user?>">
                    </div>
                    <div class="d-flex flex-column mt-5">
                        <p>Delete your Account :</p>
                        <button type="button" id="delete-acc" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>              
        </form>
    </div>
    <?php   } else {
        echo "Please,Log in";
    } 
    ?>
    
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>