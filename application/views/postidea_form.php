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
	
	echo form_open('/post/add', array('id'=>'postidea','name'=>'postidea'));
	echo '<div>';
    echo form_label('Title:','title');
    echo form_input($titleinput);
	echo '</div><div>';
	echo form_label('Description:','blurb');
	echo form_input($blurb);
	echo '</div>';
?>
<div>
	<label for="type">Post Type</label>
	<input type="radio" name="type" id="type" value="pitch"> Pitch &nbsp;
	<input type="radio" name="type" id="type" value="music"> Music &nbsp;
	<input type="radio" name="type" id="type" value="other"> Others &nbsp;
</div>
<input type="hidden" id="vid_url" name="vid_url" />
<div>
	Record:<br />
	
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/xajax.js"></script><!--REMOVE WHEN MIGRATED TO PRODUCTION SERVER-->
	
<script type="text/javascript" src="<?php echo base_url(); ?>public/videorecorder/js/swfobject.js"></script>    
                 <script type="text/javascript">

                 function getFlashMovie(movieName)
                 {
                  var isIE = navigator.appName.indexOf("Microsoft") != -1;
                  return (isIE) ? window[movieName] : document[movieName];
                 }  
   
                 var params = { allowScriptAccess: "always", allowFullScreen: "true", flashvars:""};
                 var atts = { id: "recorder" };
                 swfobject.embedSWF("<?php echo base_url(); ?>public/videorecorder/recorder.swf", "recorder", "400", "350", "8", null, null, params, atts);

                 function onRecordPublished(obj)
                 {
	                  $('#vid_url').val(obj.filename);
	                  //$.post('http://www.yourtakeon.com/gen_thumbnails.php',{vid_url: obj.filename});
	                 ///////////////////////////////////////////////////
	                 ////CHANGE TO STANDARD POST WHEN UPLOADED//////////
	                 ///////////////////////////////////////////////////
	                 $.post("<?php echo base_url(); ?>public/proxy.php?url=" + encodeURI('http://www.yourtakeon.com/gen_thumbnails.php'), {
    						"vid_url": obj.filename
 
						}, function (data) {
 								
	       
						}, "json");
				
	                 // alert(obj.duration);
	                 	
    					$('#postidea').submit();
                 }

                 </script>
         
     <div id="recorder">
      You need Flash player 8+ and JavaScript enabled to view this video.
     </div>
     </div>
<?php 
     //echo form_button($postidea);
	echo form_close();
?>
</div>