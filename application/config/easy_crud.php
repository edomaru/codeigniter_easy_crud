<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['pagination_bootstrap'] = array(
	"full_tag_open" 	=> '<div class="pagination pagination-centered"><ul>' . PHP_EOL,
    "full_tag_close" 	=> '</ul></div>',	

    "first_link" => "&laquo;",
    "first_tag_open" => "<li>",
    "first_tag_close" => "</li>",

    "last_link" => "&raquo;",
    "last_tag_open" => "<li>",
    "last_tag_close" => "</li>",

    'next_link' => '&gt;',
    'next_tag_open' => '<li>',
    'next_tag_close' => '<li>',

    'prev_link' => '&lt;',
    'prev_tag_open' => '<li>',
    'prev_tag_close' => '<li>',
    'cur_tag_open' => '<li class="active"><a href="#">',
    'cur_tag_close' => '</a></li>',
    'num_tag_open' => '<li>',
	'num_tag_close' => '</li>'
);

$config['default_search_keyword_input_name'] = "search_keywords";