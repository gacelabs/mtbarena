<?php

function debug($data=NULL, $exit=FALSE)
{
	$trace = debug_backtrace();
	try {
		echo "<pre>";
		// print_r($data);
		if (!empty($trace)) {
			foreach ($trace as $key => $row) {
				$separator = '------';
				for ($i=0; $i < strlen($row['file']); $i++) $separator .= '-';
				
				echo ($key==0?'<h1 style="margin:0;">DEBUGGER</h1>':'').$separator."<br /><b>PATH:</b> ".$row['file'];
				echo "<br /><b>LINE:</b> ".$row['line']."<br />";
				
				if ($key == 0) {
					if (is_bool($data)) {
						echo "<b>DATA TYPE:</b> BOOLEAN<br />";
						if ($data) {
							echo "<b>DATA:</b> TRUE<br />";
						} else {
							echo "<b>DATA:</b> FALSE<br />";
						}
					} else {
						if (is_object($data) OR is_null($data)) echo "<b>DATA TYPE:</b> OBJECT<br />";
						if (is_array($data)) echo "<b>DATA TYPE:</b> ARRAY<br />";
						if (is_string($data)) echo "<b>DATA TYPE:</b> STRING<br />";
						if (is_numeric($data)) echo "<b>DATA TYPE:</b> NUMBER<br />";
						if (empty($data) AND $data != 0) {
							if (is_object($data) OR is_null($data)) echo "<b>DATA:</b> NULL<br />";
							if (is_array($data)) echo "<b>DATA:</b> EMPTY<br />";
							if (is_string($data)) echo "<b>DATA:</b> BLANK<br />";
						} else {
							echo "<b>DATA:</b> ";
							if (is_null($data)) {
								var_dump($data);
							} else if (is_string($data)) {
								echo '<code>';
								print_r($data);
								echo '</code>';
							} else {
								print_r($data);
							}
							echo "<br />";
						}
					}
				}
			}
		} else {
			echo "<b>DATA:</b> NULL<br />";
		}
		echo "</pre>";
	} catch (Exception $e) {
		echo "<pre>";
		foreach ($trace as $key => $row) {
			$separator = '------';
			for ($i=0; $i < strlen($row['file']); $i++) $separator .= '-';
				echo '<h1 style="margin:0;">DEBUGGER</h1>'.$separator."<br /><b>PATH:</b> ".$row['file'];
			echo "<br /><b>LINE:</b> ".$row['line']."<br />";
			echo "<b>DATA:</b> ".$e->getMessage()."<br />";
		}
		echo "</pre>";
	}
	if ($exit) exit();
}

function check_instance($obj=FALSE, $class=NULL)
{
	if (is_array($class)) {
		foreach ($class as $key => $value) {
			if ($obj instanceof $value) {
				return TRUE;
			}
		}
	} else {
		if ($obj instanceof $class) {
			return TRUE;
		}
	}
	return FALSE;
}

function format_ip($ip='')
{
	$ip = substr(md5($ip), 0, 7);
	return 'MTBA-'.$ip;
}

function time_diff($past=FALSE, $future=FALSE, $diff='minutes', $want='5', $get_elapsed=FALSE)
{
	$elapsed = FALSE;
	if ($past AND $future) {
		$lapse = (strtotime($future) - strtotime($past));
		if ($lapse > 0) {
			switch ($diff) {
				case 'seconds':
					if ($lapse >= $want) {
						$elapsed = $lapse;
					} elseif ($get_elapsed) {
						$elapsed = $lapse;
					}
				break;
				case 'minutes':
					if (($lapse / 60) >= $want) {
						$elapsed = floor($lapse / 60);
					} elseif ($get_elapsed) {
						$elapsed = floor($lapse / 60);
					}
				break;
				case 'hours':
					if (($lapse / 120) >= $want) {
						$elapsed = floor($lapse / 120);
					} elseif ($get_elapsed) {
						$elapsed = floor($lapse / 120);
					}
				break;
				case 'days':
					if (($lapse / 2880) >= $want) {
						$elapsed = floor($lapse / 2880);
					} elseif ($get_elapsed) {
						$elapsed = floor($lapse / 2880);
					}
				break;
			}
		}
	}
	return $elapsed;
}

