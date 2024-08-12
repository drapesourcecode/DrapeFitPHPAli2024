<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Welcome  Chat board</h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
           

                <div class="col-md-12" id="colmd-<?php echo $detail->id; ?>">
                    <!-- DIRECT CHAT PRIMARY -->

                    <div class="box box-primary direct-chat direct-chat-primary"  id="message-<?php echo $detail->id; ?>">
                        <div class="box-header with-border">
                            <h3 class="box-title" id="client_name<?php echo $detail->id; ?>"><?php echo $detail->name; ?></h3>
                            <div class="box-tools pull-right">                            
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" >
                                <table  class="table table-striped" id="chats-<?php echo $detail->id; ?>">
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box-footer" style="position: relative;">

                            <span id="typigng-<?php echo $detail->id; ?>"style="position: absolute;left:10px; top:0"></span>
                            <div class="input-group" style="padding-top: 13px">

                                <input data-user-id="<?php echo $detail->id; ?>" type="text" autocomplete="off" name="message" id="msg-<?php echo $detail->id; ?>"  placeholder="Type Message ..." class="form-control msg">
                                <span class="input-group-btn">  
                                    <span type="button" data-user-name="<?php echo $detail->name; ?>" data-user-id="<?php echo $detail->id; ?>"  id="send-<?php echo $detail->id; ?>" name="send" class="send btn btn-primary btn-flat">Send</span>
                                </span>
                            </div>

                        </div><!-- /.box-footer-->
                    </div><!--/.direct-chat -->
                </div>



           


            <input type="hidden" id='userId' value="<?php echo $userId; ?>"/>
            <input type="hidden" id='userName' value="<?php echo $userName; ?>"/>
            <script type="text/javascript">
                var conn;
                function init() {
                    conn = new WebSocket('ws://108.167.139.168:8081');
                    conn.onopen = function (ev) { // connection is open             
                        //Do Something
                    }

                }
                $(document).ready(function () {
                    init();
                    conn.onmessage = function (e) {
                        var userId = $('#userId').val();
                        var userName = $('#userName').val();
                        var data = JSON.parse(e.data);
                        var clientId = data.clientId;
                        $('#colmd-' + clientId).show();
                        $('#message-' + clientId).show();
                        //$('#message-'+clientId).removeClass('collapsed-box');

                        if (userId == data.userId) {
                            if (data.type == "chat") {
                                var mydata = {userId: userId, userName: userName, reciveId: clientId, chat_message: data.msg, chat_type: 2};
                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo HTTP_ROOT . 'users/websocket_message' ?>',
                                    data: mydata,
                                    dataType: 'json',

                                });
                            }

                        }







                        if (userId == data.userId) {
                            var row = '<div class="direct-chat-msg right"><div class="direct-chat-info clearfix"></div> <img class="direct-chat-img" src="<?php echo HTTP_ROOT ?>img/dist/img/user3-128x128.jpg" alt="message user image"> <div class="direct-chat-text">' + data.msg + '</div></div>';
                        } else {
                            var row = '<div class="direct-chat-msg"><div class="direct-chat-info clearfix"></div><img class="direct-chat-img" src="<?php echo HTTP_ROOT ?>img/dist/img/user1-128x128.jpg" alt="message user image"><div class="direct-chat-text">' + data.msg + '</div></div>';

                        }
                        //alert(data.type);
                        if (data.type == "writing" && userId != data.userId) {
                            if (data.value == 0) {
                                $('#typigng-' + clientId).hide().html('<i>' + data.userName + " typeing...</i>").fadeIn('slow');
                            }
                            if (data.value == 200000) {
                                $('#typigng-' + clientId).hide().html(" ").fadeIn('slow');
                            }


                        } else if (data.type == "chat") {
                            //alert(data.cliendId);

                            var clientId = data.clientId;
                            // console.log(clientId);
                            $('#chats-' + clientId + ' > tbody').append(row);
                            $('#msg-' + clientId).val('');
                            $('#msg-' + clientId).focus();
                        }
                    };
                });

                $('.send').click(function () {

                    var userId = $('#userId').val();
                    var userName = $('#userName').val();
                    var clintId = $(this).attr('data-user-id');

                    //alert(clintId);
                    var msg = $('#msg-' + clintId).val();
                    var data = {
                        userId: userId,
                        msg: msg,
                        userName: userName,
                        type: 'chat',
                        value: 1111,
                        clientId: clintId


                    };
                    if (msg != '') {
                        conn.send(JSON.stringify(data));
                    }
                });

                $('.msg').keypress(function (e) {
                    var key = e.which;
                    if (key == 13) {
                        var userId = $(this).attr('data-user-id');
                        $('.send').click();

                    }
                });


                function typing(searchTimeout, clintId) {

                    var userId = $('#userId').val();
                    var userName = $('#userName').val();
                    //var clintId = $(this).attr('data-user-id');
                    var isTypingMsg = {
                        type: 'writing',
                        value: searchTimeout,
                        userId: userId,
                        userName: userName,

                        cliendId: clintId
                    };
                    if (searchTimeout == 0) {
                        conn.send(JSON.stringify(isTypingMsg));
                    }
                    if (searchTimeout == 200000) {
                        conn.send(JSON.stringify(isTypingMsg));
                    }
                }
                var searchTimeout = 0;
                $(document).on('keypress', '.msg', function (e) {
                    var clintId = $(this).attr('data-user-id');
                    if (searchTimeout == 0) {
                        typing(searchTimeout, clintId);
                        searchTimeout = 2;
                    }

                });

                $(document).on('blur', '.msg', function (e) {
                    var clintId = $(this).attr('data-user-id');
                    typing(200000, clintId);
                    searchTimeout = 0;
                });

            </script>



        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

