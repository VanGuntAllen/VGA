<!DOCTYPE HTML >
<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <META name="AUTHOR" content="Van-Gunt Allen -vanguntallen@gmail.com">
            <META name="KEYWORDS" content="HTML5 TV Page  generator">
                <META name="DESCRIPTION" content="HTML5 Audio Video Player generator">
                    <META NAME="VGA HTML5 Studio Generator" CONTENT="VCMS">
                        <TITLE> HTML5 video-studio </TITLE>
                       
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
                       
                       
                       
                       
                        <head>
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

<script type="text/javascript">
    
    
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
        Buildhtml += "<title>";  Buildhtml += " </title>\n";
        
        Buildhtml += "<head>\n";
        
        Buildhtml += "<body>\n";
         Buildhtml += "<center>\n";
        Buildhtml += ""+ document.getElementById("textarea").value +"\n";
         Buildhtml += "</center>\n";
        
        
        Buildhtml += "</body>\n";
        Buildhtml += "</html>";
        
        
    }
}

form.cap.value+=Buildhtml;
}
</script>


<script type="text/javascript">
    
    
    <!-- Begin
    function View(form) {
        msg=open("","DisplayWindow","status=1,scrollbars=1");
        msg.document.write(form.cText.value);
    }
    
    /* ---------------------------------------------------------------------- *\
     Function    : Generate HTML5 VideoPlayer()
     Description : HTML5 Video Player generator.
     \* ---------------------------------------------------------------------- */




function Generateform(form) {
    
    
    var txt="<video class=\""+form.Skin.value+"\" audio=\""+form.html5player_audio.value+"\" autoplay=\""+form.html5player_autoplay.value+"\" loop=\""+form.html5player_loop.value+"\" poster=\""+form.html5player_poster.value+"\" preload=\""+form.html5player_preload.value+"\" width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" controls=\""+form.html5PlayerControls.value+"\">" ;
    
    
    
    if(form.text.value){
        
        txt+=""+form.text.value+"";
    }
    
    
    txt+="</video>";
    
    form.textarea.value=txt;
}


