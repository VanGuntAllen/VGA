
<!-- Template source_code -->

   <?php 

if (isset($_POST["filename"])) {
	$fname = $_POST["filename"];
	$file = stripslashes($_POST["file"]);
	$fp = @fopen($fname, "w");
	if ($fp) {
		fwrite($fp, $file);
		fclose($fp);
	}
	
}

if (isset($_GET["f"])) 
	$fname = stripslashes($_GET["f"]);
	if (file_exists($fname)) 
		$fp = @fopen($fname, "r");
		if (filesize($fname) !== 0) 
			$loadfile = fread($fp, filesize($fname));
			$loadfile = htmlspecialchars($loadfile);
			fclose($fp);
?>
    

<!DOCTYPE HTML >
<HEAD>
    
        <META name="AUTHOR" content="Van-Gunt Allen -vanguntallen@gmail.com">
            <META name="KEYWORDS" content="HTML5 TV Page  generator">
                <META name="DESCRIPTION" content="HTML5 Audio Video Player generator">
                    <META NAME="Generator" CONTENT="VCMS">
                        <TITLE> HTML5 video-studio </TITLE>
   
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>  
        
        
        video{ /* video border */
        
         border: 1px solid #ccc;
          padding: 20px; margin: 10px;
           border-radius: 20px;
            /* tranzitionstransitions applied to the vodeovideo element */
             -moz-transition: all 1s ease-in-out; -webkit-transition: all 1s ease-in-out; -o-transition: all 1s ease-in-out; 
             -ms-transition: all 1s ease-in-out; transition: all 1s ease-in-out; 
             
             }
             
             /* background color and gradient */ 
             video,  #imagecapture, #captions,#html5videoplay, #play, #stop, #fwd,#rew,#slower,#faster,#restart,#normal,#full-screen,#stop, #pause, #plus, #minus, #mute,#g ,#g2 ,#g3 ,#g4 ,#g ,#g5 ,#g6 
             { /* background color */ background-color: #22cccc; 
             
             
             /* background gradient */ background-image: linear-gradient(top, #fff, #fcc); 
             background-image: -moz-linear-gradient(top, #fff, #fcc); background-image: -webkit-linear-gradient(top, #fff, #333);
 
                  }

/* shadows */ video, #imagecapture, #captions,#html5videoplay,#play, #stop, #fwd,#rew,#slower,#faster,#restart,#normal,#full-screen,#stop, #pause, #plus, #minus, #mute  
{ 

box-shadow: 0 0 10px #ccc; 

}

video:hover, video:focus, #play:hover, #fwd :hover,#rew,#slower:hover,#faster:hover,#restart:hover,#normal:hover, #full-screen:hover, #stop:hover, #pause:hover, #plus:hover, #minus:hover, #mute:hover 
{ 
/* glow */ 
box-shadow: 0 0 20px #888; 

}

#controls { display: none; margin: 10px 30px; } /* style for buttons */ #play, #fwd,#rew,#slower,#faster,#restart,#normal,#full-screen, #stop, #pause, #plus, #minus, #mute { border: 1px solid #ccc; padding: 5px; border-radius: 10px; width: 60px; margin: 0 10px 0 0; } body{ /* color tranzitiontransition */ -webkit-transition: background-color 1s ease-in-out; -moz-transition: background-color 1s ease-in-out; -o-transition: background-color 1s ease-in-out; -ms-transition: background-color 1s ease-in-out; transition: background-color 1s ease-in-out; /* initial color */ background-color: #fff; } #butterfly{ position: absolute; left: 0; top: -6px; background-image: url(butterfly.png); width: 40px; height: 40px; } #progressbar{ display: none; /* size */ width: 400px; height: 20px; /* position and border */ position: relative; border: 1px solid #ccc; margin: 10px; border-radius: 20px; /* background color */ background-color: #cccccc; /* background gradient */ background-image: linear-gradient(top, #fff, #ccc); background-image: -moz-linear-gradient(top, #fff, #ccc); background-image: -webkit-linear-gradient(top, #fff, #fcc); background-image: -o-linear-gradient(top, #fff, #ccc); background-image: -ms-linear-gradient(top, #fff, #ccc); /* shadow */ box-shadow: 0 0 10px #ccc; } #loadingprogress{ /* border */ border-radius: 20px; /* initial size */ height: 20px; width: 0; /* background color */ background-color: #9acd00; /* background gradient */ background-image: linear-gradient(top, #ffffff, #9acd00); background-image: -moz-linear-gradient(top, #ffffff, #9acd00); background-image: -webkit-linear-gradient(top, #ffffff, #9acd00); background-image: -o-linear-gradient(top, #ffffff, #9acd00); background-image: -ms-linear-gradient(top, #ffffff, #9acd00); }

 </style> 
        
                     
                       
           
<script type="text/javascript">
    // Master function, encapsulates all functions
    function init() {
        var video = document.getElementById('my_video');
        var thecanvas = document.getElementById('thecanvas');
        var img = document.getElementById('thumbnail_img');
        
        
        video.addEventListener('pause', function(){
                               
                               draw( video, thecanvas, img);
                               
                               }, false);
                               
                               
                               
                               
                               function draw( video, thecanvas, img ){
                                   
                                   // get the canvas context for drawing
                                   var context = thecanvas.getContext('2d');
                                   
                                   // draw the video contents into the canvas x, y, width, height
                                   context.drawImage( video, 0, 0, thecanvas.width, thecanvas.height);
                                   
                                   // get the image data from the canvas object
                                   var dataURL = thecanvas.toDataURL();
                                   
                                   // set the source of the img tag
                                   img.setAttribute('src', dataURL);
                                   
                               }
                               

              if (video.canPlayType) {   // tests that we have HTML5 video support
            // if successful, display buttons and set up events
            document.getElementById("buttonbar").style.display = "block";
            document.getElementById("inputField").style.display = "block";

            //  button events
            //  Play
            document.getElementById("play").addEventListener("click", vidplay, false);
            //  Restart
            document.getElementById("restart").addEventListener("click", function(){
                setTime(0);
             }, false);
            //  Skip backward 10 seconds
            document.getElementById("rew").addEventListener("click", function(){
                setTime(-10);                
            }, false);
            //  Skip forward 10 seconds
            document.getElementById("fwd").addEventListener("click", function(){
                setTime(10);
            }, false);                
            //  set src == latest video file URL
            document.getElementById("loadVideo").addEventListener("click", getVideo, false);
                            
            // fail with message 
            video.addEventListener("error", function(err) {
                errMessage(err);
            }, true);
            //  display video duration when available
            video.addEventListener("loadedmetadata", function () {
                                   vLength = video.duration.toFixed(1);
                                   document.getElementById("vLen").textContent = vLength; // global variable
                                   }, false);
                                   

            //  display the current and remaining times
            video.addEventListener("timeupdate", function () {
                                   //  Current time
                                   var vTime = video.currentTime;
                                   document.getElementById("curTime").textContent = vTime.toFixed(1);
                                   document.getElementById("vRemaining").textContent = (vLength - vTime).toFixed(1);
                                   }, false);
                                   
                                         //  button helper functions 
            //  skip forward, backward, or restart
            function setTime(tValue) {
            //  if no video is loaded, this throws an exception 
                try {
                    if (tValue == 0) {
                        video.currentTime = tValue;
                    }
                    else {
                        video.currentTime += tValue;
                    }
                    
                 } catch (err) {
                     // errMessage(err) // show exception
                 errMessage("Video content might not be loaded");
                   }
         }
             //  play video
             function vidplay(evt) {
                if (video.src == "") {  // on first run, src is empty, go get file
                    getVideo();
                }
                button = evt.target; //  get the button id to swap the text based on the state                                    
                if (video.paused) {   // play the file, and display pause symbol
                   video.play();
                   button.textContent = "||";
                } else {              // pause the file, and display play symbol  
                   video.pause();
                   button.textContent = ">";
                }                                        
            }
            //  load video file from input field
            function getVideo() {
                var fileURL = document.getElementById("videoFile").value;  // get input field                    
                if (fileURL != ""){
                   video.src = fileURL;
                   video.load();  // if HTML source element is used
                   document.getElementById("play").click();  // start play
                 } else {
                    errMessage("Enter a valid video URL");  // fail silently
                 }
            }
            
            
            //  display an error message 
            function errMessage(msg) {
            // displays an error message for 5 seconds then clears it
                document.getElementById("errorMsg").textContent = msg;
                setTimeout("document.getElementById('errorMsg').textContent=''", 5000);
            }
            // change volume based on incoming value
            function setVol(value) {
                var vol = video.volume;
                vol += value;
                //  test for range 0 - 1 to avoid exceptions
                if (vol >= 0 && vol <= 1) {
                    // if valid value, use it
                    video.volume = vol;
                } else {
                    // otherwise substitute a 0 or 1
                    video.volume = (vol < 0) ? 0 : 1;
                }
            }
            //  button events
            //  Play
            document.getElementById("play").addEventListener("click", vidplay, false);
            //  Restart
            document.getElementById("restart").addEventListener("click", function () {
                                                                setTime(0);
                                                                }, false);
            //  Skip backward 10 seconds
            document.getElementById("rew").addEventListener("click", function () {
            setTime(-10);
            }, false);
        //  Skip forward 10 seconds
        document.getElementById("fwd").addEventListener("click", function () {
        setTime(10);
        }, false);
        //  set src == latest video file URL
        document.getElementById("loadVideo").addEventListener("click", getVideo, false);
                                                                                                                                                                
    // fail with message
    video.addEventListener("error", function (err) {
    errMessage(err);
    }, true);
    // volume buttons
    document.getElementById("volDn").addEventListener("click", function () {
setVol(-.1); // down by 10%
}, false);
document.getElementById("volUp").addEventListener("click", function () {
setVol(.1);  // up by 10%
}, false);

// playback speed buttons
document.getElementById("slower").addEventListener("click", function () {
video.playbackRate -= .25;
}, false);
document.getElementById("faster").addEventListener("click", function () {
video.playbackRate += .25;
}, false);
document.getElementById("normal").addEventListener("click", function () {
video.playbackRate = 1;
}, false);


document.getElementById("mute").addEventListener("click", function (evt) {
if (video.muted) {
video.muted = false;
evt.target.innerHTML = "<i class ='fa fa-volume-up'></i>"
} else {
video.muted = true;
evt.target.innerHTML = " <i class ='fa fa-volume-off'></i>"
}
     }, false);
        } // end of runtime
    }// end of master
</script>

                       <script type="text/javascript">


function init() {
   
   hideDesign();
 
    hideSourceCode();
}
                       
                       
                     
                     
                     
                     
                     /* ---------------------------------------------------------------------- *\
                      Function    : hide   html5 video player()
                      Description : Hide the menus used for selecting the hide   html5 video player()
                      .
                      \* ---------------------------------------------------------------------- */
                       function hidehtml5videoPlayer() {
                           
                           document.getElementById('html5videoplayer').style.display = "none";
                       }
                       
                       
                       
                       /* ---------------------------------------------------------------------- *\
                        Function    : show   html5 video player()
                        Description : Hide the menus used for selecting show   html5 video player()
                        .
                        \* ---------------------------------------------------------------------- */
                       function showhtml5videoPlayer() {
                           
                           document.getElementById('html5videoplayer').style.display = "block";
                           
                           
                       }
                       
                       
                       

                     
                     
                     
                     
                     
                      
                      /* ---------------------------------------------------------------------- *\
                       Function    : hide   ImageCapture()
                       Description : Hide the menus used for selecting the hide  ImageCapture
                       .
                       \* ---------------------------------------------------------------------- */
                       function hideImageCapture() {
                           
                           document.getElementById('imagecapture').style.display = "none";
                       }
                       
                       
                       
                       /* ---------------------------------------------------------------------- *\
                        Function    : show  ImageCapture()
                        Description : Hide the menus used for selecting show  ImageCapture
                        .
                        \* ---------------------------------------------------------------------- */
                       function showImageCapture() {
                           
                           document.getElementById('imagecapture').style.display = "block";
                           
                           
                       }
                       
 
 
                      
                      
                      /* ---------------------------------------------------------------------- *\
                       Function    : hide  Captions()
                       Description : Hide the menus used for selecting the hide Captions
                       .
                       \* ---------------------------------------------------------------------- */
                       function hideCaptions() {
                           
                           document.getElementById('captions').style.display = "none";
                       }
                       
                       
                       
                       /* ---------------------------------------------------------------------- *\
                        Function    : show  Captions()
                        Description : Hide the menus used for selecting show Captions
                        .
                        \* ---------------------------------------------------------------------- */
                       function showCaptions() {
                           
                           document.getElementById('captions').style.display = "block";
                           
                           
                       }
                       
                       
                       /* ---------------------------------------------------------------------- *\
                        Function    : hide SourceCode()
                        Description : Hide the menus used for selecting the hide SourceCode
                     .
                        \* ---------------------------------------------------------------------- */
                       function hideSourceCode() {
                           
                           document.getElementById('source_code').style.display = "none";
                       }
                       
                       
                       
                       /* ---------------------------------------------------------------------- *\
                        Function    : show SourceCode()
                        Description : Hide the menus used for selecting show SourceCode
                       .
                        \* ---------------------------------------------------------------------- */
                       function showSourceCode() {
                           
                           document.getElementById('source_code').style.display = "block";
                           
                           
                       }
                       
                       
                       
                       
                       
                       /* ---------------------------------------------------------------------- *\
                        Function    : hide  iFrame Preview
                        Description : Hide the menus used for selecting the hide IFrame
                       .
                        \* ---------------------------------------------------------------------- */
                       function hideDesign() {
                           
                           document.getElementById('design').style.display = "none";
                       }
                       
                       
                       
                       /* ---------------------------------------------------------------------- *\
                        Function    : show  iFrame  Preview
                        Description : Show the menus used for selecting  Show iFrame
                        .
                        \* ---------------------------------------------------------------------- */
                       function showDesign() {
                           
                           document.getElementById('design').style.display = "block";
                           
                           
                       }
                       
                       
                       /* ---------------------------------------------------------------------- *\
                        Function    :  hide Body Properties()
                        Description : Hide the menus used for selecting the hide the  Body TextArea
                       .
                        \* ---------------------------------------------------------------------- */
                       
                       
                       
                       
                       
                       function showBodyProperties() {
                           
                           document.getElementById('body_properties').style.display = "block";
                           
                       }
                       
                       /* ---------------------------------------------------------------------- *\
                        Function    : show  Body Properties()
                        Description : Show the menus used for selecting the  Body TextArea .
                        \* ---------------------------------------------------------------------- */
                       
                       function showBodyProperties() {
                           
                           document.getElementById('body_properties').style.display = "block";
                           
                       }


                       
                       
                           </script>
                                              
                       
                       
                      
                           
                            <style type="text/css">
                                div.ex
                                {
                                    width:220px;
                                    padding:10px;
                                    border:5px solid gray;
                                    margin:0px;
                                }
                            </style>


<script type="text/javascript">
    // Master function, encapsulates all functions
    function init() {
        var video = document.getElementById('my_video');
        var thecanvas = document.getElementById('thecanvas');
        var img = document.getElementById('thumbnail_img');
        
        
        video.addEventListener('pause', function(){
                               
                               draw( video, thecanvas, img);
                               
                               }, false);
                               
                               
                               
                               
                               function draw( video, thecanvas, img ){
                                   
                                   // get the canvas context for drawing
                                   var context = thecanvas.getContext('2d');
                                   
                                   // draw the video contents into the canvas x, y, width, height
                                   context.drawImage( video, 0, 0, thecanvas.width, thecanvas.height);
                                   
                                   // get the image data from the canvas object
                                   var dataURL = thecanvas.toDataURL();
                                   
                                   // set the source of the img tag
                                   img.setAttribute('src', dataURL);
                                   
                               }
                               

              if (video.canPlayType) {   // tests that we have HTML5 video support
            // if successful, display buttons and set up events
            document.getElementById("buttonbar").style.display = "block";
            document.getElementById("inputField").style.display = "block";

            //  button events
            //  Play
            document.getElementById("play").addEventListener("click", vidplay, false);
            //  Restart
            document.getElementById("restart").addEventListener("click", function(){
                setTime(0);
             }, false);
            //  Skip backward 10 seconds
            document.getElementById("rew").addEventListener("click", function(){
                setTime(-10);                
            }, false);
            //  Skip forward 10 seconds
            document.getElementById("fwd").addEventListener("click", function(){
                setTime(10);
            }, false);                
            //  set src == latest video file URL
            document.getElementById("loadVideo").addEventListener("click", getVideo, false);
                            
            // fail with message 
            video.addEventListener("error", function(err) {
                errMessage(err);
            }, true);
            //  display video duration when available
            video.addEventListener("loadedmetadata", function () {
                                   vLength = video.duration.toFixed(1);
                                   document.getElementById("vLen").textContent = vLength; // global variable
                                   }, false);
                                   

            //  display the current and remaining times
            video.addEventListener("timeupdate", function () {
                                   //  Current time
                                   var vTime = video.currentTime;
                                   document.getElementById("curTime").textContent = vTime.toFixed(1);
                                   document.getElementById("vRemaining").textContent = (vLength - vTime).toFixed(1);
                                   }, false);
                                   
                                         //  button helper functions 
            //  skip forward, backward, or restart
            function setTime(tValue) {
            //  if no video is loaded, this throws an exception 
                try {
                    if (tValue == 0) {
                        video.currentTime = tValue;
                    }
                    else {
                        video.currentTime += tValue;
                    }
                    
                 } catch (err) {
                     // errMessage(err) // show exception
                 errMessage("Video content might not be loaded");
                   }
         }
             //  play video
             function vidplay(evt) {
                if (video.src == "") {  // on first run, src is empty, go get file
                    getVideo();
                }
                button = evt.target; //  get the button id to swap the text based on the state                                    
                if (video.paused) {   // play the file, and display pause symbol
                   video.play();
                   button.textContent = "||";
                } else {              // pause the file, and display play symbol  
                   video.pause();
                   button.textContent = ">";
                }                                        
            }
            //  load video file from input field
            function getVideo() {
                var fileURL = document.getElementById("videoFile").value;  // get input field                    
                if (fileURL != ""){
                   video.src = fileURL;
                   video.load();  // if HTML source element is used
                   document.getElementById("play").click();  // start play
                 } else {
                    errMessage("Enter a valid video URL");  // fail silently
                 }
            }
            
            
            //  display an error message 
            function errMessage(msg) {
            // displays an error message for 5 seconds then clears it
                document.getElementById("errorMsg").textContent = msg;
                setTimeout("document.getElementById('errorMsg').textContent=''", 5000);
            }
            // change volume based on incoming value
            function setVol(value) {
                var vol = video.volume;
                vol += value;
                //  test for range 0 - 1 to avoid exceptions
                if (vol >= 0 && vol <= 1) {
                    // if valid value, use it
                    video.volume = vol;
                } else {
                    // otherwise substitute a 0 or 1
                    video.volume = (vol < 0) ? 0 : 1;
                }
            }
            //  button events
            //  Play
            document.getElementById("play").addEventListener("click", vidplay, false);
            //  Restart
            document.getElementById("restart").addEventListener("click", function () {
                                                                setTime(0);
                                                                }, false);
            //  Skip backward 10 seconds
            document.getElementById("rew").addEventListener("click", function () {
            setTime(-10);
            }, false);
        //  Skip forward 10 seconds
        document.getElementById("fwd").addEventListener("click", function () {
        setTime(10);
        }, false);
        //  set src == latest video file URL
        document.getElementById("loadVideo").addEventListener("click", getVideo, false);
                                                                                                                                                                
    // fail with message
    video.addEventListener("error", function (err) {
    errMessage(err);
    }, true);
    // volume buttons
    document.getElementById("volDn").addEventListener("click", function () {
setVol(-.1); // down by 10%
}, false);
document.getElementById("volUp").addEventListener("click", function () {
setVol(.1);  // up by 10%
}, false);

// playback speed buttons
document.getElementById("slower").addEventListener("click", function () {
video.playbackRate -= .25;
}, false);
document.getElementById("faster").addEventListener("click", function () {
video.playbackRate += .25;
}, false);
document.getElementById("normal").addEventListener("click", function () {
video.playbackRate = 1;
}, false);


document.getElementById("mute").addEventListener("click", function (evt) {
if (video.muted) {
video.muted = false;
evt.target.innerHTML = "<i class ='fa fa-volume-up'></i>"
} else {
video.muted = true;
evt.target.innerHTML = " <i class ='fa fa-volume-off'></i>"
}
     }, false);
        } // end of runtime
    }// end of master
</script>


 <script src="https://vga.smtvs.com/js/html5-video.js"></script>

 
<script type="text/javascript">
      
    function Buildhtml5(form, Action){
        var Buildhtml5="";
        var html5="";
        
        
        if(Action==1){
            if(html5!=null)  {
 
  
  
   Buildhtml5 += "<div id=\"video\">\n" ;
  
  
    Buildhtml5 += " <video id=\"vga_player\" width=\"550\" height=\"310\" autoplay  poster=\""+form.html5player_poster.value+"\" preload=\""+form.html5player_preload.value+"\" type=\"video/mp4\" >\n" ;
      Buildhtml5 += " <source src=\""+form.videoFile.value+"\">\n" ;
    Buildhtml5 += "<object width=\"640\" height=\"377\" id=\"videoPlayer\" name=\"videoPlayer\" type=\"application/x-shockwave-flash\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" >\n" ;
 

	   Buildhtml5 += "	<param name=\"allowfullscreen\" value=\"true\">\n" ;
	   Buildhtml5 += " <param name=\"allowscriptaccess\" value=\"always\">\n" ;
	   Buildhtml5 += " <param name=\"flashvars\" value=\"file="+form.videoFile.value+"\">\n" ;
	
	   Buildhtml5 += "	<param name=\"movie\" value=\"videoPlayer.swf\" />\n" ;
	 Buildhtml5 += "<img src=\"video.jpg\" width=\"854\" height=\"480\" alt=\"Video\">\n" ;
	 Buildhtml5 += "<p>Your browser can’t play HTML5 video. <a href=\""+form.videoFile.value+"\">Download it</a> instead.</p>\n" ;
	 Buildhtml5 += "</object>\n" ;
     Buildhtml5 += "</video>\n" ;
    
    
    Buildhtml5 += " <div id=\"video_controls_bar\">\n" ;
     
      Buildhtml5 += " <button id=\"playpausebtn\"><i class =\"fa fa-play\" ></i></button>\n" ;
   Buildhtml5 += "<input id=\"seekslider\" type=\"range\" min=\"0\" max=\"100\" value=\"0\" step=\"1\">\n" ;
     Buildhtml5 += " <span id=\"curtimetext\">00:00</span> / <span id=\"durtimetext\">00:00</span>\n" ;
      Buildhtml5 += " <button id=\"mutebtn\"><i class =\'fa fa-volume-up\'></i></button>\n" ;
     Buildhtml5 += "  <input id=\"volumeslider\" type=\"range\" min=\"0\" max=\"100\" value=\"100\" step=\"1\">\n" ;
     Buildhtml5 += " <button id=\"fullscreenbtn\"><i class =\"fa fa-desktop\" ></i> </button>\n" ;
   
     Buildhtml5 += " </div>\n" ;
  
         
 Buildhtml5 += "</div>\n";
        
    }
}



        if(Action==2){
            if(html5!=null)  {
 
   Buildhtml5 += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/playerfun-8.css\">\n" ;
  
     Buildhtml5 += " <div  id=\"vga-video_player\" ><center>\n" ;
     


   Buildhtml5 += " <table  width=\""+form.tablesize.value+"\" class=\"center\">\n" ;
 
     Buildhtml5 += " <tr>\n" ;
       Buildhtml5 += " <td>\n" ;
   Buildhtml5 += " <div id=\"video_container\" >\n" ;
   Buildhtml5 += " <video id=\"vga_player\" preload=\"metadata\" playsinline   style=\"  height:450px;\">\n" ;
   Buildhtml5 += " <source src=\""+form.videoFile.value+"\" type=\"video/mp4\">\n" ;
   Buildhtml5 += " <source src=\"\" type=\"video/webm\">\n" ;

 
   Buildhtml5 += " </video>\n" ;
   Buildhtml5 += " <div id=\"video_controls_bar\"  style=\"font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; color:#ffffff;\">\n" ;
   Buildhtml5 += " &nbsp;&nbsp; <button id=\"playpausebtn\"><i class =\'fa fa-play\'></i></button>\n" ;
   Buildhtml5 += "   &nbsp;\n" ;
   Buildhtml5 += " <span id=\"curtimetext\">00:00</span>\n" ; 
   Buildhtml5 += " <input id=\"seekslider\" type=\"range\" min=\"0\" max=\"100\" value=\"0\" step=\"\" >\n" ;
   Buildhtml5 += " &nbsp;\n" ;
    Buildhtml5 += " <button id=\"mutebtn\"><i class =\'fa fa-volume-up\'></i></button>\n" ;
   Buildhtml5 += " &nbsp;&nbsp;\n" ;

     Buildhtml5 += " <input id=\"volumeslider\" type=\"range\" min=\"0\" max=\"100\" value=\"100\" step=\"1\">\n" ;
   Buildhtml5 += " &nbsp;\n" ;
   Buildhtml5 += " &nbsp;\n" ;

    Buildhtml5 += " <button id=\"fullscreenbtn\">\n" ;
   Buildhtml5 += " <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-arrows-fullscreen\" viewBox=\"0 0 16 16\">\n" ;
     Buildhtml5 += " <path fill-rule=\"evenodd\" d=\"M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z\"/>\n" ;
   Buildhtml5 += " </svg>\n" ;
   Buildhtml5 += " </button> &nbsp;\n" ;
    Buildhtml5 += " <p>\n" ;
         Buildhtml5 += "   <button ><img src=\""+ document.getElementById("station-img").value +"\" width=\"70\" height=\"20\" alt=\"\" class=\"img-responsive\"></button>&nbsp;&nbsp;\n" ;
           Buildhtml5 += "       </p>\n" ;
    Buildhtml5 += " </div>\n" ;
    Buildhtml5 += " </div>\n" ;
  
  		
  
  
 Buildhtml5 += "<script src=\"https://vga.smtvs.com/js/playerfun.js\">n" ;  Buildhtml5 += "<\/script>\n" ;


  
  
       
    }
}


  
        if(Action==3){
            if(html5!=null)  {
 
  
   Buildhtml5 += " <div id=\"video_container\" >\n" ;
   Buildhtml5 += " <video id=\"vga_player\" preload=\"metadata\" playsinline   style=\"  height:450px;\">\n" ;
   Buildhtml5 += ""+ document.getElementById("text").value +"\n"; 
   Buildhtml5 += " </video>\n" ;
   Buildhtml5 += " <div id=\"video_controls_bar\"  style=\"font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; color:#ffffff;\">\n" ;
   Buildhtml5 += " &nbsp;&nbsp; <button id=\"playpausebtn\"><i class =\'fa fa-play\'></i></button>\n" ;
   Buildhtml5 += "   &nbsp;\n" ;
   Buildhtml5 += " <span id=\"curtimetext\">00:00</span>\n" ; 
   Buildhtml5 += " <input id=\"seekslider\" type=\"range\" min=\"0\" max=\"100\" value=\"0\" step=\"\" >\n" ;
   Buildhtml5 += " &nbsp;\n" ;
    Buildhtml5 += " <button id=\"mutebtn\"><i class =\'fa fa-volume-up\'></i></button>\n" ;
   Buildhtml5 += " &nbsp;&nbsp;\n" ;

     Buildhtml5 += " <input id=\"volumeslider\" type=\"range\" min=\"0\" max=\"100\" value=\"100\" step=\"1\">\n" ;
   Buildhtml5 += " &nbsp;\n" ;
   Buildhtml5 += " &nbsp;\n" ;

    Buildhtml5 += " <button id=\"fullscreenbtn\">\n" ;
   Buildhtml5 += " <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-arrows-fullscreen\" viewBox=\"0 0 16 16\">\n" ;
     Buildhtml5 += " <path fill-rule=\"evenodd\" d=\"M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z\"/>\n" ;
   Buildhtml5 += " </svg>\n" ;
   Buildhtml5 += " </button> &nbsp;\n" ;
    Buildhtml5 += " <p>\n" ;
     Buildhtml5 += "   <button ><img src=\""+ document.getElementById("station-img").value +"\" width=\"70\" height=\"20\" alt=\"\" class=\"img-responsive\"></button>&nbsp;&nbsp;\n" ;
          
Buildhtml5 += " </div>\n" ;
Buildhtml5 += " </div>\n" ;
  

       
    }
}
   
  


form.textarea.value+=Buildhtml5; 
 
}
   
    
    
    function Buildhtml(form, Action){
        var Buildhtml="";
        var html="";
        
        
        if(Action==1){
            if(html!=null)  {
 
 
 
 
 
    Buildhtml += "\n";
     Buildhtml += ""+ document.getElementById("start").value +" -->  ";
     Buildhtml += ""+ document.getElementById("nend").value +"\n";
     Buildhtml += ""+ document.getElementById("cText").value +"\n";
            }
        } 

if(Action==2){
    if(html!=null)  {
    Buildhtml += "WEBVTT\n";
    }
}




if(Action==3){
    if(html!=null)  {
       
        Buildhtml += " <!DOCTYPE html>\n";
        Buildhtml += "<html>\n";
        Buildhtml += "<head>\n";
         Buildhtml += "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
         Buildhtml+="<META NAME=\"Generator\" CONTENT=\"VGA HTML5 Generator Studio\">\r\n";
        Buildhtml += "<title>";  Buildhtml += " </title>\n";
       
        Buildhtml += "<head>\n";
     
             
   
     
  Buildhtml += "<style>\n";  
  
  
  Buildhtml += "div#video_controls_bar{ background: "+skin_color.value+"; padding:10px; color:#FFFFFF;}\n";

   Buildhtml += " * { margin: 0; padding: "+control_size.value+"; }\n";  
     Buildhtml += "  body {\n";  
      Buildhtml += "font: 16px/1.4 Georgia, Serif;\n";  
     
   Buildhtml += " }\n";  
   Buildhtml += " #page-wrap {\n";  
    Buildhtml += "	width: 50%;\n";  
     Buildhtml += " margin: 0px auto;\n";  
   Buildhtml += " }\n";  
   Buildhtml += " h1 { font-weight: normal; font-size: 42px; }\n";  
  Buildhtml += "  h1, p, pre, video, h2, figure, h3, ol, script, style { margin: 0 0 0px 0; }\n";  
   Buildhtml += " h2 { margin-top: 0px; }\n";  
   Buildhtml += " h1 { margin-bottom: 40px; }\n";  
   Buildhtml += " li { margin: 0 0 5px 20px; }\n";  
   Buildhtml += " article { background: white; padding: 10%; }\n";  
   Buildhtml += " pre, article style, article script {\n";  
   Buildhtml += " 	white-space: pre;\n";  
    Buildhtml += "	display: block;\n";  
    Buildhtml += "	padding: 10px;\n";  
    Buildhtml += "	background: #eee;\n";  
    	Buildhtml += "overflow-x: auto;\n";  
    	Buildhtml += "font: 12px Monaco, MonoSpace;\n";  
  Buildhtml += "  }\n";  

   Buildhtml += " img { max-width: 100%; }\n";  

   Buildhtml += " figure { display: block; background: #000; padding: 10px; }\n";  
  Buildhtml += "  figcaption { display: block; text-align: center; margin: 10px 0; font-style: italic; font-size: 14px; orphans: 2; }\n";  
 
 
 Buildhtml += " video { \n";
   Buildhtml += "   width: 100%; \n";
   Buildhtml += "   height: auto; \n";
 Buildhtml += " } \n";
 
 
 Buildhtml += " </style>\n";  
  
Buildhtml += "  <link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/"+form.Skin.value+"\">\n";
Buildhtml += "   <script src=\"https://vga.smtvs.com/js/playerfun.js\"><\/script>\n";
    Buildhtml += "   <script src=\"https://vga.smtvs.com/js/html5-video.js\"><\/script>\n";
    
 
  Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/playerpage.css\">\n" ;
  
Buildhtml += "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\n" ;
 
   Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/playerfun-8.css\">\n" ; 
Buildhtml += " <link href=\"https://vga.smtvs.com/css/custom-styles.css\" rel=\"stylesheet\" >\n";
       Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/font-awesome/css/font-awesome.min.css\">\n";
       
        Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/bootstrap.min.css\">\n";
        Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/custom-elements.css\">\n";
        Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/all.css\">\n";
    
Buildhtml += "</head>\n" ;

        Buildhtml += "<body>\n";
Buildhtml += "<main>\n" ;
Buildhtml += "<header id=\"header\" class=\"clearfix\">\n" ;

Buildhtml += ""+ document.getElementById("menu").value +"\n";
 Buildhtml += "<p><br><p><br>\n";
     
         Buildhtml += "<center>\n";
        Buildhtml += ""+ document.getElementById("textarea").value +"\n";
         Buildhtml += "</center>\n";
        
        
        Buildhtml += "</body>\n";
        Buildhtml += "</html>";
        
        
    }
}  
        
   
        if(Action==4){
            if(html!=null)  {

Buildhtml += "<!DOCTYPE html>\n" ;

Buildhtml += "<html lang=\"en\" itemscope=\"\" itemtype=\"\">\n" ;
Buildhtml += "<head>\n" ;
Buildhtml += "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n" ;
Buildhtml += " <link href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">\n" ;

   Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/"+form.Skin.value+"\">\n" ;
  
 
  Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/playerpage.css\">\n" ;
  
Buildhtml += "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\n" ;
 
   Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/playerfun-8.css\">\n" ; 
Buildhtml += " <link href=\"https://vga.smtvs.com/css/custom-styles.css\" rel=\"stylesheet\" >\n";
       Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/font-awesome/css/font-awesome.min.css\">\n";
       
        Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/bootstrap.min.css\">\n";
        Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/custom-elements.css\">\n";
        Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/all.css\">\n";
        
     
     
  Buildhtml += "<style>\n";  
  
  
  Buildhtml += "div#video_controls_bar{ background: "+skin_color.value+"; padding:10px; color:#FFFFFF;}\n";

   Buildhtml += " * { margin: 0; padding: "+control_size.value+"; }\n";  
     Buildhtml += "  body {\n";  
      Buildhtml += "font: 16px/1.4 Georgia, Serif;\n";  
     
   Buildhtml += " }\n";  
   Buildhtml += " #page-wrap {\n";  
    Buildhtml += "	width: 50%;\n";  
     Buildhtml += " margin: 0px auto;\n";  
   Buildhtml += " }\n";  
   Buildhtml += " h1 { font-weight: normal; font-size: 42px; }\n";  
  Buildhtml += "  h1, p, pre, video, h2, figure, h3, ol, script, style { margin: 0 0 0px 0; }\n";  
   Buildhtml += " h2 { margin-top: 0px; }\n";  
   Buildhtml += " h1 { margin-bottom: 40px; }\n";  
   Buildhtml += " li { margin: 0 0 5px 20px; }\n";  
   Buildhtml += " article { background: white; padding: 10%; }\n";  
   Buildhtml += " pre, article style, article script {\n";  
   Buildhtml += " 	white-space: pre;\n";  
    Buildhtml += "	display: block;\n";  
    Buildhtml += "	padding: 10px;\n";  
    Buildhtml += "	background: #eee;\n";  
    	Buildhtml += "overflow-x: auto;\n";  
    	Buildhtml += "font: 12px Monaco, MonoSpace;\n";  
  Buildhtml += "  }\n";  

   Buildhtml += " img { max-width: 100%; }\n";  

   Buildhtml += " figure { display: block; background: #000; padding: 10px; }\n";  
  Buildhtml += "  figcaption { display: block; text-align: center; margin: 10px 0; font-style: italic; font-size: 14px; orphans: 2; }\n";  
 
 
 Buildhtml += " video { \n";
   Buildhtml += "   width: 100%; \n";
   Buildhtml += "   height: auto; \n";
 Buildhtml += " } \n";
 
 
 Buildhtml += " </style>\n";     
        
        
Buildhtml += "</head>\n" ;

Buildhtml += "<main>\n" ;
Buildhtml += "<header id=\"header\" class=\"clearfix\">\n" ;

Buildhtml += ""+ document.getElementById("menu").value +"\n";





 Buildhtml += "<div  id=\"vga-video_player\" ><center>\n" ;

   Buildhtml += " <table class=\"center\">\n" ;
 
     Buildhtml += " <tr>\n" ;
       Buildhtml += " <td>\n" ;
       
 Buildhtml += ""+ document.getElementById("textarea").value +"\n"; 
 
 
 Buildhtml += "</td>\n" ;
    Buildhtml += "<td>\n" ;
   
Buildhtml += "<list id=\"playlist\"   align=\"rihgt\" >\n" ;

Buildhtml += ""+ document.getElementById("text2").value +"\n"; 

Buildhtml += "</list>\n";
Buildhtml += " <td>\n";

Buildhtml += "</table>\n";


Buildhtml += "</meter>";	    Buildhtml += "</header>\n";


Buildhtml += "<script src=\"https://vga.smtvs.com/playerfun-2.js\"><\/script>\n";
	

Buildhtml += "</main>\n";


Buildhtml += "</body>\n";
Buildhtml += "</html>\n";


  
       
    }
}
  
  
     if(Action==5){
            if(html!=null)  {

Buildhtml += "<!DOCTYPE html>\n" ;

Buildhtml += "<html lang=\"en\" itemscope=\"\" itemtype=\"\">\n" ;
Buildhtml += "<head>\n" ;
Buildhtml += "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n" ;
Buildhtml += " <link href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">\n" ;

   Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/"+form.Skin.value+"\">\n" ;
  
 
  Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/playerpage.css\">\n" ;
  
Buildhtml += "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\n" ;
 
   Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/playerfun-8.css\">\n" ; 
Buildhtml += " <link href=\"https://vga.smtvs.com/css/custom-styles.css\" rel=\"stylesheet\" >\n";
       Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/font-awesome/css/font-awesome.min.css\">\n";
       
        Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/bootstrap.min.css\">\n";
        Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/custom-elements.css\">\n";
        Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/all.css\">\n";
        
     
     
  Buildhtml += "<style>\n";  
  
  
  Buildhtml += "div#video_controls_bar{ background: "+skin_color.value+"; padding:10px; color:#FFFFFF;}\n";

   Buildhtml += " * { margin: 0; padding: "+control_size.value+"; }\n";  
     Buildhtml += "  body {\n";  
      Buildhtml += "font: 16px/1.4 Georgia, Serif;\n";  
     
   Buildhtml += " }\n";  
   Buildhtml += " #page-wrap {\n";  
    Buildhtml += "	width: 50%;\n";  
     Buildhtml += " margin: 0px auto;\n";  
   Buildhtml += " }\n";  
   Buildhtml += " h1 { font-weight: normal; font-size: 42px; }\n";  
  Buildhtml += "  h1, p, pre, video, h2, figure, h3, ol, script, style { margin: 0 0 0px 0; }\n";  
   Buildhtml += " h2 { margin-top: 0px; }\n";  
   Buildhtml += " h1 { margin-bottom: 40px; }\n";  
   Buildhtml += " li { margin: 0 0 5px 20px; }\n";  
   Buildhtml += " article { background: white; padding: 10%; }\n";  
   Buildhtml += " pre, article style, article script {\n";  
   Buildhtml += " 	white-space: pre;\n";  
    Buildhtml += "	display: block;\n";  
    Buildhtml += "	padding: 10px;\n";  
    Buildhtml += "	background: #eee;\n";  
    	Buildhtml += "overflow-x: auto;\n";  
    	Buildhtml += "font: 12px Monaco, MonoSpace;\n";  
  Buildhtml += "  }\n";  

   Buildhtml += " img { max-width: 100%; }\n";  

   Buildhtml += " figure { display: block; background: #000; padding: 10px; }\n";  
  Buildhtml += "  figcaption { display: block; text-align: center; margin: 10px 0; font-style: italic; font-size: 14px; orphans: 2; }\n";  
 
 
 Buildhtml += " video { \n";
   Buildhtml += "   width: 100%; \n";
   Buildhtml += "   height: auto; \n";
 Buildhtml += " } \n";
 
 
 Buildhtml += " </style>\n";     
        
        
Buildhtml += "</head>\n" ;

Buildhtml += "<main>\n" ;
Buildhtml += "<header id=\"header\" class=\"clearfix\">\n" ;

Buildhtml += ""+ document.getElementById("menu").value +"\n";





 Buildhtml += "<div  id=\"vga-video_player\" ><center>\n" ;
Buildhtml += "<P><br><p><P><br><p>	\n" ;

   Buildhtml += " <table class=\"center\">\n" ;
 
     Buildhtml += " <tr>\n" ;
       Buildhtml += " <td>\n" ;
    
   Buildhtml += " <div id=\"video_container\" >\n" ;
   Buildhtml += " <video id=\"vga_player\" preload=\"metadata\" playsinline   style=\"  height:450px;\">\n" ;
   Buildhtml += " <source src=\""+form.videoFile.value+"\" type=\"video/mp4\">\n" ;
   Buildhtml += " <source src=\"\" type=\"video/webm\">\n" ;

 
   Buildhtml += " </video>\n" ;
   Buildhtml += " <div id=\"video_controls_bar\"  style=\"font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; color:#ffffff;\">\n" ;
   Buildhtml += " &nbsp;&nbsp; <button id=\"playpausebtn\"><i class =\'fa fa-play\'></i></button>\n" ;
   Buildhtml += "   &nbsp;\n" ;
   Buildhtml += " <span id=\"curtimetext\">00:00</span> / <span id=\"durtimetext\">00:00</span>\n" ; 
   Buildhtml += " <input id=\"seekslider\" type=\"range\" min=\"0\" max=\"100\" value=\"0\" step=\"\" >\n" ;
   Buildhtml += " &nbsp;\n" ;
    Buildhtml += " <button id=\"mutebtn\"><i class =\'fa fa-volume-up\'></i></button>\n" ;
   Buildhtml += " &nbsp;&nbsp;\n" ;

     Buildhtml += " <input id=\"volumeslider\" type=\"range\" min=\"0\" max=\"100\" value=\"100\" step=\"1\">\n" ;
   Buildhtml += " &nbsp;\n" ;
   Buildhtml += " &nbsp;\n" ;

    Buildhtml += " <button id=\"fullscreenbtn\">\n" ;
   Buildhtml += " <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-arrows-fullscreen\" viewBox=\"0 0 16 16\">\n" ;
     Buildhtml += " <path fill-rule=\"evenodd\" d=\"M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z\"/>\n" ;
   Buildhtml += " </svg>\n" ;
   Buildhtml += " </button> &nbsp;\n" ;
    Buildhtml += " <p>\n" ;
         Buildhtml += "   <button ><img src=\""+ document.getElementById("station-img").value +"\" width=\"70\" height=\"20\" alt=\"\" class=\"img-responsive\"></button>&nbsp;&nbsp;\n" ;
           Buildhtml += "       </p>\n" ;
    Buildhtml += " </div>\n" ;
    Buildhtml += " </div>\n" ;
  
 Buildhtml += "</td>\n" ;
 
 Buildhtml += "<P><br><p><P><br><p>	\n" ;
	
    Buildhtml += "<td>\n" ;
   
Buildhtml += "<list id=\"playlist\"   align=\"rihgt\" >\n" ;

Buildhtml += ""+ document.getElementById("text2").value +"\n"; 

Buildhtml += "</list>\n";
Buildhtml += " <td>\n";

Buildhtml += "</table>\n";


Buildhtml += "</meter>";	    Buildhtml += "</header>\n";


Buildhtml += "<script src=\"https://vga.smtvs.com/playerfun-2.js\"><\/script>\n";
	

Buildhtml += "</main>\n";


Buildhtml += "</body>\n";
Buildhtml += "</html>\n";


  
       
    }
}
  
  
    
            if(Action==6){
            if(html!=null)  {

Buildhtml += "<!DOCTYPE html>\n" ;

Buildhtml += "<html lang=\"en\" itemscope=\"\" itemtype=\"\">\n" ;
Buildhtml += "<head>\n" ;
Buildhtml += "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n" ;
Buildhtml += " <link href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">\n" ;

   Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/"+form.Skin.value+"\">\n" ;
  
 
  Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/playerpage.css\">\n" ;
  
Buildhtml += "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\n" ;
 
   Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/playerfun-8.css\">\n" ; 
Buildhtml += " <link href=\"https://vga.smtvs.com/css/custom-styles.css\" rel=\"stylesheet\" >\n";
       Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/font-awesome/css/font-awesome.min.css\">\n";
       
        Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/bootstrap.min.css\">\n";
        Buildhtml += "	<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/custom-elements.css\">\n";
        Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/css/all.css\">\n";
  
        
     
  Buildhtml += "<style>\n";  
  
  
  Buildhtml += "div#video_controls_bar{ background: "+skin_color.value+"; padding:10px; color:#FFFFFF;}\n";

   Buildhtml += " * { margin: 0; padding: "+control_size.value+"; }\n";  
     Buildhtml += "  body {\n";  
      Buildhtml += "font: 16px/1.4 Georgia, Serif;\n";  
     
   Buildhtml += " }\n";  
   Buildhtml += " #page-wrap {\n";  
    Buildhtml += "	width: 50%;\n";  
     Buildhtml += " margin: 0px auto;\n";  
   Buildhtml += " }\n";  
   Buildhtml += " h1 { font-weight: normal; font-size: 42px; }\n";  
  Buildhtml += "  h1, p, pre, video, h2, figure, h3, ol, script, style { margin: 0 0 0px 0; }\n";  
   Buildhtml += " h2 { margin-top: 0px; }\n";  
   Buildhtml += " h1 { margin-bottom: 40px; }\n";  
   Buildhtml += " li { margin: 0 0 5px 20px; }\n";  
   Buildhtml += " article { background: white; padding: 10%; }\n";  
   Buildhtml += " pre, article style, article script {\n";  
   Buildhtml += " 	white-space: pre;\n";  
    Buildhtml += "	display: block;\n";  
    Buildhtml += "	padding: 10px;\n";  
    Buildhtml += "	background: #eee;\n";  
    	Buildhtml += "overflow-x: auto;\n";  
    	Buildhtml += "font: 12px Monaco, MonoSpace;\n";  
  Buildhtml += "  }\n";  

   Buildhtml += " img { max-width: 100%; }\n";  

   Buildhtml += " figure { display: block; background: #000; padding: 10px; }\n";  
  Buildhtml += "  figcaption { display: block; text-align: center; margin: 10px 0; font-style: italic; font-size: 14px; orphans: 2; }\n";  
 
 
 Buildhtml += " video { \n";
   Buildhtml += "   width: 100%; \n";
   Buildhtml += "   height: auto; \n";
 Buildhtml += " } \n";
 
 
 Buildhtml += " </style>\n";  
Buildhtml += "<link rel=\"stylesheet\" href=\"https://vga.smtvs.com/context-menu.css\">\n"; 
 
 Buildhtml += "  <script src=\"https://vga.smtvs.com/clipboard.js\"><\/script>\n"; 
  
Buildhtml += "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"><\/script>\n"
Buildhtml += "<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js\"><\/script>\n"
  	 
	 
 
        
Buildhtml += "</head>\n" ;

Buildhtml += "<main>\n" ;
Buildhtml += "<header id=\"header\" class=\"clearfix\">\n" ;

Buildhtml += ""+ document.getElementById("menu").value +"\n";


			Buildhtml += "<div id=\"contextMenu\" class=\"context-menu\" style=\"Z-INDEX: 2; display: none\"> \n" ;
       Buildhtml += " <ul class=\"menu\"> \n" ;
       Buildhtml += "<li class=\"rename\"><a href=\"#\">vga-video_player v1.0</a></li> \n" ;
         Buildhtml += "   <li class=\"share\"><a href=\"#\"   id=\"modal \" data-toggle=\"modal\" data-target=\"#myModal\"><i class=\"fa fa-share\" aria-hidden=\"true\"></i> Share</a></li> \n" ;
           
        Buildhtml += "    <li class=\"link\"><a  onclick=\"copyToClipboard()\" href=\"#\"><i class=\"fa fa-link\" aria-hidden=\"true\"></i> Copy Link Address</a></li> \n" ;
               
         Buildhtml += "   <li class=\"download\"><a href=\"#\" ><i class=\"fa fa-download\" aria-hidden=\"true\"></i> Download</a></li> \n" ;
           Buildhtml += "  </ul> \n";
   Buildhtml += " </div> \n";


Buildhtml += "<script src=\"https://vga.smtvs.com/contextMenu.js\"><\/script>\n";
	 
 Buildhtml += "<div  id=\"vga-video_player\" ><center>\n" ;
Buildhtml += "<P><br><p><P><br><p>	\n" ;

   Buildhtml += " <table class=\"center\">\n" ;
 
Buildhtml += " <div class=\"container\">\n" ;


Buildhtml += "<div id=\"myModal\" class=\"modal fade\" role=\"dialog\">\n" ;
 Buildhtml += " <div class=\"modal-dialog\">\n" ;

   
    Buildhtml += "<div class=\"modal-content\">\n" ;
      Buildhtml += "<div class=\"modal-header\">\n" ;
        Buildhtml += "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n" ;
Buildhtml += "<h4 class=\"modal-title\">Share to social network</h4>\n" ;
Buildhtml += "</div>\n" ;
Buildhtml += "<div class=\"modal-body\">\n" ;
      Buildhtml += "  <p>Some text in the modal.</p>\n" ;
Buildhtml += "</div>\n" ;
      
  Buildhtml += " </div>\n" ;

 Buildhtml += " </div>\n" ;
Buildhtml += "</div>\n" ;
     Buildhtml += " <tr>\n" ;
       Buildhtml += " <td>\n" ;
    
   Buildhtml += " <div id=\"video_container\" >\n" ;
   Buildhtml += " <video id=\"vga_player\" preload=\"metadata\" playsinline   style=\"  height:450px;\">\n" ;
   Buildhtml += " <source src=\""+form.videoFile.value+"\" type=\"video/mp4\">\n" ;
   Buildhtml += " <source src=\"\" type=\"video/webm\">\n" ;

 
   Buildhtml += " </video>\n" ;
   Buildhtml += " <div id=\"video_controls_bar\"  style=\"font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; color:#ffffff;\">\n" ;
   Buildhtml += " &nbsp;&nbsp; <button id=\"playpausebtn\"><i class =\'fa fa-play\'></i></button>\n" ;
   Buildhtml += "   &nbsp;\n" ;
   Buildhtml += " <span id=\"curtimetext\">00:00</span>/ <span id=\"durtimetext\">00:00</span>\n" ; 
   Buildhtml += " <input id=\"seekslider\" type=\"range\" min=\"0\" max=\"100\" value=\"0\" step=\"\" >\n" ;
   Buildhtml += " &nbsp;\n" ;
    Buildhtml += " <button id=\"mutebtn\"><i class =\'fa fa-volume-up\'></i></button>\n" ;
   Buildhtml += " &nbsp;&nbsp;\n" ;

     Buildhtml += " <input id=\"volumeslider\" type=\"range\" min=\"0\" max=\"100\" value=\"100\" step=\"1\">\n" ;
   Buildhtml += " &nbsp;\n" ;
   Buildhtml += " &nbsp;\n" ;

    Buildhtml += " <button id=\"fullscreenbtn\">\n" ;
   Buildhtml += " <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-arrows-fullscreen\" viewBox=\"0 0 16 16\">\n" ;
     Buildhtml += " <path fill-rule=\"evenodd\" d=\"M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z\"/>\n" ;
   Buildhtml += " </svg>\n" ;
   Buildhtml += " </button> &nbsp;\n" ;
    Buildhtml += " <p>\n" ;
         Buildhtml += "   <button ><img src=\""+ document.getElementById("station-img").value +"\" width=\"70\" height=\"20\" alt=\"\" class=\"img-responsive\"></button>&nbsp;&nbsp;\n" ;
           Buildhtml += "       </p>\n" ;
    Buildhtml += " </div>\n" ;
    Buildhtml += " </div>\n" ;
 
   
Buildhtml += "<list id=\"playlist\"   align=\"rihgt\" >\n" ;

Buildhtml += ""+ document.getElementById("text2").value +"\n"; 

Buildhtml += "</list>\n";
Buildhtml += " <td>\n";

Buildhtml += "</table>\n";


Buildhtml += "</meter>";	    Buildhtml += "</header>\n";


Buildhtml += "<script src=\"https://vga.smtvs.com/playerfun-2.js\"><\/script>\n";
	

Buildhtml += "</main>\n";


Buildhtml += "</body>\n";
Buildhtml += "</html>\n";


  
       
    }
}
  
  
    
    
  

form.Text2.value+=Buildhtml;
}
</script>


<script type="text/javascript">
    
    
   
    function View(form) {
        msg=open("","DisplayWindow","status=1,scrollbars=1");
        msg.document.write(form.Text2.value);
    }
    
    /* ---------------------------------------------------------------------- *\
     Function    : Generate HTML5 VideoPlayer()
     Description : HTML5 Video Player generator.
     \* ---------------------------------------------------------------------- */




function Generateform(form) {
    
    
    var txt="<video class=\""+form.Skin.value+"\" audio=\""+form.html5player_audio.value+"\" autoplay=\""+form.html5player_autoplay.value+"\" loop=\""+form.html5player_loop.value+"\" poster=\""+form.html5player_poster.value+"\" preload=\""+form.html5player_preload.value+"\" width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" controls  controlsList=\""+form.html5PlayerControls.value+"\">" ;
    
    
    
    if(form.text.value){
        
        txt+=""+form.text.value+"";
    }
    
    
    txt+="</video>";
    
    form.textarea.value=txt;
}


function Generateform2(form) {
    
    var txt="<audio  audio=\""+form.html5player_audio.value+"\" autoplay=\""+form.html5player_autoplay.value+"\" loop=\""+form.html5player_loop.value+"\" poster=\""+form.html5player_poster.value+"\" preload=\""+form.html5player_preload.value+"\" width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" controls  controlsList=\""+form.html5PlayerControls.value+"\">" ;
    
    
    if(form.text.value){
        
        txt+=""+form.text.value+"";
    }
    
    
    txt+="</audio>";
    
    form.textarea.value=txt;
}






function AddPlayerText(form, Action){
    var AddPlyTxt="";
    var plytxt="";
    
    if(Action==1) {
        if(plytxt!=null)
        
        AddPlyTxt="<source src=\""+form.videoFile.value+"\" type=\""+form.html5FileType.value+"\" />\r\n" ;
        
    }
    
    
    if(Action==2) {
        if(plytxt!=null)
        
        AddPlyTxt=" <track kind=\""+form.html5player_kind.value+"\" src=\""+form.html5player_captions.value+"\" srclang=\"en\" label=\"English\"></track>\r\n" ;
        
        
    }
    
    
    
    
    
    
    form.text.value+=AddPlyTxt;
}







function AddPlaylist(form, Action){
    var AddPlyl="";
    var plyl="";
    if(Action==1){
 if(plyl!=null)

AddPlyl="<a href=\""+form.videoFile.value+"\" class=\"currentvid\"><img src=\""+form.html5player_poster.value+"\" width=\"200\" class=\"img-responsive\"><p><time datetime=\"&gt;2021-02-13\" class=\"duration\">"+form.videoduration.value+"</time><p style=\"font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; color:#000;\"class=\"f-title\"> "+form.videotitle.value+"</p></a>\n";

  
 }
 
 
form.text2.value+=AddPlyl;
    
    
}



function AddPlayer(form, Action){
    var AddPly="";
    var ply="";
    if(Action==1){
        if(ply!=null)
        AddPly="<video   src=\""+form.videoFile.value+"\"  poster=\""+form.html5player_poster.value+"\" preload=\""+form.html5player_preload.value+"\"  width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" controls  controlsList=\""+form.html5PlayerControls.value+"\" type=\""+form.html5FileType.value+"\"></video>\r\n" ;
        
    }
    
    
    if(Action==4) {
        if(ply!=null)
        AddPly="<audio  src=\""+form.videoFile.value+"\"  preload=\""+form.html5player_preload.value+"\"   width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" controls  controlsList=\""+form.html5PlayerControls.value+"\"></audio>\r\n" ;
        
    }
    
    
    if(Action==5) {
        if(ply!=null)
        
        AddPly="<img src=\""+form.html5player_poster.value+"\"  width=\""+form.html5player_width.value+"\" >\r\n" ;
        
    }
    
    
    
    if(Action==6) {
        if(ply!=null)
        AddPly="<audio src=\""+form.videoFile.value+"\"    width=\""+form.html5player_width.value+"\"></audio>\r\n" ;
        
    }
    
    
    if(Action==7) {
        if(ply!=null)
        AddPly="<video  src=\""+form.videoFile.value+"\"  width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" controls  controlsList=\""+form.html5PlayerControls.value+"\" type=\""+form.html5FileType.value+"\"></video>\r\n" ;
        
    }
    if(Action==8){
        if(ply!=null)
        AddPly="<video class=\""+form.Skin.value+"\" src=\""+form.videoFile.value+"\" width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" type=\""+form.html5FileType.value+"\" id=\""+form.html5player_id.value+"\" poster=\""+form.html5player_poster.value+"\" preload=\""+form.html5player_preload.value+"\"></video>\n" ;
        
    }
    form.textarea.value+=AddPly;
}
</script>



<style type="text/css">
    @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
    body{margin-top:50px;background: rgb(36, 39, 41);}
    
    </style>


<style type="text/css">
    p > i:first-child
    {
        font-weight:bold;
        color:blue;
        
    } 
</style>
<style>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}

ul {
  list-style: none;
}
.context-menu { 
  position: absolute; 
} 
.menu {
  display: flex;
  flex-direction: column;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 10px 20px rgb(64 64 64 / 5%);
  padding: 10px 0;
}
.menu > li > a {
  font: inherit;
  border: 0;
  padding: 10px 30px 10px 15px;
  width: 100%;
  display: flex;
  align-items: center;
  position: relative;
  text-decoration: unset;
  color: #000;
  font-weight: 500;
  transition: 0.5s linear;
  -webkit-transition: 0.5s linear;
  -moz-transition: 0.5s linear;
  -ms-transition: 0.5s linear;
  -o-transition: 0.5s linear;
}
.menu > li > a:hover {
  background:#f1f3f7;
  color: #4b00ff;
}
.menu > li > a > i {
  padding-right: 10px;
}
.menu > li.trash > a:hover {
  color: red;
}
     </style>
    
       

   <script src="https://vga.smtvs.com/dragfile/jquery-1.10.2.js"></script>
   
   
   <link rel="stylesheet" href="https://vga.smtvs.com/dragfile/jquery-ui.css">
     
       <script src="https://vga.smtvs.com/dragfile/jquery-ui.js"></script>
       
   <style>
       #draggable { width: 150px; height: 150px; padding: 0.5em; }
       </style>
   <script>
       $(function() {
         $( "#draggable" ).draggable();
         $( "#html5videoplayer" ).draggable();
         $( "#captions" ).draggable();
         $( "#design" ).draggable();
         $( "#imagecapture" ).draggable();
         $( "#draggable5" ).draggable();
         $( "#draggable7" ).draggable();
         $( "#draggable8" ).draggable();
         $( "#draggable9" ).draggable();
         $( "#draggable10" ).draggable();
          $( "#source_code" ).draggable();
         });
       </script>
   
   <style>
       #resizable { width: 150px; height: 150px; padding: 0.5em; }
       #resizable h3 { text-align: center; margin: 0; }
       </style>
   
   <script>
       $(function() {
         $( "#resizable" ).resizable();
          $( "#resizable1" ).resizable1();
         });
       </script>
   
  

<link href="https://vga.smtvs.com/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://vga.smtvs.com/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://vga.smtvs.com/clipboard.js"></script> 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
                  
    
<body onload="init();">
<div id="contextMenu" class="context-menu" style="display: none"> 
        <ul class="menu"> <li class="title">VGA HTML5 Generator Studio</i>
          <li class="share"><a href="#"   id="modal " data-toggle="modal" data-target="#myModal"><i class="fa fa-share" aria-hidden="true"></i> Share</a></li> 
         <li class="rename"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Rename</a></li> 
            <li class="link"><a  onclick="copyToClipboard()" href="#"><i class="fa fa-link" aria-hidden="true"></i> Copy Link Address</a></li> 
            <li class="copy"><a href="#"><i class="fa fa-copy" aria-hidden="true"></i> Copy to</a></li> 
            <li class="paste"><a href="#"><i class="fa fa-paste" aria-hidden="true"></i> Move to</a></li> 
            <li class="download"><a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download</a></li> 
            <li class="trash"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li> 
        </ul> 
    </div> 

    <script>
       document.onclick = hideMenu; 
       document.oncontextmenu = rightClick; 

        function hideMenu() { 
            document.getElementById("contextMenu") 
                    .style.display = "none" 
        } 

        function rightClick(e) { 
            e.preventDefault(); 

            if (document.getElementById("contextMenu") .style.display == "block"){ 
                hideMenu(); 
            }else{ 
                var menu = document.getElementById("contextMenu")      
                menu.style.display = 'block'; 
                menu.style.left = e.pageX + "px"; 
                menu.style.top = e.pageY + "px"; 
            } 
        } 
    </script>  
    
    <div id="myModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Share to social network</h4>
</div>
<div class="modal-body">
  <p>Some text in the modal.</p>
</div>
 </div>
 </div>
</div>
    <form  method="post" action="" >
        
        
    
    
<div id="source_code" class="panel panel-default" style="Z-INDEX: 22; POSITION: absolute; OVERFLOW-Y: auto; OVERFLOW-X: hidden; display:none;TOP:100px; LEFT: 23px;width:1012px;" >
        <div class="panel-heading" >
            <IMG border=0   src="HTML5_Logo_32.png" > Code Editor
                </div>
        
        
        
        
        
        <div id="" style="position: absolute; LEFT:972px; TOP: 3px;  Z-INDEX: 0;">
            
            <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="hideSourceCode();return false;">
                <i class="fa  fa-plus-square"></i>
            </button></div>


       <p>
             HTML Code Editor
<div class="panel-body" id="g5">
<textarea class="form-control" rows="15" cols="160"  name="file"  id="Text2" style=" Z-INDEX: 2;    font-size: 19px; color:#0000FF; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; width: 100%; height:45%;">
<?php echo $loadfile; ?>
</textarea><P>

            
          
            <p>
               <input class="form-controls" type="text"  name="filename" id=data value="<?php echo $fname; ?>"  size="70" />
           
            <p>
            
            <input class="btn btn-default"type="submit" name="save_file" value="Save" style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" />
            
        </div> </div></div>



<!-- Template Page design  -->  
        
        <div   id="design" class="panel panel-default"  style="Z-INDEX: 27; POSITION: absolute; display:none; background-color:#C0C0C0 ;  WIDTH: 1080px; TOP:140px; LEFT: 70px" >
            <div class="panel-heading" >
                Design
            </div>
            
            <div id="" style="position: absolute; LEFT:1040px; TOP: 3px;  Z-INDEX: 0;">
                
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close "  onclick="hideDesign();return false;">
                    <i class="fa  fa-plus-square"></i>
                </button></div>
            <div class="panel-body"id="g5" >
               
                <iframe src="about:blank" name="preview" style="height:714px;width:1050px;border:solid 1px #b9b8b6;background:#ffffff" frameborder="0"  class="form-control">
                </iframe>
            </div></div></div>
    

    <div >

        
        
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="showSourceCode();return false;">
        <i class="fa  fa-plus-square"></i>SourceCode
    </button>
    
    
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="showDesign();return false;">
        <i class="fa  fa-plus-square"></i>Design
    </button>
  
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="showCaptions();return false;">
        <i class="fa  fa-plus-square"></i>Captions Generator
    </button>
   
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="showImageCapture();return false;">
        <i class="fa  fa-plus-square"></i>Image Capture
    </button>
    
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="showhtml5videoPlayer();return false;">
        <i class="fa  fa-plus-square"></i>html5 Player Generator

    <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onclick="Buildhtml(form,5);return false;">Playlist-to-Right-Page</button>
       <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onclick="Buildhtml(form,6);return false;">Playlis-to-buttomPage</button>
    
     <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onclick="Buildhtml(form,3);return false;">Generate html</button>
   
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Live Preview"  onclick="preview.document.write (document.getElementsByTagName ('TEXTAREA')[0].value); preview.document.close(); preview.focus(); showDesign(); return false;"style="font-family: arial, verdana, helvetica; font-size: 10px;width:85">
        <i class="fa fa-eye"></i>
    </button>


					<button type="button" class="btn btn-default" id="" data-toggle="tooltip" title="Web PreView " onclick="View(this.form);return false;">
            <i class="fa  fa-plus-square"></i>Web PreView
        </button>
    
 
					<button type="button" class="btn btn-default" id="" data-toggle="tooltip" title="Web PreView " onclick="View(this.form);return false;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
</svg>
        </button>
    

    
    <!-- html5 Gen  -->               
            
            <div  id="html5videoplayer"  class="panel panel-default" style="Z-INDEX: 0; position: absolute; display:none; left:80px;top:60px; background-color:#CECECE;" style="position:absolute;background-color:#121212;background-image:url();background-repeat:repeat;;background-position:left top;left:1351px;top:162px;width:207px;height:85px; border: 2px solid #E68282; border-color: #E68282 #650000 #650000 #9C2828;z-index:200" id="html5videoPlayer2">
                <div class="panel-heading"  >
                    <IMG border=0   src="HTML5_Logo_32.png" >  Video Player Generator
                        </div>
                <div id="" style="position: absolute; LEFT:940px; TOP: 4px;  Z-INDEX: 0;">
                    
                    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close "  onclick="hidehtml5videoPlayer();return false;">
                        <i class="fa  fa-plus-square"></i>
                    </button></div>
                    <div class="panel-body" id="g5">
                
                    <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85"  onClick="Generateform(this.form);return false;">Generate Video Player</button>
                    
                    <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onClick="Generateform2(this.form);return false;">Generate Audio Player</button>
                   
                   
                   <input class="btn btn-default" type="button" value="Insert  Video Player" size="30" onclick="AddPlayer(form,7);return false;" style="font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; width: 125px;" />
                   <input type="submit"  class="btn btn-default"  value="  Source Type " onClick="AddPlayerText(this.form,1);return false;" style="font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; width: 90px;"  >
                       
                       <input type="submit"class="btn btn-default"  class="btn btn-default"  value="   Track  " onClick="AddPlayerText(this.form,2);return false;" style="font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; width: 90px;"  >
                   
                   
                            
 <button class="btn btn-default" type="button" id="" name="" value=""onclick="Buildhtml5(form,1);return false;"style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" >Custom Player1</button>
                        
 <button class="btn btn-default" type="button" id="" name="" value=""onclick="Buildhtml5(form,2);return false;"style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" >Custom Player2</button>
            
 <button class="btn btn-default" type="button" id="" name="" value=""onclick="Buildhtml5(form,3);return false;"style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" >Custom Player3</button>
                             
 <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onclick="AddPlaylist(form,1);return false;">Insert List </button>
                  
                   
                   
                   
                   
                     <div id="" style="display: none;")>
                               <button id="loadVideo" return false;>Load</button>
                           </div>
                           
                           
