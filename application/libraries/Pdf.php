<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once __DIR__ . '/vendor/autoload.php';

include_once ('CustomLanguageToFontImplementation.php');

class Pdf extends  \Mpdf\Mpdf
{
	public function __construct()
	{
		parent::__construct();
	}
}

?>
