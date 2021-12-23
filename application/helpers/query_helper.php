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

function getKodeWilayah($field, $nama) {
    $CI =& get_instance();
    if ($field == "kabupaten") {
        $row = $CI->db->query("SELECT *FROM data_wilayah where nama = '$nama' AND LENGTH(kode) = 5")->row_array();
    }
    else if ($field == "kecamatan") {
        $row = $CI->db->query("SELECT *FROM data_wilayah where nama = '$nama' AND LENGTH(kode) = 8")->row_array();
    }
    else if ($field == "desa") {
        $row = $CI->db->query("SELECT *FROM data_wilayah where nama = '$nama' AND LENGTH(kode) = 13")->row_array();
    }
    return $row['kode'];

}

?>