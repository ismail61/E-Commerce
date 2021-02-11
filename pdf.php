
<?php

//pdf.php

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf{

	public function __construct(){
		parent::__construct();
	}
}

?>









//request url /Ecom/something
//$url = $_SERVER['REQUEST_URI'];

//fetch host by this
//$host=$_SERVER['HTTP_HOST'];



//$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

//$parts = parse_url($url);
//parse_str($parts['query'], $query);
//echo $query['id'];
//echo $query['p_id'];


?>