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

function files_upload($_files=FALSE, $return_path=FALSE, $dir='', $this_name=FALSE) {
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
				$result = [];
				foreach ($_files[$input]['name'] as $key => $name) {
					if ($_files[$input]['error'][$key] == 0) {
						$ext = strtolower(pathinfo(basename($name), PATHINFO_EXTENSION));
						if ($this_name) {
							$pathname = clean_string_name($this_name).'.'.$ext;
						} else {
							$pathname = basename($name);
						}
						$uploadfile = $uploaddir . $pathname;
						if (@move_uploaded_file($_files[$input]['tmp_name'][$key], $uploadfile)) {
							// "File is valid, and was successfully uploaded.\n";
							$status = TRUE;
						} else {
							// "Possible file upload attack!\n";
							$status = FALSE;
						}
						$result[] = [
							'file_path' => $uploadfile,
							'url_path' => 'assets/data/files/'.$dir.'/'.$pathname,
							'status' => $status
						];
					}
				}
			} else {
				if ($_files[$input]['error'] == 0) {
					$ext = strtolower(pathinfo(basename($_files[$input]['name']), PATHINFO_EXTENSION));
					if ($this_name) {
						$pathname = clean_string_name($this_name).'.'.$ext;
					} else {
						$pathname = basename($_files[$input]['name']);
					}
					$uploadfile = $uploaddir . $pathname;
					// debug($ext);
					// debug($uploadfile, 1);
					if (@move_uploaded_file($_files[$input]['tmp_name'], $uploadfile)) {
						// "File is valid, and was successfully uploaded.\n";
						$status = TRUE;
					} else {
						// "Possible file upload attack!\n";
						$status = FALSE;
					}
					$result = [
						'file_path' => $uploadfile,
						'url_path' => 'assets/data/files/'.$dir.'/'.$pathname,
						'status' => $status
					];
				}
			}
		}
		// debug($uploaddir, 1);
		// debug(array_keys($result), 1);
		// debug($_files, 1);
		if ($return_path AND isset($input)) {
			$data = '';
			$set = array_keys($result);
			if (isset($set[0]) AND !is_string($set[0])) {
				$data = [];
				foreach ($result as $key => $row) {
					if ($row['status']) {
						$data[] = $row['url_path'];
					}
				}
			} else {
				$data = $result['url_path'];
			}
			return $data;
		} else {
			return $result;
		}
	}
}

function construct_where($id_post_id=FALSE, $table_or_alias='') {
	// debug($id_post_id);
	if ($id_post_id) {
		$data = explode('-', $id_post_id);
		// debug($data, 1);
		if (count($data) == 2) {
			return $table_or_alias.'id = '.$data[0].' AND '.$table_or_alias.'user_id = '.$data[1];
		} elseif (count($data) == 1) {
			return $table_or_alias.'id = '.$data[0];
		}
	}
	return FALSE;
}

function fix_title($title=FALSE) {
	if ($title) {
		return ucwords(preg_replace('/[-]/', ' ', $title));
	}
	return '';
}

