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

        <div class="container">
            <div class="row">   
            

                <div class="col-md-8">
                    <div id="message">
                        <table id="chats" class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="4" scope="col"><strong>Chat Room</strong></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>		
                    </div>
                    <form id="chat-room-frm" method="post" action="">
                        <div class="form-group">
                            <textarea class="form-control" id="msg" name="msg" placeholder="Enter Message.."></textarea>

                        </div>
                        <div class="form-group">
                            <button type="button" class="form-control btn btn-success" id="send" name="send"> Send</button>

                        </div>

                    </form>

                </div>

            </div>
        </div>

    </body>

    <script type="text/javascript">
        $(document).ready(function () {
            var conn = new WebSocket('ws://drapefit.com:8081');
            conn.onopen = function (e) {
                console.log("Connection established!");
            };

            conn.onmessage = function (e) {
                console.log(e.data);

                var data = JSON.parse(e.data);
                var row = '<tr><td valign="top"><div><strong>' + data.userId + '</strong></div><div>' + data.msg + '</div></td><td align="right" valign="top"></td></tr>';
                $('#chats > tbody').append(row);
            };

            $('#send').click(function () {
                var userId = $('#userId').val();
                var msg = $('#msg').val();
                var data = {
                    userId: userId,
                    msg: msg,
                };
                conn.send(JSON.stringify(data));
            });
        });
    </script>
</html>
