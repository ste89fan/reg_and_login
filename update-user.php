<?php
    if(isset($_COOKIE["user"])){

        $method = $_SERVER['REQUEST_METHOD'];

        $jsonString = file_get_contents("js/users.json");
        $allUsers = json_decode($jsonString,true);
        
        if ('PUT' ===  $method) {
            parse_str(file_get_contents('php://input'), $_PUT);
            var_dump($_PUT); //$_PUT contains put fields 
            $current_user_logged = $_COOKIE["user"];
            for($i = 0; $i<count($allUsers['users']); $i++) {
                if ($allUsers['users'][$i]['username'] == $current_user_logged) {
                    $allUsers['users'][$i] = $_PUT;
                    var_dump($_PUT);
                    // var_dump($allUsers['users'][$i]);
                    break;
                }
            }
    
            $result = json_encode($allUsers);
            file_put_contents("js/users.json",$result);
        } else {
            if ('DELETE' ===  $method) {
                parse_str(file_get_contents('php://input'), $_DELETE);
                var_dump($_DELETE); //$_DELETE contains put fields 
                $current_user_logged = $_COOKIE["user"];
                for($i = 0; $i<count($allUsers['users']); $i++) {
                    if ($allUsers['users'][$i]['username'] == $current_user_logged) {
                        //var_dump($_DELETE);
                        var_dump($allUsers['users']);
                        unset($allUsers['users'][$i]);
                        $allUsers['users'] = array_values($allUsers['users']);
                        var_dump($allUsers['users']);
                        break;
                    }
                }
        
                $result = json_encode($allUsers);
                file_put_contents("js/users.json",$result);
            }

        }
    } else {
        alert("Please Log In !!!");
    }

    

    

    ?>