function bike_search($query=FALSE)
{
	if ($query) {
		$ci =& get_instance();
		/*limit words number of characters*/
		$query = substr($query, 0, 200);

		/*Weighing scores*/
		$score_bike_model = 6;
		$score_bike_model_keyword = 5;
		$score_made_by = 5;
		$score_made_by_keyword = 4;
		$score_full_content = 4;
		$score_content_keyword = 3;
		$score_spec_keyword = 2;
		$score_url_keyword = 1;

		/*Remove unnecessary words from the search term and return them as an array*/
		$query = trim(preg_replace("/(\s+)+/", " ", $query));
		$keywords = [];
		/*expand this list with your words.*/
		$list = ["in","it","a","the","of","or","I","you","he","me","us","they","she","to","but","that","this","those","then","by"];
		$c = 0;
		$separated_spaces = explode(" ", $query);
		if (count($separated_spaces) > 0){
			foreach($separated_spaces as $key){
				if (in_array($key, $list)) continue;
				$keywords[] = $key;
				if ($c >= 15) break;
				$c++;
			}
		}
		$escQuery = $ci->db->escape_like_str($query); /*see note above to get db object*/
		$titleSQL = [];
		$sumSQL = [];
		$docSQL = [];
		$categorySQL = [];
		$urlSQL = [];

		/** Matching full occurences **/ 
		$full_content = "CONCAT(REPLACE(b.feat_photo, 'assets/data/files/bikes/images/', ''),' ',b.colorway,' ',b.frame,' ',b.shifter,' ',b.front_derailleur,' ',b.rear_derailleur,' ',b.cassette,' ',b.chain,' ',b.brake,' ',b.rim,' ',b.tires,' ',b.chainwheel,' ',b.hub,' ',b.saddle,' ',b.seatpost,' ',b.stem,' ',b.handlebar,' ',b.price_tag)";
		if (count($keywords) > 1){
			$titleSQL[] = "IF(b.bike_model LIKE '%".$escQuery."%',{$score_bike_model},0)";
			$sumSQL[] = "IF(b.made_by LIKE '%".$escQuery."%',{$score_made_by},0)";
			$docSQL[] = "IF($full_content LIKE '%".$escQuery."%',{$score_full_content},0)";
		}

		/** Matching Keywords **/
		if (count($keywords) > 0){
			foreach($keywords as $key){
				$titleSQL[] = "IF(b.bike_model LIKE '%".$ci->db->escape_like_str($key)."%',{$score_bike_model_keyword},0)";
				$sumSQL[] = "IF(b.made_by LIKE '%".$ci->db->escape_like_str($key)."%',{$score_made_by_keyword},0)";
				$docSQL[] = "IF($full_content LIKE '%".$ci->db->escape_like_str($key)."%',{$score_content_keyword},0)";
				$urlSQL[] = "IF(b.external_link LIKE '%".$ci->db->escape_like_str($key)."%',{$score_url_keyword},0)";
				$categorySQL[] = "IF(b.spec_from LIKE '%".$ci->db->escape_like_str($key)."%',{$score_spec_keyword},0)";
			}
		}

		/*Just incase it's empty, add 0*/
		if (empty($titleSQL)) $titleSQL[] = 0;
		if (empty($sumSQL)) $sumSQL[] = 0;
		if (empty($docSQL)) $docSQL[] = 0;
		if (empty($urlSQL)) $urlSQL[] = 0;
		if (empty($tagSQL)) $tagSQL[] = 0;
		if (empty($categorySQL)) $categorySQL[] = 0;

		$sql = "
		SELECT 
				u.store_name, CONCAT(b.id, '-', b.user_id, '/mtb/', REPLACE(LOWER(REPLACE(b.bike_model, ' ', '-')), '\'', ''), '-full-specifications') AS bike_url,
				b.*, ((".implode(' + ', $titleSQL).") + (".implode(' + ', $sumSQL).") + (".implode(' + ', $docSQL).") + (".implode(' + ', $categorySQL).") + (".implode(' + ', $urlSQL).")) as Relevance 
			FROM bike_items b 
			INNER JOIN users u ON u.id = b.user_id
		GROUP BY b.id 
			HAVING Relevance > 0 
		ORDER BY b.updated DESC";

		// debug($sql, 1);
		$data = $ci->db->query($sql);

		if ($data->num_rows() > 0){
			return $data->result_array();
		}
		return FALSE;
	}
}

function clean_string_name($string=FALSE, $delimiter='-')
{
	if ($string) {
		/*clean all unnecessary symbols*/
		$string = preg_replace('/[^a-z0-9\.-]/', '', strtolower($string));
		/*now replace the delimiter*/
		$string = preg_replace('/'.$delimiter.'+/', $delimiter, $string);
	}
	return $string;
}

function get_like_count($where=FALSE, $table='bike_items')
{
	$ci =& get_instance();
	if ($where) {
		$ci->load->model('custom_model');
		$data = $ci->custom_model->get($table, $where, 'like_count', 'row');
		return $data['like_count'];
	}
	return 0;
}