<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('cur_url')) {
    function cur_url($a = 0) {
        $r = base_url() . uri_string();
        if ($a == 0) {
            return $r . '/';
        } else if ($a == -1) {
            return substr($r, 0, strripos($r, '/')). '/';
        } else if ($a == -2) {
            $r = substr($r, 0, strripos($r, '/'));
            return substr($r, 0, strripos($r, '/')). '/';
        }else if ($a == -3) {
            $r = substr($r, 0, strripos($r, '/'));
			$r = substr($r, 0, strripos($r, '/'));
			return substr($r, 0, strripos($r, '/')). '/';
        }

    }
}

if (!function_exists('debug_array')) {

    function debug_array($a = array(), $b = false) {//format abjad-abjad atau abjad-angka
        echo "<pre>";
        print_r($a);
        echo "</pre>";
        if (!$b)
            die();
        return 0;
    }

}

if (!function_exists('db_conv')) {

    function db_conv($a) {
        if ($a->num_rows() == 1) {
            $a = $a->result();
            $a = $a[0];
            return $a;
        }else
            die("tinjau kembali");
    }

}

//time format
if (!function_exists('format_date_time')) {

    function format_date_time($i, $complete = true) {
		if(($i == '0000-00-00') || empty($i)){
			return '-';
		}else{
			$a = explode(" ", $i);
	        $d = explode("-", $a[0]);
	        if ($complete) {
	            $t = explode(":", $a[1]);
	            return "$d[2]-$d[1]-$d[0] $t[0]:$t[1]";
	        }else
	            return "$d[2]-$d[1]-$d[0]";
		}
    }
}

function indo_day($d){
	switch ($d) {
		case 'Sun':return 'Minggu';break;
		case 'Mon':return 'Senin';break;
		case 'Tue':return 'Selasa';break;
		case 'Wed':return 'Rabu';break;
		case 'Thu':return 'Kamis';break;
		case 'Fri':return 'Jumat';break;
		case 'Sat':return 'Sabtu';break;
	}
}

//time format
if (!function_exists('pretty_date')) {

    function pretty_date($i,$complete = true) {
		if(($i == '0000-00-00') || empty($i)){
			return '-';
		}else{
			$date = new DateTime($i);
			$day = indo_day($date->format('D'));

			$a = explode(" ", $i);
	        $d = explode("-", $a[0]);
			if($complete)
				$j = explode(":", $a[1]);
			$bln = '';
			switch (intval($d[1])) {
				case 1: $bln = 'Januari';break;
				case 2: $bln = 'Februari';break;
				case 3: $bln = 'Maret';break;
				case 4: $bln = 'April';break;
				case 5: $bln = 'Mei';break;
				case 6: $bln = 'Juni';break;
				case 7: $bln = 'Juli';break;
				case 8: $bln = 'Agustus';break;
				case 9: $bln = 'September';break;
				case 10: $bln = 'Oktober';break;
				case 11: $bln = 'November';break;
				case 12: $bln = 'Desember';break;
			}
			if($complete)
				return "$day, $d[2] $bln $d[0] $j[0]:$j[1]";
			else return "$day, $d[2] $bln $d[0]";
		}
    }
}

function smart_trim($text, $max_len, $trim_middle = false, $trim_chars = '...')
{
	$text = strip_tags($text);
	$text = trim($text);

	if (strlen($text) < $max_len) {

		return $text;

	} elseif ($trim_middle) {

		$hasSpace = strpos($text, ' ');
		if (!$hasSpace) {
			/**
			 * The entire string is one word. Just take a piece of the
			 * beginning and a piece of the end.
			 */
			$first_half = substr($text, 0, $max_len / 2);
			$last_half = substr($text, -($max_len - strlen($first_half)));
		} else {
			/**
			 * Get last half first as it makes it more likely for the first
			 * half to be of greater length. This is done because usually the
			 * first half of a string is more recognizable. The last half can
			 * be at most half of the maximum length and is potentially
			 * shorter (only the last word).
			 */
			$last_half = substr($text, -($max_len / 2));
			$last_half = trim($last_half);
			$last_space = strrpos($last_half, ' ');
			if (!($last_space === false)) {
				$last_half = substr($last_half, $last_space + 1);
			}
			$first_half = substr($text, 0, $max_len - strlen($last_half));
			$first_half = trim($first_half);
			if (substr($text, $max_len - strlen($last_half), 1) == ' ') {
				/**
				 * The first half of the string was chopped at a space.
				 */
				$first_space = $max_len - strlen($last_half);
			} else {
				$first_space = strrpos($first_half, ' ');
			}
			if (!($first_space === false)) {
				$first_half = substr($text, 0, $first_space);
			}
		}

		return $first_half.$trim_chars.$last_half;

	} else {

		$trimmed_text = substr($text, 0, $max_len);
		$trimmed_text = trim($trimmed_text);
		if (substr($text, $max_len, 1) == ' ') {
			/**
			 * The string was chopped at a space.
			 */
			$last_space = $max_len;
		} else {
			/**
			 * In PHP5, we can use 'offset' here -Mike
			 */
			$last_space = strrpos($trimmed_text, ' ');
		}
		if (!($last_space === false)) {
			$trimmed_text = substr($trimmed_text, 0, $last_space);
		}
		return remove_trailing_punctuation($trimmed_text).$trim_chars;

	}

}
function remove_trailing_punctuation($text)
{
	return preg_replace("'[^a-zA-Z_0-9]+$'s", '', $text);
}

