<?php
/**
 * Description of User
 *
 * @author budhidarmap
 */
class Instrument extends CI_Model {
   
    function panggil_semua_data_instrument() {
        $q = $this->db->query("SELECT * FROM `instrument`");
        return $q->result;
    }
    function panggil_data_instrument() {
        $q = $this->db->query("SELECT * FROM `instrument` WHERE STERIL > 0");
        return $q->result;
    }
}
