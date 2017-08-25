<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title></title>
	<style>
	#output {
	    margin: 20px;
		margin-top:50px;
	    padding: 100px;
	    background: rgba(20,20,20,0.7);
	    border-radius: 10px;
	    font-size: 80px;
	    width: 80%;
	    color: white;
	}
	body {
		background-image: url("bg.jpg");
		background-size: 100%;
		background-attachment: fixed;
		
	}
	.btn{
	margin-top:280px;
	margin-left:120px;
	width:200px;
	height:50px;
	text-align:center;
	background-color:white;
	border-radius: 10px;
	border: 0px ;
	}
	</style>
</head>
<body >
<input type="submit" id="rands" name="rand" class="btn" value="Random">
	<center><div id="output">--</div></center>

 	
</body>
<script src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
<script type="text/javascript">
	var i=0;
	var temp;
	var animationTimer = null, output, started, duration, desired;
	$("#rands").click(function(){
	    // Constants
		i=0;
	    duration = 5000;
	    desired = '50';

	    // Initial setup
	    output = $('#output');
	    started = new Date().getTime();
	    
	    if (animationTimer === null) {
	    	animationTimer = setInterval(setTimer, 200);
	    } else {
	    	clearInterval()
	    }
	    
	    if(output.text().trim() === desired) {
	    	clearInterval()
	    }
	});

	function setTimer () {
	  // If the value is what we want, stop animating
	  // or if the duration has been exceeded, stop animating
	  if (output.text().trim() === desired || new Date().getTime() - started > duration) 
	  {
	    $.ajax({
		       type: "POST",
			   url: "deletestd.php",
			   cache: false,
			   data: "name="+output.text().trim(),
			   success: function(msg)
			   {
					clearInterval()
			   }
		});
		clearInterval()
	    output.text('--')
	  } else {
	   // console.log('animating');
	    // Generate a random string to use for the next animation step

	    $.ajax({
				   type: "POST",
				   url: "randomstd.php",
				   cache: false,
				   data: "name=one",
				   success: function(msg)
				   {
					 	    output.text(''+msg);
					 	//    	if() 
					 	//    	{
						 // 	    $.ajax({
							// 	   type: "POST",
							// 	   url: "deletestd.php",
							// 	   cache: false,
							// 	   data: "name="+msg,
							// 	   success: function(msgs){
						 // 	  	         console.log("success")
					  // 			   }
							// 	});
							// }
				   }
		});

	  }
	}

	function clearInterval () {
		clearInterval(animationTimer);
	  animationTimer = null;
	}
</script>
</html>