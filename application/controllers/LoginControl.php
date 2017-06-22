<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginControl extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function cobaLogin() {
        $this->load->model('Users');
        $username = $_GET["username"];
        $password = $_GET["password"];
        $query = $this->Users->login($username, $password);

        if ($query) {
            $data = array(
                'username' => $username,
                'is_logged_in' => true,
            );

            $this->session->set_userdata($data);
//            redirect('site/halamanUtama');
            if (strpos($username, 'AD') !== FALSE) {
                $this->load->view('home');
            } elseif (strpos($username, 'CS') !== FALSE) {
                $this->load->view('home');
            } elseif (strpos($username, 'I') !== FALSE) {
                $this->load->view('home');
            } else {
                $data = array(
                    'username' => $username,
                    'is_logged_in' => false,
                    'not_user' => true
                );
                
                $this->session->set_userdata($data);
                $this->load->view('welcome_message');
            }
        } else {

            $data = array(
                'username' => $username,
                'is_logged_in' => false,
            );
            $this->session->set_userdata($data);
            $this->load->view('welcome_message');
        }
    }

    function destroy_session() {
        $array_items = array('username', 'is_logged_in');

        $this->session->unset_userdata($array_items);
        $this->load->view('welcome_message');
    }

}

?>