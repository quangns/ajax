<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<?php
require "main.php";
session_start();
if(!isset($_SESSION['name'])){
    loginForm();
}
else{
?> 
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <span id="username"><?php echo $_SESSION['name'] ?></span> <b></b></p>
        <p class="logout"><a id="exit" href="main.php">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox"></div>
     
    <!-- <form name="message" action=""> -->
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <button type="button" id="submitmsg">Send</button>
    <!-- </form> -->
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
    //If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){window.location = 'index.php?logout=true';}		
	});
    //If user submits the form
	$("#submitmsg").click(function() {
        
        var txtten = <?php echo json_encode($_SESSION['name']) ?>;
        var txtbinhluan = $("#usermsg").val();
        var timetest = new Date();
        var txtthoigian = timetest.getHours() + ":" + timetest.getMinutes();
        
        $.post("post.php", {thoigian: txtthoigian, ten: txtten, binhluan: txtbinhluan}, function(data) {
            $("#chatbox").html(data);
        })
    });
}); 
</script>
<?php
}
?>
</body>
</html>