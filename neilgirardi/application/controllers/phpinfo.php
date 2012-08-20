<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Phpinfo extends CI_Controller {
   function Index() {
       echo phpinfo();
   }
}
