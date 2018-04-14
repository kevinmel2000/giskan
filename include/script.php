<?php

	class function_script
	{
		// function alert_success($title, $content){
		// 	echo '
		// 		<script type="text/javascript">swal("'.$title.'", "'.$content.'", "success")</script>
		// 	';
		// }
    //
		// function alert_redirect($title,$content,$path){
		// 	echo '
		// 		<script type="text/javascript">
		// 			swal({
		// 			  title: "'.$title.'",
		// 			  text: "'.$content.'",
		// 			  type: "success",
		// 			  showConfirmButton: true
		// 			},
		// 			function(){
		// 				document.location.href="'.$path.'.php'.'";
		// 			});
		// 		</script>
		// 	';
		// }
    //
		// function alert_warning($title, $content){
		// 	echo '
		// 		<script type="text/javascript">sweetAlert("'.$title.'", "'.$content.'", "error");</script>
		// 	';
		// }
    //
		// function message($title, $content){
		// 	echo '
		// 		<script type="text/javascript">	 swal("'.$title.'", "'.$content.'");</script>
		// 	';
		// }
    //
		// function alert_timer($title, $content, $timer){
		// 	echo '
		// 		<script type="text/javascript">
    //
		// 			swal({
		// 			  title: "'.$title.'",
		// 			  text: "'.$content.'",
		// 			  timer: '.$timer.',
		// 			  showConfirmButton: false
		// 			});
    //
		// 		</script>
		// 	';
		// }

		function redirect($path){
			echo '
				<script type="text/javascript">
					document.location.href="'.$path.'.php'.'";
				</script>
			';
		}

		function redirect2($path){
			echo '
				<script type="text/javascript">
					document.location.href="'.$path.'";
				</script>
			';
		}

	// 	function get_docs($date,$username,$dir){
	// 		$tgl = date('Y-m-d H-i-s',strtotime($date));
	// 		$name = '['.$tgl.']'.$username;
	// 		// Open a directory, and read its contents
	// 		if (is_dir($dir)){
	// 		  if ($dh = opendir($dir)){
	// 		    while (($file = readdir($dh)) !== false){
	// 		      	if (strpos($file,$name) !== false) {
	// 				    return $file;
	// 				}
	// 		    }
	// 		    closedir($dh);
	// 		  }
	// 		}
	// 	}
  //
	// 	function get_image($file_name,$dir){
	// 		if (is_dir($dir)){
	// 		  if ($dh = opendir($dir)){
	// 		    while (($file = readdir($dh)) !== false){
	// 		      	if (strpos($file,$file_name) !== false) {
	// 				    return $file;
	// 				}
	// 		    }
	// 		    closedir($dh);
	// 		  }
	// 		}else{
	// 			echo 'dir not found';
	// 		}
	// 	}
  //
	// 	function compress($source, $destination, $quality) {
  //
	// 	    $info = getimagesize($source);
  //
	// 	    if ($info['mime'] == 'image/jpg'){
	// 	        $image = imagecreatefromjpg($source);
	// 	    }
	// 	    elseif ($info['mime'] == 'image/png'){
	// 	    	$image = imagecreatefrompng($source);
	// 	    }
	// 	    elseif ($info['mime'] == 'image/jpeg'){
	// 	    	$image = imagecreatefromjpeg($source);
	// 	    }
  //
	// 	    imagejpeg($image, $destination, $quality);
  //
	// 	    return $destination;
	// }

	}

 ?>
