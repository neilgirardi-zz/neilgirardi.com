<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    if (! function_exists('cdn'))
    {
        function cdn()
        {
            $CI =& get_instance();
            if (ENVIRONMENT == 'production') 
            {
                return $CI->config->item('prod_cdn');
            } else {
                return $CI->config->item('dev_cdn');
            }
        }
    }
