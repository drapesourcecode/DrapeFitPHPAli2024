

<style type="text/css">
    #message{
        height:340px;
        overflow-y: scroll;
    }
    .chart-support{ float: left; width: 100%;}
    .chart-support h3 {
        font-size: 20px;
        font-weight: bold;
        color: #111111;
        /* font-family: 'Dancing Script', cursive; */
        margin-bottom: 17px;
    }
    .chart-support form{ float: left; width: 100%; position: relative;}
    .chart-support form input[type="text"] {
        width: 100%;
        border: 1px solid #ccc;
        color: #000;
        font-size: 16px;
        padding: 12px 80px 12px 15px;
        border-radius: 5px;
    }
    .chart-support form input[type="text"]::placeholder{ color: #000;}
    .chart-support form input[type="submit"] {
        position: absolute;
        background: #d64ade;
        color: #fff;
        text-transform: uppercase;
        font-weight: bold;
        border: 1px solid #d64ade;
        right: 0;
        top: 0;
        height: 100%;
        padding: 0 25px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    .chart-support .contact-need {
        float: left;
        width: 100%;
        background: #eaeaea;
        border: 1px solid #cccc;
        padding: 0 15px 25px;
        text-align: center;
        margin-top: 31px;
    }
    .contact-need ul{
        float: left;
        width: 100%;
    }
    .contact-need ul li{
        display: inline-block;
    }
    .contact-need ul li a {
        display: inline-block;
        background: #111111;
        padding: 8px 21px;
        font-size: 15px;
        /* font-weight: bold; */
        color: #b9b9b9;
        border-radius: 22px;
        margin: 0;
    }
    .contact-need ul li a:hover{
        background: #d64ade;
        color: #111111;
    }
    .live-chat-top {
        float: left;
        width: 100%;
        background: #000;
        color: #fff;
        padding: 3px 15px 7px;
    }
    .live-chat-top span{
        float: right;
    }
    .live-chat-top span a{
        color: #fff;
        display: inline-block;
        margin: 0 4px;
    }

    .about-sectio-box{ float: left; width: 100%;}
    .about-sectio-box h4 {
        font-size: 21px;
        color: #d64ade;
        font-weight: bold;
        padding-bottom: 10px;
    }
    .about-sectio-box h4:after {
        content: "";
        position: absolute;
        height: 3px;
        width: 55px;
        background: #d64ade;
        left: 15px;
        top: 46px;
    }
    .about-sectio-box ul{
        float: left;
        width: 100%;
    }
    .about-sectio-box ul li {
        display: inline-block;
        width: 100%;
        border-bottom:1px solid #e6e2e2;
    }
    .about-sectio-box ul li:last-child{ border:none;}
    .about-sectio-box ul li a {
        font-size: 15px;
        color: #5a5a5a;
        padding: 11px 0;
        display: inline-block;
    }
    .about-sectio-box ul li a:hover{ color: #d64ade;}
    .live-chat{ 
        background: #000;
        position: fixed;
        bottom: 0;
        right: 0;
    }
    .live-chat {

        background: #fff;
        position: fixed;
        bottom: 0;
        right: 0;
        border: 1px solid #ccc;
        width: 300px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        z-index: 11111;
        overflow: hidden;
        margin-bottom: 0px;
        transition: 500ms all ease-in-out 0s;

    }
    .live-chat a.live-chat-top {
        background: #111111;
        padding: 4px 15px;
        color: #fff;
        font-size: 14px;
        display: inline-block;
        width: 101%;
        position: relative;
        /* top: -1px; */
        /* left: -1px; */
        font-weight: bold;
        letter-spacing: 0.5px;
    }
    .live-chat a .fa-angle-down {
        float: right;
        margin-top: 4px;
    }

    .chat-footer {
        float: left;
        width: 100%;
        padding: 4px 9px;
        border-top: 1px solid #ccc;
    }
    .chat-footer input[type="text"] {
        border: none;
        width: 100%;
        color: #909090;
        font-size: 13px;
        padding: 5px 39px 5px 10px;
    }
    .chat-footer input[type="text"]:focus{
        outline: none;
    }
    .chat-footer input[type="text"]::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: pink;
    }
    .chat-footer input[type="text"]::-moz-placeholder { /* Firefox 19+ */
        color: pink;
    }
    .chat-footer input[type="text"]:-ms-input-placeholder { /* IE 10+ */
        color: pink;
    }
    .chat-footer input[type="text"]:-moz-placeholder { /* Firefox 18- */
        color: pink;
    }
    .add-file-icon2 {
        position: relative;
        overflow: hidden;
        display: inline-block;
        float: left;
        text-align: center;
        width: auto;
        margin-top: 0;
        margin-left: 0;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
    .chat-icon-box{ float: left; width: 100%;}
    .chat-icon-box ul{ float: left;}
    .chat-icon-box ul li {
        display: inline-block;
        vertical-align: top;
    }
    .chat-footer button {
        float: right;
        line-height: 0;
        width: 10%;
        margin-top: -37px;
        margin-right: 8px;
    }

    .chat-icon-box ul li a {
        color: #676767;
        padding: 0 3px;
        cursor: pointer;
    }
    .chat-icon-box {
        float: left;
        width: 100%;
        padding-top: 6px;
    }
    .chat-icon-box ul li label{ margin-bottom: 0;}
    #photos_clearing {
        max-width: 100px;
        overflow-x: scroll;
        min-width: 100%;
        overflow-y: hidden;
        /*display: none;*/
        white-space: nowrap;
    }
    #photos_clearing li {
        display: inline-block;
        width: 45px;
        height: 30px;
        overflow: hidden;
        margin: 0 5px;
        position: relative;
    }
    #photos_clearing li img{ width: 100%;}
    #photos_clearing li .remove {
        position: absolute;
        right: 2px;
        top: -3px;
        color: red;
    }

    #message {
        height: 40vh;
    }
    .chat-box{
        float: left;
        width: 100%;
        height: 100%;
    }
    .for-height {
        /* height: 69vh !important;*/
    }
