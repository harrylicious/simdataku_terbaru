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