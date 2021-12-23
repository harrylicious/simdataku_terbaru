<?php
function last_updated() {

     $ci =& get_instance();
     $date = $ci->db->query("select *FROM last_updated")->row_array();
     $second = str_replace("-","",$date['second']);
     $minute = str_replace("-","",$date['minute']);
     $hour = str_replace("-","",$date['hour']);
     $day = str_replace("-","",$date['day']);

     if (!is_null($second) || !is_null($minute) || !is_null($hour) || !is_null($day)) {
          $second = ((int) $second) % 60;
          $minute = ((int) $minute) % 60;
          $hour = ((int) $hour)  % 24;

          if ($day != 0) {
               return $day." hari, ".$hour." yang lalu";
          }
          elseif ($hour != 0) {
               return $hour." jam, ".$minute." menit yang lalu";
          }
          elseif ($minute != 0) {
               return $minute." menit, ".$second." detik yang lalu";
          }
     }
     return null;

}

if (!function_exists('tgl_default')) {
     function tgl_default($date){
 
       $newdate = date("d-m-Y", strtotime($date));
     
       return $newdate;
     }
     }


function get_bulan($no)
{
	$no = (INT) $no;
	
	$BulanIndo = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
 
	$result = $BulanIndo[$no];		
	return($result);
}