<div id="status" style="Z-INDEX: 150; position: absolute; left:360px;top:100px; ">

                   <video id="my_video"  style="border: 1px solid blue;background-color: #020202;" height="350" width="560">
                       HTML5 Video is required for this example
                   </video>
                   
                   
                   
                   
                   
                   <div id="buttonbar" style="display: none;")>
                         Length(seconds): <span id="vLen"></span>
                       Current time:  <span id="curTime" title="Current time"></span> 
                       Remaining time: <span id="vRemaining" title="Remaining time"></span>
                       <input type="range" id="seek-bar" value="0">
                       <button id="restart"  onClick="return false;" title="Restart playback button"><i class ="fa fa-repeat "></i></button>
                       
                       <button id="rew"  onClick="return false;" ><i class ="fa   fa-backward" ></i></button>
                       <button id="play" onClick="Generateform(this.form); return false;"  ><i class ="fa fa-play" ></i></button>
                       <button id="fwd"  onClick="return false;" ><i class ="fa  fa-forward" ></i></button>
                      
                       
                  
                         
                     
                     
                     
                        <button id="mute" onClick="return false;" title="Mute button" ><istyle="font-family: arial, verdana, helvetica; font-size: 10px;width:15">Mute</i></button>
        
  <button type="button" id="full-screen" title="full-screen"  > <i class ='fa fa-external-link'></i></button>
                        <br /> 
                         <label style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;" >  Volume </label>
                       <input type="range" style="size:10" id="volume-bar" min="0" max="1" step="0.1" value="1">
                      <br />
                   </div>
                    </div>

                   <P><br/>

                                 <div id= "inputField"  >
                                      <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Station ID:</span>
                                    <P>
                                    <input class="form-control" type="text" id="station-img" value="https://vga.smtvs.com/logo/logo.png" style=" width:310px;"/>
                                      
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Video Title:</span>
                                    <P>
                                    <input class="form-control" type="text" id="videotitle" value="" style=" width:310px;"/>
                                        <P>
                                        <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Video Duration:</span>
                                         <input class="form-control" type="text" id="videoduration" value="" style=" width:310px;"/>
                                    
                                    </div>

                                   
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Player src:</span>
                                    <P>
                                    <div id= "inputField"  >
                                        <input class="form-control" type="text" id="videoFile" value=" " style=" width:310px;"/>
                                        
                                    </div>
                                    <div id="errorMsg" style="color:Red;" ></div>
                                     <P><BR>

                                                                      <select class="form-control" name="" id="html5FileType" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 30%;">
                                        <option value="">MediaType</option>
                                        <option value="video/ogg">video ogg</option>
                                        <option value="video/mp4">video mp4</option>
                                        <option value="video/webm">video webm</option>
                                        <option value="audio/ogg">audio ogg</option>
                                        <option value="audio/mpeg">audio mpeg</option>
                                        <option value="application/x-mpegURL">playlist</option>
                                        <option value="video/youtube">video/youtube</option>
                                        
                                    </select>
                                    
                                    <P>
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Captions-Subtitles </span>
                                    <P>
                                    <input class="form-control" type="text" name="html5player_captions" value=" demo.captions.vtt" size="45" size="45"style=" width:310px;" /><P>
                                    <select class="form-control" name="" id="html5player_kind" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 30%;">
                                        <option value="">Captions Type</option>
                                        <option value="captions">Captions</option>
                                        <option value="subtitles">Subtitles</option>
                                    </select>
                                                  <select class="form-control" name="" id="Skin" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 30%;">
                                        <option value="">Skin Type</option>
                                        
                                        <option value="playerfun.css">Skin 1</option>
                                        <option value="playerfun-2.css">Skin 2</option>
                                        <option value="playerfun-3.css">Skin 3</option>
                                        <option value="playerfun-4.css">Skin 4</option>
                                        <option value="playerfun-5.css">Skin 5</option>
                                          <option value="playerfun-6.css">Skin 6</option>
                                   
                                     <option value="playerfun-7.css">Skin 7</option>
                                        <option value="vplayerfun.css">Skin 8</option>
                                        <option value="playerfun-9.css">Skin 9</option>
                                        <option value="playerfun-10.css">Skin 10</option>
                                        <option value="playerfun-11.css">Skin 11</option>
                                          <option value="playerfun-12.css">Skin 12</option>
                                   <option value="playerfun-13.css">Skin 13</option>
                                          <option value="playerfun-14.css">Skin 14</option>
                                   
                                    </select>
                                    
                                    
                                    
                                     </p><p>
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Controls Size </span>
                                    </p><p>
                                
                                    
                                    
                                    
                                    
                      
