<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My reg and log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>
<body>

    <header>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <div class="container">
                <a class="navbar-brand" href="index.php">My Logo</a>
                <ul class="nav justify-content-end">
                    <?php 
                    $cookie_name = "user";
                    if(!isset($_COOKIE[$cookie_name])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link log-button" href="validate-log.php">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link reg-button" href="validate-reg.php">Register</a>
                        </li>
                    <?php } else if(($_COOKIE[$cookie_name])==="Admin"){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link acc-button" href="admin-users.php">All Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout-button" href="#">Log out</a>
                        </li>
                    <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link acc-button" href="account.php">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout-button" href="#">Log out</a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </nav>
    </header>