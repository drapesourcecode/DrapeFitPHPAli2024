<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        if (isset($_POST['email'])) {
            session_start();
            //require('db/users.php');
            $objUser = new \users();
            $objUser->setEmail($_POST['email']);
            $objUser->setName($_POST['name']);
            $objUser->setLoginStatus(1);
            $objUser->setLastLogin(date('Y-m-d H:i:s'));
            $userData = $objUser->getUserByEmail();
            if (is_array($userData) && count($userData) > 0) {
                $objUser->setId($userData['id']);
                if ($objUser->updateLoginStatus()) {
                    echo "User Login..";
                $_SESSION['user'][$userData['id']]=$userData;
                header("location: chatroom.php");
                } else {
                    echo "Faild to login..";
                }
            } else {

            	
                if ($objUser->save()) {
                    $lastId = $objUser->conn->lastInsertId();
                    $objUser->setId($lastId);
                    $_SESSION['user'][$userData['id']]=(array)$objUser;
                    echo "User Registered...";
                    header("location: chatroom.php");
                } else {
                    echo "Faild..";
                }
            }
        }
        ?>
        <div class="container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Name:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter name" name="name">
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </body>
</html>
