<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

	public function index()
	{
		$this->load->model('custom_model');
		$data = [[
			'loc' => base_url(),
			'lastmod' => date('Y-m-d'),
			'changefreq' => 'always'
		]];
		$bikes = $this->custom_model->bike_items('all');
		if ($bikes) {
			foreach ($bikes as $key => $bike) {
				$data[] = [
					'loc' => base_url($bike['bike_url']),
					'lastmod' => date('Y-m-d', strtotime($bike['updated'])),
					'changefreq' => calculate($bike, 'frequency'),
					'images' => [['url' => base_url($bike['feat_photo'])]]
				];
			}
		}
		$compares = $this->custom_model->compare_items();
		if ($compares) {
			foreach ($compares as $key => $compare) {
				$images = [];
				foreach ($compare['bike_data'] as $bike) {
					$images[] = ['url' => base_url($bike['feat_photo'])];
				}
				$data[] = [
					'loc' => base_url($compare['compare_url']),
					'lastmod' => date('Y-m-d', strtotime($compare['updated'])),
					'changefreq' => calculate($compare, 'frequency'),
					'images' => count($images) ? $images : FALSE
				];
			}
		}

		// debug($data, 1);
		$this->load->view('page_statics/sitemap', ['items'=>$data]);
	}

	/*public function index()
	{
		$data = ['items'=>[]];
		$var = $this->fread_url(base_url());
		preg_match_all("/a[\s]+[^>]*?href[\s]?=[\s\"\']+"."(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/", $var, $matches);
		$matches = $matches[1];
		$list = array();

		foreach($matches as $var) {
			// print($var."<br>");
			if (!(bool)strstr($var, base_url())) {
				if (!in_array(trim($var), ['javascript:;', 'class='])) {
					if (preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $var) == 0) {
						// $var = preg_replace('/[^a-z0-9\.-]/', '', $var);
						$var = preg_replace('/>/', '', strip_tags($var));
						$data['items'][md5($var)] = base_url($var);
					}
				}
			}
		}
		// debug($data, 1);
		$this->load->view('page_statics/sitemap', $data);
	}

	private function fread_url($url, $ref="")
	{
		if (function_exists("curl_init")) {
			$ch = curl_init();
			$user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt( $ch, CURLOPT_HTTPGET, 1 );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION , 1 );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION , 1 );
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_REFERER, $ref );
			// curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
			$html = curl_exec($ch);
			curl_close($ch);
		} else {
			$hfile = fopen($url, "r");
			$html = '';
			if ($hfile) {
				while(!feof($hfile)) {
					$html .= fgets($hfile, 1024);
				}
			}
		}
		return $html;
	}*/
}