function Generateform2(form) {
    
    var txt="<audio  audio=\""+form.html5player_audio.value+"\" autoplay=\""+form.html5player_autoplay.value+"\" loop=\""+form.html5player_loop.value+"\" poster=\""+form.html5player_poster.value+"\" preload=\""+form.html5player_preload.value+"\" width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" controls=\""+form.html5PlayerControls.value+"\">" ;
    
    
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









function AddPlayer(form, Action){
    var AddPly="";
    var ply="";
    if(Action==1){
        if(ply!=null)
        AddPly="<video   src=\""+form.videoFile.value+"\"  poster=\""+form.html5player_poster.value+"\" preload=\""+form.html5player_preload.value+"\"  width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" controls=\""+form.html5PlayerControls.value+"\" type=\""+form.html5FileType.value+"\"></video>\r\n" ;
        
    }
    
    
    if(Action==4) {
        if(ply!=null)
        AddPly="<audio  src=\""+form.videoFile.value+"\"  preload=\""+form.html5player_preload.value+"\"   width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" controls=\""+form.html5PlayerControls.value+"\"></audio>\r\n" ;
        
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
        AddPly="<video  src=\""+form.videoFile.value+"\"  width=\""+form.html5player_width.value+"\" height=\""+form.html5player_height.value+"\" controls=\""+form.html5PlayerControls.value+"\" type=\""+form.html5FileType.value+"\"></video>\r\n" ;
        
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

   <script src="http://html5studio/dragfile/jquery-1.10.2.js"></script>
   
   
   <link rel="stylesheet" href="http://html5studio/dragfile/jquery-ui.css">
     
       <script src="http://html5studio/dragfile/jquery-ui.js"></script>
       
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
          $( "#resizable1" ).resizable();
         });
       </script>
   
  

<link href="http://html5studio.smtvs.com/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="http://html5studio.smtvs.com/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
                        <body onload="init();">
                            <form  method="post" action="" >
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="showSourceCode();return false;">
        <i class="fa  fa-plus-square"></i>SourceCode
    </button>
    
    
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="showDesign();return false;">
        <i class="fa  fa-plus-square"></i>Design
    </button>
  
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="showCaptions();return false;">
        <i class="fa  fa-plus-square"></i>Captions Generator
    </button>
    
    </button>
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="showImageCapture();return false;">
        <i class="fa  fa-plus-square"></i>Image Capture
    </button>
    
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="showhtml5videoPlayer();return false;">
        <i class="fa  fa-plus-square"></i>html5 Player Generator
    </button>
    
     <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onclick="Buildhtml(form,3);return false;">Generate html</button>
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Live Preview"  onclick="preview.document.write (document.getElementsByTagName ('TEXTAREA')[0].value); preview.document.close(); preview.focus(); showDesign(); return false;"style="font-family: arial, verdana, helvetica; font-size: 10px;width:85">
        <i class="fa fa-eye"></i>
    </button>

    <div id="source_code" class="panel panel-default" style="Z-INDEX: 22; POSITION: absolute; OVERFLOW-Y: auto; OVERFLOW-X: hidden; display:none;TOP:100px; LEFT: 23px;width:1012px;" >
        <div class="panel-heading" >
            <IMG border=0   src="http://html5studio/images/HTML5_Logo_32.png" > Code Editor
                </div>
        
        <div id="" style="position: absolute; LEFT:972px; TOP: 3px;  Z-INDEX: 0;">
            
            <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="hideSourceCode();return false;">
                <i class="fa  fa-plus-square"></i>
            </button></div>

                   <p>
            Captions / HTML Code Editor
            <textarea class="form-controls" name="" id="cap" rows="33" cols="160"></textarea>
            <p>
            
            <input class="form-controls" type="text" id="end" value=" "  size="70" />
            <p>
            
            <input class="btn btn-default"type="submit" name="save-cap" value="Save" style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" />
            
        </div> </div>


    <div id="captions" class="panel panel-default" style="Z-INDEX: 22; POSITION: absolute;   OVERFLOW-Y: auto; OVERFLOW-X: hidden; display:none; TOP:75px; LEFT: 100px;width:592px;" >
        <div class="panel-heading" >
            <IMG border=0   src="http://html5studio/images/HTML5_Logo_32.png" >   Audio/Video Player Captions Generator
                </div>
        
        <div id="" style="position: absolute; LEFT:552px; TOP: 3px;  Z-INDEX: 0;">
            
            <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="hideCaptions();return false;">
                <i class="fa  fa-plus-square"></i>
            </button></div>

        <div class="panel-body">
            
            <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onclick="Buildhtml(form,2);return false;">InsertHead</button>
            <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onclick="Buildhtml(form,1);return false;"> Add Captions</button>
          <br/>
            Starting-time:<p>
            <input class="form-controls " type="text" id="start" value="00:00.700" size="30"/><p>
            Ending-time:<p>
            <input class="form-controls" type="text" id="nend" value="00:04.110"  size="30" /><p>
         
            
            Captions Code:<p>
            <textarea class="form-controls"  name=""  id="cText" rows="5" cols="90">Captions describe all relevant audio for the hearing impaired.
                [ Heroic music playing for a seagull ]</textarea>
                    </div>
            
               </div>
    </div>
          <div id="imagecapture" class="panel panel-default" style="Z-INDEX: 22; POSITION: absolute; OVERFLOW-Y: auto; OVERFLOW-X: hidden; display:none; TOP:75px; LEFT: 100px;width:592px;" >
            <div class="panel-heading" >
                <IMG border=0   src="http://html5studio/images/HTML5_Logo_32.png" >  Image Capture
                    </div>
            
            <div id="" style="position: absolute; LEFT:552px; TOP: 3px;  Z-INDEX: 0;">
                
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close " onClick="hideImageCapture();return false;">
                    <i class="fa  fa-plus-square"></i>
                </button></div>

            <div class="panel-body">
              How to Capture image frame from video , play video then  Pause to Capture frame <p>
              Right click mouse to save image to your disktop

            <br />
            The Canvas
            <br />
            <canvas id="thecanvas">
            </canvas><hr>
            <br />
            The Image
            <br />
            <img id="thumbnail_img" alt="Right click mouse to save image to your disktop" />
            <br />
            
            
            
        </div></div>
    <div  >
        
        <div   id="design" class="panel panel-default"  style="Z-INDEX: 27; POSITION: absolute; display:none; background-color:#C0C0C0 ;  WIDTH: 1080px; TOP:140px; LEFT: 70px" >
            <div class="panel-heading" >
                Page Design
            </div>
            
            <div id="" style="position: absolute; LEFT:1040px; TOP: 3px;  Z-INDEX: 0;">
                
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close "  onclick="hideDesign();return false;">
                    <i class="fa  fa-plus-square"></i>
                </button></div>
            <div class="panel-body">
               
                <iframe src="about:blank" name="preview" style="height:714px;width:1050px;border:solid 1px #b9b8b6;background:#ffffff" frameborder="0"  class="form-control">
                </iframe>
            </div></div></div>
    

    <div >
    
            
            
            
            <div  id="html5videoplayer"  class="panel panel-default" style="Z-INDEX: 0; position: absolute; display:none; left:80px;top:60px; background-color:#CECECE;" style="position:absolute;background-color:#121212;background-image:url();background-repeat:repeat;;background-position:left top;left:1351px;top:162px;width:207px;height:85px; border: 2px solid #E68282; border-color: #E68282 #650000 #650000 #9C2828;z-index:200" id="html5videoPlayer2">
                <div class="panel-heading" >
                    <IMG border=0   src="http://html5studio/images/HTML5_Logo_32.png" >  Video Player Generator
                        </div>
                <div id="" style="position: absolute; LEFT:890px; TOP: 3px;  Z-INDEX: 0;">
                    
                    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Close "  onclick="hidehtml5videoPlayer();return false;">
                        <i class="fa  fa-plus-square"></i>
                    </button></div>
                <div class="panel-body">
                    <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85"  onClick="Generateform(this.form);return false;">Generate Video Player</button>
                    
                    <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onClick="Generateform2(this.form);return false;">Generate Audio Player</button>
                   
                   
                   <input class="btn btn-default" type="button" value="Insert  Video Player" size="30" onclick="AddPlayer(form,7);return false;" style="font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; width: 125px;" />
                   <input type="submit"  class="btn btn-default"  value="  Source Type " onClick="AddPlayerText(this.form,1);return false;" style="font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; width: 90px;"  >
                       
                       <input type="submit"class="btn btn-default"  class="btn btn-default"  value="   Track  " onClick="AddPlayerText(this.form,2);return false;" style="font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; width: 90px;"  >
                   
                   
                   
                   
                   
                   
                   
                   
                   
                           
                           <button class="btn btn-default"type="button" name="" value=""style="font-family: arial, verdana, helvetica; font-size: 10px;width:85" onclick="AddPlayer(form,5);return false;">Insert Image </button>
                           <div id="" style="display: none;")>
                               <button id="loadVideo" >Load</button>
                           </div>
                           
                           <input class="btn btn-default" type="button" value="Insert  AudioPlayer" size="30" onclick="AddPlayer(form,6);return false;" style="font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; width: 125px;" />
                           
                           
                           <input type="submit" class="btn btn-default"  value="  Media player " onClick="AddPlayer(form,8);return false;" style="font-size: 10px; font-family: arial, verdana, helvetica, sans serif; margin-left: 1px; width: 100px;"  >
                               <div id="" style="display: none;")>
                                   <button id="loadVideo" >Load</button>
                               </div>
