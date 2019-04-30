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
        <div class="row bg-warning justify-content-center py-3">
            <div class="col-6">
            <form class="d-flex align-items-center flex-column" action="#" method="POST">
                <label class="font-weight-bold">Username: <input class="mb-2" type="text" id="username" name="username"/></label>
                <label class="font-weight-bold">Password: <input class="mb-4" type="password" id="password" name="password"/></label>
                <button class="btn btn-primary confirm-log-button" name="submit">Confirm</button>
            </div>
        </div>
        <div class="row bg-warning justify-content-center">
        <div>
            <a href="index.php" style="display:none" class="btn btn-primary back-button px-4">Back</a>
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