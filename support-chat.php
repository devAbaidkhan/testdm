<!DOCTYPE html>
<html lang="en">

<head>

    <!-- include cssfiles -->
    <?php include 'includes/meta-tags.php'; ?>

    <!-- include cssfiles -->
    <?php include 'includes/csslinks.php'; ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.css"
        integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw=="
        crossorigin="anonymous" />

        <style>

.ans-main-wrapper{
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.ans-main-container{
    background-color: #fff;
}
.ans-main-row{
    display: flex;
}
 .ans-profile-image {
	 width: 50px;
	 height: 50px;
	 border-radius: 40px;
}

 .ans-input-filed {
	 border: none;
	 border-radius: 30px;
	 width: 80%;
}
 .ans-input-filed::placeholder {
	 color: #e3e3e3;
	 font-weight: 300;
	 margin-left: 20px;
}
 .ans-input-filed:focus {
	 outline: none;
}
 .ans-friend-drawer {
	 padding: 10px 15px;
	 display: flex;
	 vertical-align: baseline;
     justify-content: space-between;
	 background: #fff;
	 transition: 0.3s ease;
}
.ans-chat-header {
	 padding: 10px 15px;
	 background: #d8d7d7;
	 transition: 0.3s ease;
}
 .ans-friend-drawer--grey {
	 background: #4b2669;
     color: #fff;
}
 .ans-friend-drawer .ans-text {
	 margin-left: 12px;
	 width: 70%;
}
 .ans-friend-drawer .ans-text h6 {
	 margin-top: 6px;
	 margin-bottom: 0;
}
 .ans-friend-drawer .ans-text p {
	 margin: 0;
}
 .ans-friend-drawer .time {
	 color: grey;
}
 hr {
	 margin: 5px auto;
	 width: 60%;
}
 .ans-chat-bubble {
	 padding: 10px 14px;
	 background: #d8d7d7;
	 margin: 10px 30px;
	 border-radius: 9px;
	 position: relative;
	 animation: fadeIn 1s ease-in;
}
 .ans-chat-bubble:after {
	 content: '';
	 position: absolute;
	 top: 50%;
	 width: 0;
	 height: 0;
	 border: 20px solid transparent;
	 border-bottom: 0;
	 margin-top: -10px;
}
 .ans-chat-bubble--left:after {
	 left: 0;
	 border-right-color: #eee;
	 border-left: 0;
	 margin-left: -20px;
}
 .ans-chat-bubble--right:after {
	 right: 0;
	 border-left-color: #313131;
	 border-right: 0;
	 margin-right: -20px;
}
 @keyframes fadeIn {
	 0% {
		 opacity: 0;
	}
	 100% {
		 opacity: 1;
	}
}

.ans-chat-bubble--left{
     background-color: #d8d7d7;
     color: #333;
}
.ans-chat-bubble--right{
    background-color: #313131;
    color: #fff;
}
 .ans-chat-box-tray {
	 background: #d8d7d7;
	 display: flex;
	 align-items: baseline;
     justify-content: space-between;
	 padding: 10px 15px;
	 align-items: center;
	 margin-top: 19px;
	 bottom: 0;
}
.ans-input-filed{
    width: 100%;
    padding-left: 8px;
    padding: 6px 15px;
	 margin: 0 10px;

}
.ans-input-filed::placeholder{
    color: #4b2669;
}
@media(max-width:576px){
.ans-main-container{
    width: 90%;
}
}
.ans-back-arrow{
    margin-left: 18px;
}
.ans-chat-send-btn{
    padding: 8px;
    background: #4b2669;
    border-radius: 50px;
    color: #fff;
    font-size: 18px;
    text-align: center;
}
.ans-chat-panel{
    height: 500px;
    overflow: auto;
    overflow-x: hidden;
}
 </style>

</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>



<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script>
    const firebaseConfig = {
        apiKey: "AIzaSyBNn0rdU0nS21DFChR36VCGxSf6R7-Otzg",
        authDomain: "dedo-partner.firebaseapp.com",
        projectId: "dedo-partner",
        storageBucket: "dedo-partner.appspot.com",
        messagingSenderId: "502917211217",
        appId: "1:502917211217:web:fee919a237ca06be628470",
        measurementId: "G-900GSQDPB1"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    $(document).ready(function (){

        $('#form_send_msg').on('submit',function (e){
            e.preventDefault();
            let msg = $('#value_msg').val().trim()
            if(msg){
                $.ajax({
                    type: 'POST',
                    url:  "<?=BASE_URL?>backend/send-fcm-msg.php",
                    data: new FormData(this),
                    contentType: false,
                    data_type: 'json',
                    cache: false,
                    processData: false,
                    success: function (response) {
                        console.log(response)
                    },
                    error: function (response) {
                        console.log(response)
                    }
                });
            }else {
                alert('Please Enter Message Text')
            }

        })
        //update fcm token
        initFirebaseMessagingRegistration();
    })


    function initFirebaseMessagingRegistration() {
        messaging
            .requestPermission()
            .then(function () {
                console.log(messaging.getToken())
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                    $.ajax({
                        type: "post",
                        url:"<?=BASE_URL?>backend/save_fcm_token.php",
                        data: {
                            fcm_token: token
                        },
                        success: function (data) {
                            console.log('token saved')
                        }
                    });
            }).catch(function (err) {
            console.log('User Chat Token Error'+ err);
        });
    }



    messaging.onMessage(function(payload) {
        console.log(payload.data['message']);

        $('#chat_table').append('<tr> <td> '+payload.data['message']+'</td></tr>')

        // const noteTitle = payload.notification.title;
        // const noteOptions = {
        //     body: payload.notification.body,
        //     icon: payload.notification.icon,
        // };
        // console.log(payload);
        // new Notification(noteTitle, noteOptions);
    });

</script>

    <!-- include header -->
    <?php  include 'includes/header.php'; ?>

    <div class="ans-main-wrapper">
        <div class="container ans-main-container">
            <div class="row ans-main-row">
              <div class="col-md-12 px-0">
                <div class="ans-settings-tray">
                    <div class="ans-chat-header ans-friend-drawer--grey">
                    <div class="row">
                        <div class="col-4">
                            <span class="fa fa-arrow-left ans-back-arrow"></span>
                        </div>
                        <div class="col-4">
                            <div class="ans-text text-center">
                                <h6 class="mb-0">Robo Cop</h6>
                              </div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <!-- <span class="settings-tray--right">
                      <i class="material-icons">cached</i>
                      <i class="material-icons">message</i>
                      <i class="material-icons">menu</i>
                    </span> -->
                  </div>
                </div>
              </div>
              <div class="col-md-12 px-0">
                <div class="ans-chat-panel">
                    <table class="table">
                        <tbody id="chat_table">

                        </tbody>

                    </table>
                </div>
                <div class="row">
                    <div class="col-12">
                      <div class="ans-chat-box-tray">
                          <form action="" id="form_send_msg">
                              <div class="ans-chat-box-tray">
                                  <input type="hidden"  name="sender_type" id="sender_type" value= "dp" >
                                  <input type="hidden"  name="api_key" id="api_key" value= "api.dedo.club.105118.com" >
                                  <input type="hidden"  name="receiver_id" id="receiver_id" value="{{$order->user_id}}" >
                                  <input type="hidden"  name="sender_id" id="sender_id" value="{{$order->vendor_id}}" >
                                  <input type="ans-text" name="msg" placeholder="Type your message here..." id="value_msg" value="" class="ans-input-filed">
                                  <button class="btn btn-sm" type="submit" id="btn_send_msg"><i class="ans-material-icons fa fa-paper-plane ans-chat-send-btn" ></i></button>
                              </div>
                          </form>
<!--                        <input type="ans-text" placeholder="Type your message here..." value="--><?php //$_GET('vendor_id')?><!--" class="ans-input-filed">-->
<!--                        <i class="ans-material-icons fa fa-paper-plane ans-chat-send-btn"></i>-->
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>


    <!-- Modal -->

    <?php

if ($_SESSION['source']!='mobile') {
    include_once 'includes/footer.php';
}
?>
    <?php include_once 'includes/side-menu.php';?>

    <?php include_once 'includes/jslinks.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.js"
        integrity="sha512-jJHgrGWRvOyyVt4TghrM7L+HSb02QkXJPPBJhDIkiqEzUYWBKe76GVVsZggmjZWOmsPwS0WSPIvyUGZzJta8kg=="
        crossorigin="anonymous"></script>



</body>




</html>