<div id="status" style="Z-INDEX: 150; position: absolute; left:360px;top:100px; ">

                   <video id="my_video"  style="border: 1px solid blue;background-color: #020202;" height="350" width="560">
                       HTML5 Video is required for this example
                   </video>
                   <div id="buttonbar" style="display: none;")>
                       
                       <button id="restart"  onClick="return false;" title="Restart playback button"><i class ="fa fa-repeat "></i></button>
                       <button id="slower"  onClick="return false;" title="Slower playback button"> <i class ="fa fa-fast-backward" ></i></button>
                       <button id="rew"  onClick="return false;" ><i class ="fa   fa-backward" ></i></button>
                       <button id="play" onClick="Generateform(this.form); return false;"  ><i class ="fa fa-play" ></i></button>
                       <button id="fwd"  onClick="return false;" ><i class ="fa  fa-forward" ></i></button>
                       <button id="faster"   onClick="return false;" title="Faster playback button"><i class ="fa fa-fast-forward"></i></button>
                         <br /> <br />
                       <label>Playback </label>
                       <label>Reset playback rate: </label><button onClick="return false;" id="normal" title="Reset playback rate button"> <i class ="fa fa-refresh "></i></button>
                  
                  
                         
                     
                     
                     
                       <label>  Volume </label>
                       <button id="volDn" onClick="return false;" title="Volume down button"><i class ="fa fa-volume-down"></i></button>
                       <button id="volUp"  onClick="return false;"title="Volume up button"><i class ="fa fa-volume-up"></i></button>
                       <button id="mute" onClick="return false;" title="Mute button" ><istyle="font-family: arial, verdana, helvetica; font-size: 10px;width:15">Mute</i></button>

                   </div>
                
                   <div id="status" style="Z-INDEX: 150; position: absolute; left:260px;top:350px; ">
                       Length(seconds): <span id="vLen"></span>
                       Current time:  <span id="curTime" title="Current time"></span> <br/> Remaining time: <span id="vRemaining" title="Remaining time"></span></div>
                   </div>

                   <P><br/>


                                    <BR>
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Player src:</span>
                                    <P>
                                    <div id= "inputField"  >
                                        <input class="form-control" type="text" id="videoFile" value="v-15.mp4" style=" width:310px;"/>
                                        
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
                                    
                                    
                                    
                                    <P>
                                    <P>
                                    <select class="form-control" name="" id="Skin" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 30%;">
                                        <option value="">Skin Type</option>
                                        <option value="video-js vjs-default-skin">video-js vjs-default-skin</option>
                                        <option value="mejs-wmp">mejs-wmp</option>
                                        <option value="mejs-ted">mejs-ted</option>
                                    </select>
                                    
                                    
                                    <P>
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Player ID</span>
                                    <BR>
                                    <input class="form-control" type="text" name="html5player_id" value="video1" size="45"style=" width:310px;" /><P>
                                    
                                    
                                    <P>



                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Player Poster</span>
                                    <BR>
                                    <input class="form-control" type="text" name="html5player_poster" value="your url" size="45"style=" width:310px;" /><P>
                                    
                                    
                                    
                                    
                                    
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Player Width:</span><BR>
                                    <input class="form-control" type="text" name="html5player_width" value="" size="18" style=" width:90px;" /><P>
                                    <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;"> Player Height:</span><br>
                                    
                                    <input class="form-control" type="text" name="html5player_height" value="" size="18" size="45"style=" width:90px;" />
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
                                        <option value="none">none</option>
                                    </select>
                                    <P><BR>
                                    
                                    
                                    <div style="Z-INDEX: 0; POSITION: absolute; OVERFLOW-Y: auto; OVERFLOW-X: hidden; TOP:520px; LEFT: 350px;">
                                        <H6>Video Embad Source Code:<H6>
                                            <textarea class="form-control" rows="6" cols="900" id="textarea" wrap="soft" onclick="focus(this.code)"style=" Z-INDEX: 0; OVERFLOW-Y: auto; OVERFLOW-X: hidden; width:570px;" >
                                            </textarea>
                                            <H6>Video Source Code:<H6>
                                                <textarea class="form-control" rows="6" cols="90" name="file" value="" id="text" style=" Z-INDEX: 0; OVERFLOW-Y: auto; OVERFLOW-X: hidden; width:570px;">
                                                    
                                                </textarea>
                                    </div>
                </div>
                
            </div></div>
        


    
    
    
    
<br/>
</form >


VGA HTML5 Generator Studio</H2></center>

</div>

 </body>
</html>
