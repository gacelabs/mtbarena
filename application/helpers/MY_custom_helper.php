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

function files_upload($_files=FALSE, $dir='') {
	if ($_files) {
		@mkdir(get_root_path('assets/data/files/'));
		$uploaddir = get_root_path('assets/data/files/'.$dir);
		
		if ($dir != '') {
			/*create the dirs*/
			$folder_chunks = explode('/', str_replace(' ', '_', $dir));
			if (count($folder_chunks)) {
				$uploaddir = get_root_path('assets/data/files/');
				foreach ($folder_chunks as $key => $folder) {
					$uploaddir .= $folder.'/';
					@mkdir($uploaddir);
				}
			}
		}
		@chmod($uploaddir, 0755);

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
		// debug($_files, 1);
		return $result;
	}
}