<!-- --------------------------------
  Function    :Set color-table Properties Tag  
  Description color-table Properties
 ----------------------------------------------------------------------> 

<?php include('color-table-2.php'); ?>	
              
                                    
                                  
                                    
                                   
                                    
                                    
                                    <P>
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Player ID</span>
                                    <BR>
                                    <input class="form-control" type="text" name="html5player_id" value="video1" size="45"style=" width:310px;" /><P>
                                    
                                    
                                    <P>



                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Player Poster</span>
                                    <BR>
                                    <input class="form-control" type="text" name="html5player_poster" value="" size="45"style=" width:310px;" /><P>
                                    
                                    
                                    
                                    
                                    
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Player Width:</span><BR>
                                    <input class="form-control" type="text" name="html5player_width" value="" size="18" style=" width:90px;" /><P>
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;"> Player Height:</span><br>
                                    
                                    <input class="form-control" type="text" name="html5player_height" value="" size="18" size="45"style=" width:90px;" />
                                    <P>
                                    <P>
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;"> Player TableSize-x-y :</span><br>
                                    
                                    <input class="form-control" type="text" name="tablesize" value="" size="18" size="45"style=" width:90px;" />
                                    <P>
                                    <select class="form-control" name="" id="html5player_audio" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 30%;">
                                        <option value="">Audio</option>
                                        <option value="muted">Muted</option>
                                        <option value="none">none</option>
                                    </select>
                                    
                                    <P>
                                    <select class="form-control" name="" id="html5player_autoplay" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 30%;">
                                        <option value="">Autoplay</option>
                                        <option value="autoplay">Autoplay</option>
                                        <option value="none">none</option>
                                        
                                    </select>
                                    
                                    <P>
                                    
                                    
                                    <select class="form-control" name="" id="html5player_loop" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 30%;">
                                        <option value="">Loop</option>
                                        <option value="loop">Loop</option>
                                        <option value="none">none</option>
                                    </select>
                                    
                                    <P>
                                    
                                    <select class="form-control" name="" id="html5player_preload" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 30%;">
                                        <option value="">Preload</option>
                                        <option value="preload">preload</option>
                                        <option value="none">none</option>
                                    </select><P>
                                    
                                    
                                    <P>
                                    <select class="form-control" name="" id="html5PlayerControls" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 30%;">
                                        <option value="">Controls</option>
                                        <option value="controls">On</option>
                                       <option value="nodownload">nodownload</option>
                                        <option value="nofullscreen">nofullscreen</option>
                                       <option value="noremoteplayback">noremoteplayback</option>
                                       <option value="nodownload nofullscreen noremoteplayback">nodownload nofullscreen noremoteplayback</option>
                                       
                                       
                                       
                                        <option value="none">none</option>
                                    </select>
                                    <P><BR>
                                    
                                    
                                    <div style="Z-INDEX: 0; POSITION: absolute; OVERFLOW-Y: auto; OVERFLOW-X: hidden; TOP:620px; LEFT: 370px;">
                                        <H6>Video Embad Source Code:<H6>
                                            <textarea class="form-control" rows="6" cols="900" id="textarea" wrap="soft" onclick="focus(this.code)"style=" Z-INDEX: 0; OVERFLOW-Y: auto; OVERFLOW-X: hidden; width:570px;" >
                                            </textarea>
                                            <H6>Video Source Code:<H6>
                                                <textarea class="form-control" rows="6" cols="90" name="file" value="" id="text" style=" Z-INDEX: 0; OVERFLOW-Y: auto; OVERFLOW-X: hidden; width:570px;">
                                                    
                                                </textarea>
                                                 <H6>Video Playlisy Code:<H6>
                                                <textarea class="form-control" rows="6" cols="90" name="file" value="" id="text2" style=" Z-INDEX: 0; OVERFLOW-Y: auto; OVERFLOW-X: hidden; width:570px;">
                                                    
                                                </textarea>
                                    </div>
                </div>
                
            </div></div>
     
 
