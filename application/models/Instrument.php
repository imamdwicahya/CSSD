<?php
/**
 * Description of User
 *
 * @author budhidarmap
 */
class Instrument extends CI_Model {
   
    public function panggil_semua_data_instrument() {
        $result = $this->db->query("SELECT * FROM instrumen");
        return $result->result();
    }
    function panggil_data_instrument() {
        $q = $this->db->query("SELECT * FROM instrumen WHERE STERIL > 0");
        return $q->result;
    }
}
