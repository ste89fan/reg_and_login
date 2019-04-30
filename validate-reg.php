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
        <div class="row justify-content-center bg-warning py-3">
            <form class="col-6 d-flex flex-column mb-4 align-items-center text-center" action="#" method="POST">
                <div class="col-2"><label class="font-weight-bold">Username: <input required class="mb-2" id="reg-username" type="text" name="username"/><button type="button" class="btn btn-secondary btn-sm ml-2 user-check-button">Check Username Availability</button></label></div>
                <div class="col-2"><label class="font-weight-bold">Password: <input required class="mb-2" id="reg-password" type="password" name="password"/></label></div>
                <div class="col-2"><label class="font-weight-bold">Re-type Password: <input required class="mb-2" id="retype-password" type="password" name="re-password"/></label></div>
                <div class="col-2"><label class="font-weight-bold">E-mail: <input required class="mb-2" id="user-mail" type="email" name="email"/></label></div>
                <div class="col-2"><label class="font-weight-bold">Phone: <input required class="mb-4" id="reg-phone" type="text" name="phone"/></label></div>
                <div class="col-2 ml-5"><button class="btn btn-primary confirm-registration-button px-4" name="submit">Confirm</button></div>
            </form>
        </div>
        <div class="row bg-warning">
            <div class="col-12 d-flex justify-content-center ml-5">
                <a href="index.php" class="btn btn-primary px-4 bg-secondary">Go Back</a>
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