.live-chat .chat-box{
        max-height: 600px;
        transition: 500ms all ease-in-out 0s;
    }
    .live-chat.blue1 {
        margin-bottom: 0;
    }
    .live-chat.blue1 .chat-box{
        max-height: 0px;
        transition: 500ms all ease-in-out 0s;
    }
    @media screen and (max-width: 1199px) {
    .live-chat .chat-box{
        max-height: 600px;
        transition: 500ms all ease-in-out 0s;
    }
    .live-chat.blue1 {
        margin-bottom: 0;
    }
    .live-chat.blue1 .chat-box{
        max-height: 0px;
        transition: 500ms all ease-in-out 0s;
    }
}
    @media screen and (max-width: 767px) {
        #message {
            height: 43vh;
        }
        .for-height {
            height: 58vh !important;
        }
       
    }
    .add-camera-icon2{ position: relative; height: 15px; width: 20px;}
    .add-camera-icon2 #came{
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
    }
    #main-emo-popup{
        display: block;

        position: absolute;

        top: -47px;

        width: 100%;

        left: 0;

        min-height: 50px;

        overflow-y: scroll;
    }
    #main-emo-popup .emo-area li {
        display: inline-block;
        width: 20px;
    }
    #main-emo-popup .emo-area li a {
        display: inline-block;
    }
    #main-emo-popup .emo-area li a img {
        width: 100%;
    }
    .chat-footer{ position: relative;}
    #remove{
        position: absolute;
        font-size: 12px;
        right: 0;
        color: red;
    }
    .chat-icon-box ul li:first-child,.chat-icon-box ul li:nth-child{
        width: 30px;
        overflow: hidden;
    }
