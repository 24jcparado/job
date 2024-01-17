<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once dirname(__FILE__) .'/dompdf/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Options\Options;

class Pdf extends Dompdf
{
    public function __construct()
    {
         parent::__construct();
    } 
}

?>