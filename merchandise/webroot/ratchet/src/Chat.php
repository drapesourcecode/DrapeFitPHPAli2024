<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
//require "../db/users.php";

class Chat implements MessageComponentInterface {
    protected $clients;
    private $conn;
    public function __construct() {
        global $conn, $docRoot;
        $this->clients = new \SplObjectStorage;
        $this->conn = $conn;
        $this->root = $docRoot;
         echo "Server Started.";
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        $id = $conn->resourceId;
        $conn->broadcastId = 12;//static
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        //echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n" , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');
       //$link = mysqli_connect("localhost", "root", "", "websocket");
       //$sql="insert into chat_msg set `chat_text`='hello',`created`='1',`user_id`=>'1'";
       //mysqli_query($link, $sql);
        
        


        //-----------------End-----/
        foreach ($this->clients as $client) {
           // if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg); // predefine

                //$client->send(json_encode($data)); //custom
           // } //condition for same user message to same person
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
