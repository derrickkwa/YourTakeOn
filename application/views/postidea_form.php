<script type="text/javascript" src="<?php echo base_url(); ?>public/videorecorder/js/swfobject.js"></script>
<link href="<?php echo base_url(); ?>public/uploadify/uploadify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/uploadify/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/uploadify/jquery.uploadify.v2.1.4.min.js"></script>    
<script type="text/javascript">
	$(document).ready(function(){

		currmethod = '';
		show = '';
		$('#vidmethod a').click(function(event){
			show = $(this).attr('href');
			$(currmethod).hide(200);
			$(show).show(200);
		
			currmethod = show;
			show = '';
			return false;
		});
		
		$('#postidea').submit(function(event){
			
			return false;
		});
		
		$('#cancel').click(function(event){
		
			window.location.replace("<?php echo base_url() ?>index.php/user");
			return false;
		});
		
  		$("#upload").uploadify({
							'uploader': '<?php echo base_url();?>public/uploadify/uploadify.swf',
							'script': '<?php echo base_url();?>public/uploadify/uploadify.php',
							'cancelImg': '<?php echo base_url();?>public/uploadify/cancel.png',
							'folder': '/yourtakeon/uploads',
							'scriptAccess': 'always',
							'fileExt'     : '*.mov;*.mp4;*.flv',
							'sizeLimit' : '102400000',
  							'fileDesc'    : 'Video Files',
							'multi': false,
							'hideButton': true,
							'auto': true,
							'wmode': 'transparent',
							'onError' : function (a, b, c, d) {
								 if (d.status == 404)
									alert('Could not find upload script.');
								 else if (d.type === "HTTP")
									alert('error '+d.type+": "+d.status);
								 else if (d.type ==="File Size")
									alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'KB');
								 else
									alert('error '+d.type+": "+d.text);
								},
							'onComplete'   : function (event, queueID, fileObj, response, data) {
							var obj = jQuery.parseJSON(response);
							$('#uploadedfile').html((obj.real_name)+" uploaded");
							$('#vid_url').val(obj.file_name);
							//$('#blah').html($.parseJSON(response));
							
							
												//Post response back to controller
							//					$.post('<?php echo site_url('upload/uploadify');?>',{filearray: response},function(info){
								//					//$("#target").append(info);  //Add response returned by controller																		  
												///});								 			
							}
					});			

	});

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
	                 	
	//$('#postidea').submit();
}

</script>
<style>
	
#uploadUploader{
	background: url('<?php echo base_url(); ?>public/uploadify/upload-button02.png') no-repeat;
}

</style>
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
	<input type="radio" name="type" id="type" value="idea"> Pitch &nbsp;
	<input type="radio" name="type" id="type" value="song"> Music &nbsp;
	<input type="radio" name="type" id="type" value="misc"> Others &nbsp;
</div>
<input type="hidden" id="vid_url" name="vid_url" />
<div>
	<p id="vidmethod"><a href="#videorecorder">Record video</a> or <a href="#fileupload">upload a file</a>.</p>
	<div id="videorecorder" class="hidden">
	
     <div id="recorder">
      You need Flash player 8+ and JavaScript enabled to view this video.
     </div>
     
	</div>
     <div id="fileupload" class="hidden">
     	Select file to upload (.mov, .mp4, .flv; max 10mb): <br /><input type="file" class="field" id="upload" name="upload" />
     	<div id="uploadedfile"></div>
     </div>
     
	 <div>
		<button type="submit" id="savepost" name="savepost">
			Save Post
		</button> 
		<button type="button" id="cancel" name="cancel">
			Cancel
		</button>
	</div>
</form>
</div>
</div>