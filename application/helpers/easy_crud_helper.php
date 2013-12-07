<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Helpers for CRUD purpose
 *
 * @package     CodeIgniter
 * @subpackage  helpers
 * @category    helper
 * @author      Masaru Edo <masaruedogawa@gmail.com>
 */ 

if ( !function_exists('set_message')) {
    function set_message($alert, $content)
    {
        $ci =& get_instance();

        $message = array('alert' => $alert, "content" => $content);
        $ci->session->set_flashdata("message", $message);
    }
}

if ( !function_exists('get_message')) {
    function get_message()
    {
        $ci =& get_instance();
        
        $message =  $ci->session->flashdata('message');
        if ( ! count($message) ) {
            return false;
        }        

        return $message;
    }
}

if ( !function_exists('encode_keywords')) {
    function encode_keywords($keywords = 'none')
    {
        if ($keywords == 'none') {
            return $keywords;
        }
        $str = base64_encode($keywords);
        return str_replace("=", "--", $str);
    }
}

if ( !function_exists('decode_keywords')) {
    function decode_keywords($keywords = 'none')
    {
        if ($keywords == 'none') {
            return $keywords;
        }
        $keywords = str_replace("--", "=", $keywords);
        $str = base64_decode($keywords);
        return $str; 
    }
}