</style>
<style>
    .come:after{  position: absolute;  height: 11px; width: 16px; background: #d2d6de;transform: rotate(53deg); content: "";left: -7px;top: 9px; }
    .send-go:after{ position: absolute; height: 12px; width: 11px;background: #ef6905;transform: rotate(36deg); content: "";right: -5px;top: 8px;}
    .table > tbody > tr > td{ border: none;}
</style>  
<?php if ($this->request->session()->read('MINUS') == '1') { ?>
    <div class="live-chat" id="btn1" href="javascript:void(0)" <?php if($this->request->session()->read('Auth.User.id')){ ?> style="display:block" <?php } else {?> style="display:none;" <?php } ?>>
    <?php } else { ?>  
        
        
        
        <div class="live-chat blue1" id="btn1" href="javascript:void(0)" <?php if($this->request->session()->read('Auth.User.id')){ ?> style="display:block" <?php } else {?> style="display:none;" <?php } ?> >
        <?php } ?>



        <div class="live-chat-top" onclick="togglemargin()">

            What can we help with? 
            <span> 
                <a onclick="getMinus()" href="javascript:void(0)"> <i class="fa fa-minus"></i> </a> 
                <!--<a  href="<?php echo HTTP_ROOT . 'users/chat_button_close' ?>"> <i class="fa fa-times"></i> </a>--> 

                <a id ="chat-DIV" href="javascript:void(0)"> <i class="fa fa-times"></i> </a> 
            </span>
        </div>




        <div class="chat-box"  style="position: relative;float: left;width: 100%; height: 100%;">
            <div id="online-msg">
                <table style="width:100%;text-align: center;">
                    <thead>
                        <tr >
                            <th colspan="4" scope="col" style="text-align: center;"><strong id='chatRoom-<?php echo $userId; ?>'>Now online</strong></th>
                        </tr>

                    </thead>
                </table>
                <div id="message" class="msg_container_base" style="border-bottom:1px solid #ddd;">
                    <table id="chats-<?php echo $userId; ?>" class="table table-striped">
                        <tbody></tbody>
                    </table>    
                </div>
                <div class="chat-footer"><span id="pic_msg"></span><ul id="photos_clearing" class="clearing-thumbs" data-clearing></ul>
                    <span id="typigng-<?php echo $userId; ?>" style="position: absolute;left:10px; top:0"></span>
                    <input type="text" class="form-control pm_textbox msg" id="msg-<?php echo $userId; ?>" name="msg" placeholder="Enter Message.." style="width: 100%;max-width: 100%;float: none;display: inline-block;border:0px;outline:0px;box-shadow:none !important;"></input>

                    <div class="emo-popup" id="main-emo-popup" style="display: none;">
                        <ul class="emo-area">
                            <?php foreach ($getEmoticons as $getEmoticon) { ?>
                                <li><a href="javascript:;" onclick="insertEmoctions('<?php echo $getEmoticon->shortcut; ?>', 'msg-<?php echo $userId; ?>')" id="smile" ><img id="insert_smile"  src="<?php echo $getEmoticon->image_url ?>" title=":<?php echo $getEmoticon->shortcut; ?>"/></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="chat-icon-box">

                        <ul>
                            <li>
                                <div class="add-file-icon2 upload-btn-wrapper">
                                    <label for='photos'><a href="#"><i class="fa fa-paperclip" style="outline:0px;"></i></a></label>
                                    <input type="file" id="photos" name="photos[]" multiple/>
                                </div>
                            </li>

                            <li>
                                <div class="add-camera-icon2">
                                    <label for='came'><a href="#"><i class="fa fa-camera" style="outline:0px;"></i></a></label>
                                    <input type="file" id="came" name="came[]" capture="camera" accept="image/*" multiple/>

                                </div>
                            </li>
                            <li>
                                <div class="add-camera-icon2">
                                    <label for='came'> <a style="text-decoration: none;" href="javascript:;" title="Emotions" onclick="$('#main-emo-popup').toggle();"  ><img style="margin-right: 20px; width: 17px; position: relative; top: -2px;" src="<?php echo HTTP_ROOT; ?>/img/emo-icon.png"></a></label>


                                </div>
                            </li>
                        </ul>


                        <button type="button"  id="send-<?php echo $userId; ?>" name="send" class="send"> <i class="fa fa-paper-plane" style="color:#242f3f;font-size:15px;transform: rotate(30deg);"></i>
                        </button>
                    </div>

                </div>
            </div>

            <!--        offline message div start here -->
            <div id="offline-msg">
                <div>
                    <table class="table table-striped" height="200">
                        <thead>
                            <tr>
                                <th colspan="4" scope="col"><strong>We says to sorry, we are closed now and available between 8 AM to 5 PM CST.</strong></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>    
                </div>
            </div>
            <!--        offline div end here-->

        </div>
    </div>
        

    <input type="hidden" id='userId' value="<?php echo $userId; ?>"/>
    <input type="hidden" id='userName' value="<?php echo $userName; ?>"/>
    <input type="hidden" id='myfile-recent' value=""/>
    <img id='loading' src='<?php echo HTTP_ROOT ?>loading.gif' style='visibility: hidden;'>
    <script>
        function showLoading() {
            document.getElementById("loading").style = "visibility: visible";
        }
        function hideLoading() {
            document.getElementById("loading").style = "visibility: hidden";
        }
    </script>
    <script type="text/javascript">
        var conn;
        function init() {
            conn = new WebSocket('<?php echo WS_URL; ?>');
            conn.onopen = function (ev) {

            }

        }
        $(document).ready(function () {

            function showUploadedItem(source) {
                var list = document.getElementById("photos_clearing"),
                        li = document.createElement("li"),
                        img = document.createElement("img");
                img.src = source;
                li.appendChild(img);
                list.appendChild(li);
            }

            var ImgArr = [];
            var Imgname = [];

            $('#photos').on('change', function (e) {
                $('#pic_msg').html("Loading your files...");
                var input = document.getElementById("photos"),
                        formdata = false;

                if (window.FormData) {
                    formdata = new FormData();
                }


                var i = 0, len = this.files.length, img, reader, file;
                //console.log(len);
                for (; i < len; i++) {
                    file = this.files[i];

                    if (!!file.type.match(/image.*/)) {
                        if (formdata) {
                            formdata.append("photos", file);
                            //console.log(formdata);
                        }

                        if (formdata) {

                            $.ajax({
                                url: '<?= HTTP_ROOT; ?>' + 'users/chat_fils_upload',
                                type: "POST",
                                data: formdata,
                                processData: false,
                                contentType: false,
                                success: function (res) {
                                    $('#pic_msg').html("");
                                    $('#message').addClass("for-height");
                                    showUploadedItem(JSON.parse(res).imgurl);
                                    ImgArr.push(JSON.parse(res).imgurl);
                                    Imgname.push(JSON.parse(res).imgname);
                                    //console.log(JSON.parse(res).imgurl);
                                    $('.msg').focus();
                                }
                            });

                        }
                    }
                }
            });

            $('#came').on('change', function (e) {
                $('#pic_msg').html("Loading your files...");
                var input = document.getElementById("came"),
                        formdata = false;

                if (window.FormData) {
                    formdata = new FormData();
                }


                var i = 0, len = this.files.length, img, reader, file;
                //console.log(len);
                for (; i < len; i++) {
                    file = this.files[i];

                    if (!!file.type.match(/image.*/)) {
                        if (formdata) {
                            formdata.append("photos", file);
                            //console.log(formdata);
                        }

                        if (formdata) {

                            $.ajax({
                                url: '<?= HTTP_ROOT; ?>' + 'users/chat_fils_upload',
                                type: "POST",
                                data: formdata,
                                processData: false,
                                contentType: false,
                                success: function (res) {
                                    $('#pic_msg').html("");
                                    $('#message').addClass("for-height");
                                    showUploadedItem(JSON.parse(res).imgurl);
                                    ImgArr.push(JSON.parse(res).imgurl);
                                    Imgname.push(JSON.parse(res).imgname);
                                    //console.log(JSON.parse(res).imgurl);
                                    $('.msg').focus();
                                }
                            });

                        }
                    }
                }
            });

            init();
            conn.onmessage = function (e) {
                var userId = $('#userId').val();
                var userName = $('#userName').val();
                var files = $('#myfile-recent').val();
                var URL = '<?= HTTP_ROOT; ?>';
                var data = JSON.parse(e.data);
                //            alert(data);
                var clientId = data.clientId;
                //alert(data.type);
                if (userName != data.userName) {
                    $('#chatRoom-' + clientId).html(data.userName + ' now  is Online');
                }


                if (userId == data.userId) {
                    if (data.type == 'open') {
                        $('#btn1').addClass('blue1');
                        // pastMessage();
                        check_cst_time();

                    }


                    if (data.type == "chat") {
                        var mydata = {userId: userId, userName: userName, reciveId: "admin", chat_message: data.msg, chat_type: 1, files: files};
                        $.ajax({
                            type: "POST",
                            url: '<?php echo HTTP_ROOT . 'users/websocket_message' ?>',
                            data: mydata,
                            dataType: 'json',

                        });
                    }

                }



                if (data.type == "chat") {

                    if (data.msg) {
                        data.msg = parseEmotions(data.msg);


                    }
                    if (userId == data.userId) {
                        var row = '<tr><td valign="top" style="widht:100%;"><div class="send-go" style="float: right;text-align: left;width: 90%;font-size:12px;color: #fff;background: #ef6905;padding: 5px 10px;border-radius: 4px;position: relative;">' + data.msg + '</div><span style="float: right;text-align: right;width: 90%;font-size:9px !important;">' + data.timeChat + '</span></td>\n\</tr>';
                    } else {

                        var row = '<tr><td valign="top" style="widht:100%;"><div style="float: left; width: 65px; text-transform: capitalize;"><strong>' + data.userName + ':</strong></div><div class="come" style="float: left;font-style: italic;width: 73%;font-size: 12px;color: #535353;background: #d2d6de;padding: 5px 10px;position: relative;border-radius: 4px;">' + data.msg + '</div><span style="float: right;text-align: left;width: 90%;font-size:9px !important; " >' + data.timeChat + '</span></td>\n\</tr>';
                    }

                    $('#chats-' + clientId + ' > tbody').append(row);


                    $('#msg-' + clientId).val('');
                    $('#msg-' + clientId).focus();


                    $(".msg_container_base").stop().animate({scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);

                } else if (data.type == "writing") {
                    if (userId != data.userId) {
                        if (data.value == 0) {
                            $('#typigng-' + clientId).hide().html('<i>' + data.userName + " typeing...</i>").fadeIn('slow');
                        }
                        if (data.value == 200000) {
                            $('#typigng-' + clientId).hide().html(" ").fadeIn('slow');
                        }
                    }
                }
            }



            $('.send').click(function () {
                $('#message').toggleClass("for-height");
                var userId = $('#userId').val();
                var userName = $('#userName').val();
                var msg = $('#msg-' + userId).val();
                var img = ImgArr;
                var file = $('#photos');

                var URL = '<?= HTTP_ROOT; ?>';
                var imgName;
                var msg1 = '';
                var complete = 0;
                var msgSt = "";

                if (img.length != '') {

                    //alert(img.length);
                    for (var j = 0; j < img.length; j++) {
                        //console.log(j);
                        if (img.length - 1 == j) {
                            complete = 1;
                            msgSt = msg;
                        }
                        var ext = ImgArr[j].split('.');
                        if (ImgArr[j]) {
                            if (ext[ext.length - 1] == 'png' || ext[ext.length - 1] == 'jpeg' || ext[ext.length - 1] == 'JPG' || ext[ext.length - 1] == 'gif' || ext[ext.length - 1] == 'jpg') {
                                msg1 = Imgname[j] + " <br>" + '<img src="' + ImgArr[j] + '" height="90" width="90"><a href="' + ImgArr[j] + '" download height="90" width="90" style="position: absolute;left: 11px;top: 60px;">' + '<i class="fa fa-download" aria-hidden="true" style="color: #fff;background-color: #3b333380;padding: 10px;"></i>' + '</a>';
                            } else {
                                msg1 = Imgname[j] + '<a href="' + ImgArr[j] + '" download height="90" width="90" style="position: absolute;left: 11px;top: 60px;">' + '<i class="fa fa-download" aria-hidden="true" style="color: #fff;background-color: #3b333380;padding: 10px;"></i>' + '</a>';
                            }

                            var data = {
                                userId: userId,
                                userName: userName,
                                msg: msg1,
                                type: 'chat',
                                timeChat: new Date().toLocaleTimeString(),
                                clientId: userId,
                                doc: ImgArr[j]
                            };

                            if (msg1 != '') {
                                conn.send(JSON.stringify(data));
                                if (complete == 1) {
                                    $("#photos_clearing").empty();
                                    ImgArr = [];
                                    Imgname = [];

                                    if (msgSt != '') {
                                        var data = {
                                            userId: userId,
                                            userName: userName,
                                            msg: msgSt,
                                            type: 'chat',
                                            timeChat: new Date().toLocaleTimeString(),
                                            clientId: userId,
                                            doc: ""
                                        };
                                        conn.send(JSON.stringify(data));
                                    }
                                }
                            }
                        }


                    }






                    var img = $('#myfile-recent').val();
                } else {
                    var data = {
                        userId: userId,
                        userName: userName,
                        msg: msg,
                        type: 'chat',
                        timeChat: new Date().toLocaleTimeString(),
                        clientId: userId,
                        doc: img
                    };
                    if (msg != '') {
                        conn.send(JSON.stringify(data));
                        //                    alert(data);
                    }
                }





            }
            );

            $('.msg').keypress(function (e) {
                var key = e.which;
                if (key == 13) {


                    $('.send').click();
                }
            });
        });

        function typing(searchTimeout) {

            var userId = $('#userId').val();
            var userName = $('#userName').val();
            var isTypingMsg = {
                type: 'writing',
                value: searchTimeout,
                userId: userId,
                userName: userName,
                clientId: userId

            };
            if (searchTimeout == 0) {
                conn.send(JSON.stringify(isTypingMsg));
            }
            if (searchTimeout == 200000) {
                conn.send(JSON.stringify(isTypingMsg));
            }
        }

        var searchTimeout = 0

        $(document).on('keypress', '.msg', function (e) {
            if (searchTimeout == 0) {
                typing(searchTimeout);
                searchTimeout = 2;
            }

        });

        $(document).on('blur', '.msg', function (e) {
            typing(200000);
            searchTimeout = 0;
        });

    </script>
    <script type="text/javascript">

        function togglemargin() {
            var myButtonClasses = document.getElementById("btn1").classList;

            if (myButtonClasses.contains("blue1")) {
                myButtonClasses.remove("blue1");
            } else {
                myButtonClasses.add("blue1");
                startInterval();
            }
        }

    </script>
    <script>
        $(document).ready(function () {
            pastMessage();
        });

        function pastMessage() {
            check_cst_time();
            var userId = $('#userId').val();
            var userName = $('#userName').val();
            var clientId = userId;
            $.ajax({
                type: "POST",
                url: '<?php echo HTTP_ROOT . 'users/websocket_past_message' ?>',
                success: function (data) {
                    var i;
                    for (i = 0; i <= data.msg.length; i++) {
                        //console.log(data.msg);
                        if (data.msg[i].chat_message) {
                            data.msg[i].chat_message = parseEmotions(data.msg[i].chat_message);


                        }
                        if (userId == data.msg[i].user_id) {
                            var row = '<tr><td valign="top" style="widht:100%;"><div class="send-go" style="float: right;text-align: left;width: 90%;font-size: 13px;color: #fff;background: #ef6905;padding: 7px 12px;border-radius: 4px;position: relative;">' + data.msg[i].chat_message + '</div><span style="font-size:9px !important;float: left;text-align: right;width: 90%;">' + data.time[i] + '</span></td>\n\</tr>';
                        } else {

                            var row = '<tr><td valign="top" style="widht:100%;"><div style="float: left; width: 65px; text-transform: capitalize;"><strong>' + data.msg[i].user.name + ':</strong></div><div class="come" style="float: left;font-style: italic;width: 73%;font-size: 13px;color: #535353;background: #d2d6de;padding: 8px 9px;position: relative;border-radius: 4px;">' + data.msg[i].chat_message + '</div><span style="font-size:9px !important;,float: left;text-align: left;width: 90%;" >' + data.time[i] + '</span></td>\n\</tr>';
                        }

                        $('#chats-' + clientId + ' > tbody').append(row);
                        $(".msg_container_base").stop().animate({scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);
                    }
                },
                dataType: 'json'

            });

        }

        function check_cst_time() {
            $.ajax({
                type: "POST",
                url: '<?php echo HTTP_ROOT . 'users/check_cst_time' ?>',
                dataType: 'json',
                success: function (data) {
                    if (data == 1) {
                        // $('#offline-msg').show();
                        // $('#online-msg').hide();
                        document.getElementById("online-msg").style.display = "none";
                        document.getElementById("offline-msg").style.display = "block";

                    } else {
                        // $('#offline-msg').hide();
                        // $('#online-msg').show();
                        document.getElementById("offline-msg").style.display = "none";
                        document.getElementById("online-msg").style.display = "block";
                    }
                },
            });
        }

        function startInterval() {

            setInterval(function () {
                var userId = $('#userId').val();
                var userName = $('#userName').val();
                var data = {
                    userId: userId,
                    userName: userName,
                    msg: '',
                    type: 'open',
                    timeChat: new Date().toLocaleTimeString(),
                    clientId: userId
                };
                conn.send(JSON.stringify(data));
                check_cst_time();
            }, 100000);
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

        function getMinus() {

            var exitClassCheck = $('#btn1').hasClass('blue1');
            if (exitClassCheck == true) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo HTTP_ROOT . 'users/websocket_div_minaus' ?>',
                    data: {value: 1},
                    dataType: 'json',

                });
            } else {
                $.ajax({
                    type: "POST",
                    url: '<?php echo HTTP_ROOT . 'users/websocket_div_minaus' ?>',
                    data: {value: 2},
                    dataType: 'json',

                });
            }


        }



        $('#chat-DIV').click(function () {
            var pageurl = '<?php echo HTTP_ROOT ?>';
            $.ajax({
                type: 'POST',
                url: pageurl + 'users/chat_button_close',
                success: function (response) {
                    if (response.status == 'success') {
                        $('#chat-button').show();
                        $('#chat-div').hide();


                    }
                },

                dataType: 'json'
            });
        });

    </script>


