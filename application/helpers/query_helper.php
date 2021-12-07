<?php


function checkIfEmpty($table, $field, $id) {
    $CI =& get_instance();
    $query = $CI->db->get_where($table, [$field => $id]); 
    if ($query->num_rows() >= 0) {
        return true;
    }
    else {
        return false;

    }

}

function getLastID($table, $field) {
    $CI =& get_instance();
    $last = $CI->db->order_by($field,"desc")->limit(1)->get($table)->row_array();
    return $last;
}

?>