<!-- Captions -->   
    
   <div id="captions" class="panel panel-default" style="Z-INDEX: 22; POSITION: absolute;   OVERFLOW-Y: auto; OVERFLOW-X: hidden; display:none; TOP:75px; LEFT: 100px;width:592px;" >
        <div class="panel-heading" >
            
            <button type="button" class="btn btn-default" id="g5" data-toggle="tooltip" title="Close " onClick="hideCaptions();return false;">
                <i class="fa  fa-plus-square"></i>
            </button> <IMG border=0   src="HTML5_Logo_32.png" >   Audio/Video Player Captions Generator
                </div>
        
        <div id="" style="position: absolute; LEFT:552px; TOP: 3px;  Z-INDEX: 0;">
           </div>

        <div class="panel-body" id="g">
            
            <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onclick="Buildhtml(form,2);return false;">InsertHead</button>
            <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onclick="Buildhtml(form,1);return false;"> Add Captions</button>
          <br/>
            Starting-time:<p>
            <input class="form-controls " type="text" id="start"  style="border:solid 1px #b9b8b6;color:#000000"value="00:00.700" size="30"/><p>
            Ending-time:<p>
            <input class="form-controls" type="text" id="nend" style="border:solid 1px #b9b8b6;color:#000000" value="00:04.110"  size="30" /><p>
         
            
            Captions Code:<p>
            <textarea class="form-controls"  name=""  id="cText" rows="5" cols="70"  style="border:solid 1px #b9b8b6;color:#000000"> Captions describe all relevant audio for the hearing impaired.
                [ Heroic music playing for a seagull ]</textarea>
                    </div>
            
               </div>
    </div>
         
   
