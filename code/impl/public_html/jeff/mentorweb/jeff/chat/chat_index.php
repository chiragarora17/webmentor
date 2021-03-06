<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
include 'loginform.php';
include 'chat_class.php';
include_once '_config_db.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="chat_style.css" />
</head>

<?php
if(!isset($_SESSION['name'])){
	loginForm();
}
else{
//$chat = new Chat($_SESSION['name'], "other dude");
?>
<div id="wrapper">
	<div id="menu">
		<p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
		<p class="logout"><a id="exit" href="#">Exit Chat</a></p>
		<div style="clear:both"></div>
	</div>	
	<div id="chatbox"></div>
	
	<form name="message" action="">
		<input name="usermsg" type="text" id="usermsg" size="63" />
		<input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
	</form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
});
</script>
<?php } ?>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){  

    $("#submitmsg").click(function(){  
		
        send_message(1,1,$("#usermsg").val());       
    });  
});  
</script>  

<script type="text/javascript">  
// jQuery Document  
$(document).ready(function(){  
    //If user wants to end session  
    $("#exit").click(function(){  
        var exit = confirm("Are you sure you want to end the session?");  
        if(exit==true){window.location = 'chat_index.php?logout=true';}        
    });  
});  
</script>  
<?php
if(isset($_GET['logout'])){	
	
	//Simple exit message
	$fp = fopen("log.html", 'a');
	fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
	fclose($fp);
	
	session_destroy();
	header("Location: chat_index.php"); //Redirect the user
}
?>