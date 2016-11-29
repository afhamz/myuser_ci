<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function admin_logged_in()
{
    $CI =& get_instance();
    $is_logged_in = $CI->session->userdata('admin_user');
    if(!isset($is_logged_in) || $is_logged_in != true)
    {
        redirect('C_Main');
    }       
}

function member_logged_in()
{
    $CI =& get_instance();
    $is_logged_in = $CI->session->userdata('member_user');
    if(!isset($is_logged_in) || $is_logged_in != true)
    {
        redirect('C_Main');
    }
}
