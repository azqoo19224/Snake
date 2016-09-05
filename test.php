<?php
    session_start();
    include_once 'snake.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript">
        var key = 39;
        countSecond();
        document.onkeydown=keyFunction;

        function keyFunction() {

            if(event.keyCode == 39 || event.keyCode == 38 || event.keyCode == 37 || event.keyCode == 40) {
                key = event.keyCode;
            }
          	
                // countSecond();
    	}
        function countSecond() {
            // alert(key);
            	$.ajax(
            		    {
                	        type:"GET",
                	        url:"move.php?key=" + key,
                	        dataType:"text",
                	        error:function(Xhr)
                	        {
                	            alert("你掛惹");
                	        },
                	        success:function(data)
                	        { 
                	            alert("123");
                	            if (data == "error") {
                	              clearTimeout(meter1);
                	            } else {
                	                $("#show").text(data);
                	            }
                	            
                	        }
                	   });
        　 meter1=setTimeout("countSecond()", 200);
        }

        </script>
       
    </head>
    <body>
        <div id = "show" style ="font-family:fantasy;white-space:pre-wrap;white-space:pre;"></div>
    </body>
</html>
    