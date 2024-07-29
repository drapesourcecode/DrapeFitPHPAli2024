<?php
class DbConnect{
    private $host = "localhost";
    private $dbName = "websocket";
    private $user = "root";
    private $pass = "";
    
    public function connect(){
        try{
           $conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo "DataBase ERROR: ". $e->getMessage();
        }
    }
    
}


?>

<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "webscoket";
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "INSERT INTO users (id, email, name,last_login,login_status)
//    VALUES (null,  'john@example.com','Doe','2018-11-12 12:20:11',1)";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "New record created successfully";
//    }
//catch(PDOException $e)
//    {
//    echo $sql . "<br>" . $e->getMessage();
//    }
//
//$conn = null;
?>