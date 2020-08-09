<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/vendor/autoload.php';

class CustomLanguageToFontImplementation extends \Mpdf\Language\LanguageToFont
{

	public function getLanguageOptions($llcc, $adobeCJK)
	{
		if ($llcc === 'th') {
			return [false, 'frutiger']; // for thai language, font is not core suitable and the font is Frutiger
		}

		return parent::getLanguageOptions($llcc, $adobeCJK);
	}

}


?>