<!-- image capture  -->  
    
    
          <div id="imagecapture" class="panel panel-default" style="Z-INDEX: 22; POSITION: absolute; OVERFLOW-Y: auto; OVERFLOW-X: hidden; display:none; TOP:75px; LEFT: 100px;width:502px;" >
            <div class="panel-heading" >
               
                <button type="button" class="btn btn-default" id="g5" data-toggle="tooltip" title="Close " onClick="hideImageCapture();return false;">
                    <i class="fa  fa-plus-square"></i>
                </button> <IMG border=0   src="HTML5_Logo_32.png" >  Image Capture
                    </div>
            
            <div id="" style="position: absolute; LEFT:552px; TOP: 3px;  Z-INDEX: 0;">
                </div>

            <div class="panel-body" id="g"    >
             <p  style="border:solid 1px #b9b8b6;color:#000000"> How to Capture image frame from video , play video then  Pause to Capture frame <br>
              Right click mouse to save image to your disktop</p>

            <br />
            The Image Canvas
            <br />
            <canvas id="thecanvas">
            </canvas><hr>
            <br />
            
            
            
            
        </div></div>
 
   
   

<textarea class="form-control" rows="6" cols="90" name="" value="" id="menu" style=" Z-INDEX: 0; OVERFLOW-Y: auto; OVERFLOW-X: hidden; width:570px;display: none;">
                                                  
      
			
			
	<div class="clearfix">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="header-holder">
					<div class="navbar-header clearfix">
						<!-- <button id="left_opner" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"></button> -->
						
						<h1 class="logo">
							<a href="https://igrademusic.smtvs.com/">
								<img src="./logo/logo.png" alt="cbtune" class="img-responsive" width="1%">
								<span></span>
							</a>
						</h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="menu-holder">
							<div class="col search">
								<form id="search" class="search-form" name="search" method="get" role="search" action="https://igrademusic.smtvs.com/video.php?id=20">
									<a href="javascript:void(0)" class="close-search icon-arrow-back visible-xs"></a>
									<div class="input-group cbsearchtype">
										<input type="text" class="form-control" name="query" placeholder="Search keyword here" value="" id="query">
										<div class="input-group-btn">
											<input type="hidden" name="type" class="type" value="videos" id="type">
																																			</ul>
                                                                         <svg tabindex="-1" type="submit" name="cbsearch" id="cbsearch" class="svg-inline--fa fa-search fa-w-16 btn btn-default btn-search" aria-hidden="true" data-prefix="fa" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg><!-- <button tabindex="-1" type="submit" name="cbsearch" id="cbsearch" class="btn btn-default fa fa-search btn-search"></button> -->
										</div>
									</div>
								</form><!-- form Ends -->
							</div>
						
						
											</div>
						</div>
					</div><!--navbar-collapse-->
				</div>
			</nav></div><!--container-fluid-->
		
	
	
	</header>
		
      
        <!--/.nav-collapse -->
      
    
        <!--/.nav-collapse -->
      
				
			    
                                                </textarea>

    
    
    
    
<br/>

</form >
<br/><br/><br/><br/><br/><center><H2>

VGA HTML5 Generator Studio</H2></center>
<br/><br/><br/><br/><br/><center><H5>
<div style="Z-INDEX: 20; POSITION: absolute; OVERFLOW-Y: auto; OVERFLOW-X: hidden; TOP:925px; LEFT: 933px;width:420px;" >


 </body>
</html>                   
                       
