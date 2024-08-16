<style>
    .msg_container_base{
        margin: 0;
        padding: 0 10px 10px;
        max-height:100vh;
        overflow-x:hidden;
    }
    #message {
        height: 270px;
        overflow: scroll;
    }
    div.main-emo-popup {
        float: left;
        width: 100%;
        position: absolute;
        z-index: 1;
        bottom: 74px;
        padding: 0 10px;
    }
    ul.emo-area {
        float: left;
        width: 100%;
        padding: 0;
        height: 40px;
        overflow-y: scroll;
    }
    ul.emo-area li {
        display: inline-block;
        width: 17px;
    }
    ul.emo-area li img {
        width: 100%;
    }
    .box-footer span.input-group-btn{
        top: 15px;
    }
    .direct-chat-box {
    width: 23%;
    margin-left: 15px;
    float: none;
    display: inline-block;
    text-align: left;
    z-index: 1111111;
    vertical-align: bottom;
    border-block-start: unset;
    margin-bottom: 5px;

}
    .direct-main-box{
        text-align: right;
    }
    .content-wrapper{
        position: relative;
    }
</style>
<style>
    body{
        position: relative;
    }
.chat-content {
    position: fixed !important;
    bottom: 0 !important;
    right: 0;
    z-index: 11111;
    width: 83%;
    white-space: nowrap;
    min-height: 80px;
    overflow-y: scroll;

}
.direct-main-box {
    text-align: right;
    float: left;
    width: 83%;
    height: auto;
    position: fixed;
    bottom: 0;
    white-space: nowrap;
    overflow-y: scroll;
    clear: none;

}
    </style>
    <section class="content chat-content">
        <div class="row direct-main-box">
            <?php
            if ($usersDetailsCount >= 1) {
                foreach (@$usersDetails as $detail) {
                    ?>

                    <!-- DIRECT CHAT PRIMARY -->
                    <div  class="box box-primary direct-chat  direct-chat-primary direct-chat-box 
                    <?php if ($this->request->session()->read('div' . $detail->id) == 'min') { ?> 
                              collapsed-box
                          <?php } ?>
                          "  id="message-<?php echo $detail->id; ?>">

                        <div class="box-header with-border">
                            <h3 class="box-title" id="client_name<?php echo $detail->id; ?>"><a target="_blank" href="<?php echo HTTP_ROOT . 'appadmins/single_direct_chat/' . $detail->id; ?>"><?php echo $detail->name; ?></a></h3>
                            <div class="box-tools pull-right">                            
                                <button data-id="<?php echo $detail->id; ?>" class="btn btn-box-tool direct-chatx" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button> 
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages msg_container_base"  >
                                <table  class="table table-striped" id="chats-<?php echo $detail->id; ?>">
                                    <tbody> </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="emo-popup main-emo-popup" id="main-emo-popup-<?php echo $detail->id; ?>" style="display: none;">
                            <ul class="emo-area">
                                <?php foreach ($getEmoticons as $getEmoticon) { ?>
                                    <li><a href="javascript:;" onclick="insertEmoctions('<?php echo $getEmoticon->shortcut; ?>', 'msg-<?php echo $detail->id; ?>')" id="smile" ><img   src="<?php echo $getEmoticon->image_url ?>" title=":<?php echo $getEmoticon->shortcut; ?>"/></a></li>
                                <?php } ?>
                            </ul>
                        </div>






                        <div class="box-footer" style="position: relative; display: none;">

                            <span id="typigng-<?php echo $detail->id; ?>"style="position: absolute;left:10px; top:0"></span>
                                <div class="input-group" style="padding-top: 13px">

                                    <div class="add-camera-icon2">
                                        <label for='came'> 
                                            <a style="text-decoration: none;" href="javascript:;" title="Emotions" onclick="$('#main-emo-popup-<?php echo $detail->id; ?>').toggle();"  ><img style="margin-right: 20px" src="<?php echo HTTP_ROOT; ?>/img/emo-icon.png"></a></label>


                                    </div>



                                    <input data-user-id="<?php echo $detail->id; ?>" type="text" autocomplete="off" name="message" id="msg-<?php echo $detail->id; ?>"  placeholder="Type Message ..." class="form-control msg">
                                    <span class="input-group-btn">  
                                        <span type="button" data-user-name="<?php echo $detail->name; ?>" data-user-id="<?php echo $detail->id; ?>"  id="send-<?php echo $detail->id; ?>" name="send" class="send btn btn-primary btn-flat">Send</span>
                                    </span>
                                </div>

                            </div><!-- /.box-footer-->
                        </div><!--/.direct-chat -->




                    <?php } ?>
                <?php } ?>

                <input type="hidden" id='userId' value="<?php echo $id; ?>"/>
                <input type="hidden" id='userName' value="<?php echo $userName; ?>"/>



            </div>

        </section>


        <script type="text/javascript">
            var conn;
            function init() {
                conn = new WebSocket('<?php echo WS_URL; ?>');
                conn.onopen = function (ev) { // connection is open             
                    pastMessage();
                    startOnline();


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
                    //alert(data.type);
                    if (data.msg) {
                        data.msg = parseEmotions(data.msg);
                    }
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

                        var row = '<div class="direct-chat-msg right"><div class="direct-chat-info clearfix"></div> <img class="direct-chat-img" src="<?php echo HTTP_ROOT ?>img/dist/img/user3-128x128.jpg" alt="message user image"> <div class="direct-chat-text">' + data.msg + '</div><span style="float: left;text-align: right;width: 90%;">' + data.timeChat + '</span></div>';
                    } else {
                        var row = '<div class="direct-chat-msg"><div class="direct-chat-info clearfix"></div><img class="direct-chat-img" src="<?php echo HTTP_ROOT ?>img/dist/img/user1-128x128.jpg" alt="message user image"><div class="direct-chat-text">' + data.msg + '</div><span style="float: left;text-align: left;width: 90%;" >' + data.timeChat + '</span></div>';

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
                        $(".msg_container_base").stop().animate({scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);
                        $('#msg-' + clientId).val('');
                        $('#msg-' + clientId).focus();

                    }
                };

                conn.onclose = function (ev) {
                    offline();

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
                    timeChat: new Date().toLocaleTimeString(),
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

            function pastMessage() {
                var userId = $('#userId').val();
                var userName = $('#userName').val();

                $.ajax({
                    type: "POST",
                    url: '<?php echo HTTP_ROOT . 'users/websocket_past_message' ?>',
                    success: function (data) {
                        var i;
                        for (i = 0; i <= data.msg.length; i++) {


                            if (userId == data.msg[i].user_id || userId == data.msg[i].recive_id) {
                                // console.log(data.msg[i]);
                                if (data.msg[i].chat_message) {
                                    data.msg[i].chat_message = parseEmotions(data.msg[i].chat_message);
                                }
                                if (data.msg[i].chat_type == 2) {

                                    console.log(clientId + 'd-2');
                                    var clientId = data.msg[i].recive_id;
                                    var row = '<div class="direct-chat-msg right"><div class="direct-chat-info clearfix"></div> <img class="direct-chat-img" src="<?php echo HTTP_ROOT ?>img/dist/img/user3-128x128.jpg" alt="message user image"> <div class="direct-chat-text">' + data.msg[i].chat_message + '</div><span style="float: left;text-align: right;width: 90%;">' + data.time[i] + '</span></div>';
                                    $('#chats-' + clientId + ' > tbody').append(row);
                                    $(".msg_container_base").stop().animate({scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);
                                } else {

                                    var clientId = data.msg[i].user_id;
                                    console.log(clientId + 'd-1');
                                    var row = '<div class="direct-chat-msg"><div class="direct-chat-info clearfix"></div><img class="direct-chat-img" src="<?php echo HTTP_ROOT ?>img/dist/img/user1-128x128.jpg" alt="message user image"><div class="direct-chat-text">' + data.msg[i].chat_message + '</div><span style="float: left;text-align: left;width: 90%;" >' + data.time[i] + '</span></div>';

                                    $('#chats-' + clientId + ' > tbody').append(row);
                                    $(".msg_container_base").stop().animate({scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);
                                }



                            }
                        }
                    },
                    dataType: 'json'

                });

            }

            function startOnline() {
                var userId = $('#userId').val();
                var mydata = {userId: userId};
                $.ajax({
                    type: "POST",
                    url: '<?php echo HTTP_ROOT . 'users/start_online' ?>',
                    data: mydata,
                    dataType: 'json',
                });
            }
            function offline() {

                var userId = $('#userId').val();
                var mydata = {userId: userId};
                $.ajax({
                    type: "POST",
                    url: '<?php echo HTTP_ROOT . 'users/start_online_offline' ?>',
                    data: mydata,
                    dataType: 'json',
                });
            }
            function insertEmoctions(shortcut, id) {
                if (id) {
                    $("#" + id).val($("#" + id).val() + " :" + shortcut).focus();
                    $(".emo-popup").hide();
                }
            }
            function parseEmotions(text) {
                //alert('j');
                var images = {
                    'question': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_question.png',
                    'love': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_love.png',
                    'tire': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_tire.png',
                    'smile2': 'https://cdn3.iconfinder.com/data/icons/fatcow/32x32_0400/emotion_smile.png',
                    'grin': 'https://cdn3.iconfinder.com/data/icons/fatcow/32x32_0400/emotion_grin.png',
                    'hitler': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_hitler.png',
                    'monkey': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_face_monkey.png',
                    'baby': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_baby.png',
                    'clown': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_clown.png',
                    'cool': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_cool.png',
                    'bubblegum': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_bubblegum.png',
                    'crazy': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_crazy.png',
                    'unshaven': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_unshaven.png',
                    'facepanda': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_face_panda.png',
                    'spy': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_spy.png',
                    'rabbit': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_crazy_rabbit.png',
                    'ninja': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_ninja.png',
                    'red': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_red.png',
                    'sleep2': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_sleep.png',
                    'cold': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_cold.png',
                    'stupid': 'https://cdn2.iconfinder.com/data/icons/fatcow/32x32/emotion_stupid.png',
                    'waii': 'https://cdn3.iconfinder.com/data/icons/fatcow/32/emotion_waii.png'

                };



                var myarray = text.split(' ');
                var imgv = '';
                for (var i = 0; i < myarray.length; i++) {
                    //alert(myarray[i]);
                    var spilvalue = myarray[i].split(':');
                    var img = spilvalue[1];

                    if (images[img]) {
                        imgv += '<img src=' + images[img] + '' + '>';
                    } else {
                        imgv += myarray[i];
                    }
                    imgv += ' ';
                }
                if (imgv) {
                    return imgv;
                } else {
                    return imgv;
                }
            }
            $('.direct-chatx').click(function () {
                var getId = $(this).attr('data-id');

                var exitClassCheck = $('#message-' + getId).hasClass('collapsed-box');
                if (exitClassCheck == true) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo HTTP_ROOT . 'users/websocket_div_minaus_admin' ?>',
                        data: {id: getId, div: 'max'},
                        dataType: 'json',

                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo HTTP_ROOT . 'users/websocket_div_minaus_admin' ?>',
                        data: {id: getId, div: 'min'},
                        dataType: 'json',

                    });
                }
            })

        </script>


