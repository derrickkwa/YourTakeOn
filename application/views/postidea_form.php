<div class="content">
<div class="main">
<?php
    $titleinput = array(
		'name' 	=> 'title',
		'id'       	=> 'title',
		'value'   	=> '',
		'maxlength'	=> '60'
   	);
			
	$blurb = array(
		'name'		=> 'blurb',
		'id'		=> 'blurb',
		'value'		=> '',
		'maxlength'	=> '255'
	);
	
	echo form_open('/idea/add', array('id'=>'postidea','name'=>'postidea'));
	echo '<div>';
    echo form_label('Title:','title');
    echo form_input($titleinput);
	echo '</div><div>';
	echo form_label('Description:','blurb');
	echo form_input($blurb);
	echo '</div>';
?>
<input type="hidden" id="vid_url" name="vid_url" />
<script type="text/javascript" src="http://localhost/yourtakeon/public/videorecorder/js/swfobject.js"></script>    
                 <script type="text/javascript">

                 function getFlashMovie(movieName)
                 {
                  var isIE = navigator.appName.indexOf("Microsoft") != -1;
                  return (isIE) ? window[movieName] : document[movieName];
                 }  
   
                 var params = { allowScriptAccess: "always", allowFullScreen: "true", flashvars:""};
                 var atts = { id: "recorder" };
                 swfobject.embedSWF("http://localhost/yourtakeon/public/videorecorder/recorder.swf", "recorder", "320", "295", "8", null, null, params, atts);

                 function onRecordPublished(obj)
                 {
	                  $('#vid_url').val(obj.filename);
	                  $('#postidea').submit();
	                 // alert(obj.duration);
                 }

                 </script>
         
        </head>
        
     <div id="recorder">
      You need Flash player 8+ and JavaScript enabled to view this video.
     </div>
     <div>
<?php 
     //echo form_button($postidea);
	echo form_close();
?>
</div>
</div>
</div>