function get_root_path($path='', $is_doc_path=TRUE)
{
	$domain = '/';
	if((bool)strstr($_SERVER['HTTP_HOST'], 'local') == TRUE) {
		$domain = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
	}
	if($is_doc_path) {
		return $_SERVER['DOCUMENT_ROOT'] . $domain . $path;
	} else {
		return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $domain . $path;
	}
}

function save_image($base64_string=FALSE, $file=FALSE) {
	if ($base64_string) {
		if ($file == FALSE) {
			$output_file = get_root_path('assets/data/photos/'.random_string().'.jpg');
		} else {
			$output_file = get_root_path($file);
		}
		/*open the output file for writing*/
		$ifp = fopen($output_file, 'wb'); 
		/*split the string on commas*/
		/*$data[0] == "data:image/png;base64"*/
		/*$data[1] == <actual base64 string>*/
		$data = explode(',', $base64_string);
		/*we could add validation here with ensuring count($data) > 1*/
		fwrite($ifp, base64_decode($data[1]));
		/*clean up the file resource*/
		fclose($ifp); 
		// return get_root_path($file, FALSE); 
		return $file; 
	}
	return FALSE;
}

function files_upload($_files=FALSE, $return_path=FALSE, $dir='') {
	if ($_files) {
		// debug($_files, 1);
		/*create the dirs*/
		$folder_chunks = explode('/', 'assets/data/files/');
		if (count($folder_chunks)) {
			$uploaddir = get_root_path();
			foreach ($folder_chunks as $key => $folder) {
				$uploaddir .= $folder.'/';
				// debug($uploaddir);
				@mkdir($uploaddir);
			}
		}
		@mkdir(get_root_path('assets/data/files/'));
		$uploaddir = get_root_path('assets/data/files/'.$dir);
		
		if ($dir != '') {
			/*create the dirs*/
			$folder_chunks = explode('/', str_replace(' ', '_', $dir));
			// debug($folder_chunks);
			if (count($folder_chunks)) {
				$uploaddir = get_root_path('assets/data/files/');
				foreach ($folder_chunks as $key => $folder) {
					$uploaddir .= $folder.'/';
					// debug($uploaddir);
					@mkdir($uploaddir);
				}
			}
		}
		@chmod($uploaddir, 0755);
		// debug($uploaddir, 1);

		$array_index = array_keys($_files);
		$result = FALSE;

		if (isset($array_index[0])) {
			$input = $array_index[0];
			if (is_array($_files[$input]['name'])) {
				foreach ($_files[$input]['name'] as $key => $name) {
					if ($_files[$input]['error'][$key] == 0) {
						$uploadfile = $uploaddir . basename($name);
						if (@move_uploaded_file($_files[$input]['tmp_name'][$key], $uploadfile)) {
							$result = TRUE; // "File is valid, and was successfully uploaded.\n";
						} else {
							// "Possible file upload attack!\n";
						}
					}
				}
			} else {
				if ($_files[$input]['error'] == 0) {
					$uploadfile = $uploaddir . basename($_files[$input]['name']);
					// debug($uploadfile, 1);
					if (@move_uploaded_file($_files[$input]['tmp_name'], $uploadfile)) {
						$result = TRUE; // "File is valid, and was successfully uploaded.\n";
					} else {
						// "Possible file upload attack!\n";
					}
				}
			}
		}
		// debug($uploaddir, 1);
		// debug($_files, 1);
		if ($return_path AND isset($input)) {
			return 'assets/data/files/'.$dir.'/'.($_files[$input]['name'] == '' ? 'none.png' : $_files[$input]['name']);
		} else {
			return $result;
		}
	}
}