function get_bulan(){
	$bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	$r = "";$bi=0;
	foreach($bulan as $rr){
		$bi++;
		$r .= "<option value='$bi'>$rr</option>";
	}
	return $r;
}

function get_hari(){
	$hri = "";
	for($i=1;$i<32;$i++){
		$hri .= "<option value='$i'>$i</option>";
	}
	return $hri;
}

function get_tahun(){
	$hri = "";
	$t = DATE('Y');
	for($i=$t;$i>=1950;$i--){
		$hri .= "<option value='$i'>$i</option>";
	}
	return $hri;
}

function compose_url($ds,$l){
	$mn = array();
	$l+=1;
	for ($i=1; $i < $l ; $i++) {
		$c = "menu_uri$i";
		if($ds->$c != ''){
			$mn[$i] = $ds->$c;
		}
	}
	return implode("/",$mn);
}

if (! function_exists('default_value')) {

	/**
	 * @author yugo
	 * @param mixed $val
	 * @param mixed $def
	 * return mixed
	 */
	function default_value($val, $def = '') {
		return empty($val) ? $def : $val;
	}
}

if (! function_exists('profit'))
{
	function profit($productId,$mitraId)
	{
		$ci = & get_instance();
		// get data from cache
		$cacheName = sprintf('profit-%d', (int) $mitraId);
		$profit = $ci->cache->get($cacheName);

		if (empty($profit)) {
			// get member data first
			$ci->load->model('base/mitra_m');
			$member = $ci->mitra_m->select('id_mitra, id_type, parent')
				->limit(1)
				->get_by('id_mitra', (int) $mitraId);
			if (empty($member)) {
				show_error('Data member tidak ditemukan.');
			}

			$ci->load->model('base/ms_profit_m');
			$profit = new stdClass;

			// search first priority profit
			$selfProfit = $ci->ms_profit_m->select('self_profit, parent_profit')
				->limit(1)
				->get_by([
					'id_share' => $productId,
					'id_mitra' => (int) $member->id_mitra
				]);
			if (! empty($selfProfit)) {
				$profit->self = (float) $selfProfit->self_profit;
				$profit->parent = (float) $selfProfit->parent_profit;
			}

			if (empty($selfProfit))  {
				// search profit from ms_default_value
				$ci->load->model('base/ms_default_value_m');
				$parentProfit = $ci->ms_default_value_m
					->limit(1)
					->get_by([
						'id_share' => $productId,
						'parent' => (int) $member->parent
					]);
				if (! empty($parentProfit)) {		
					$profit->self = (float) $parentProfit->self;
					$profit->parent = (float) $parentProfit->parent;
				}

				// still empty? fallback to default group
				if (empty($parentProfit)) {
					$groupProfit = $ci->ms_default_value_m->select('parent, self')
						->limit(1)
						->get_by([
							'id_share' => $productId,
							'id_type' => (int) $member->id_type
						]);

					// it must be exists right?
					$profit->self = (float) $groupProfit->self;
					$profit->parent = (float) $groupProfit->parent;
				}
			}
			// write data to cache, save money!
			$ci->cache->write($profit, $cacheName);
		}

		return $profit;
	}
}

function convRupiah($value) {
	return number_format($value);
} 

if (!function_exists('persons_list')) {
	function persons_list($trx_id) {
		$ci = &get_instance();
		$ci->load->database();

		$q = $ci->db->get_where('attraction_book_persons', array('trx_id' => $trx_id));

		$res = $q->result_array();
		if ($res) {
			return $res;
		} else {
			return array();
		}
	}
}

/////////////PRAS////////////////////
if ( ! function_exists('post'))
{ 
function post($name=''){
	$CI =& get_instance();
	return $CI->input->post($name);
}
}

if ( ! function_exists('get'))
{
function get($name=''){
	$CI =& get_instance();
	return $CI->input->get($name);
}
}

if ( ! function_exists('urisegment'))
{
function urisegment($name=''){
	$CI =& get_instance();
	return $CI->uri->segment($name);;
}
}

if ( ! function_exists('now'))
{
function now(){
	$time =new DateTime();
	$time = $time->getTimestamp();
	return $time;
}
}

if ( ! function_exists('session'))
{
function session($name=''){
	$CI =& get_instance();
	return $CI->session->userdata($name);
}
}

if ( ! function_exists('pr'))
{
function pr($data='', $die=FALSE){
	$CI =& get_instance();
	if($die){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		die();
	}else{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}
}

if ( ! function_exists('date_mysql'))
{
function date_mysql($tanggal, $format ="Y-m-d"){
	$tanggal = strtotime($tanggal);
	$tanggal = date($format, $tanggal);
	return $tanggal;
}
}

/* APPPATH/helpers/global_helper.php */
