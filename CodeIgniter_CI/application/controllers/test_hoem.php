<?php
defined('BASEPATH') or exit('No direct script access allowed');

//首頁和登入
class TEST_Hoem extends CI_Controller
{
    public function index()
    {
        echo '<pre>', print_r(1234), '</pre>';
exit;
        header("Location:home");
    }

    public function Home()
    {
                    echo '<pre>', print_r(1234), '</pre>';
            exit;
        $this->load->model('Gleichheit_model');
        $time = $this->session->Begrenzte_Zeit;
        $Kunde_Name = $this->session->Kunde_Name;
        $pruefen = $this->Gleichheit_model->pruefen($time);
        $Kunde_ID = $this->session->Kunde_ID;

        if ($pruefen == false || $Kunde_Name == '' || $Kunde_Name == null || $Kunde_ID == null || $Kunde_ID == '') {
            $this->load->model('General_info_model');
            $result = $this->General_info_model->getGeneralInfoByKey('website_en_name');
            
            // 設定分頁網站名
            if (empty($result)) {
                $this->session->set_userdata('website_en_name', $this->config->item('website_name'));
            } else {
                $this->session->set_userdata('website_en_name', $result->main_value);
            }
            
            $this->load->view('donate_front');
        } else {
            echo "<script> window.location.href='steuerung_index';</script>";
        }
    }

}
