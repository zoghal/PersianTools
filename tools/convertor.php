<?php
namespace Persian;

/**
 * PersianBehavior
 * .
 * @package PersianTools
 * @author Mohammad Saleh Souzanchi <Saleh.soozanchi@gmail.com>
 * @copyright RitaCo 2014
 * @version 0.0.1
 * @access public
 */
class Convertor {
	
/**
 * 
 */
	private static $arabic_chars = ["ي","ك","ى","ة"];

/**
 * 
 */
  	private static	$persian_chars = ["ی","ک","ی","ه"];
  	
/**
 * 
 */
 	protected static $persian_numbers = ['۱','۲','۳','۴','۵','۶','۷','۸','۹','۰'];

/**
 * 
 */
    protected static $arabic_numbers  = ['١','٢','٣','٤','٥','٦','٧','٨','٩','٠'];
/**
 * 
 */
    protected static $english_numbers = ['1','2','3','4','5','6','7','8','9','0'];

/**
 * Convertor::arabic2persian()
 * 
 * @param mixed $text
 * @param bool $alpha
 * @param bool $numeric
 * @return
 */
	public static function arabic2persian($text) {
		if (!is_string($text) || empty($text)) {
			return false;
		}

		$text =  self::arabic2persianAlpha($text);
		$text =  self::arabic2persianNumbers($text);
		return $text;
 	}


/**
 * Convertor::arabic2persianAlpha()
 * 
 * @param mixed $text
 * @return
 */
	public static function arabic2persianAlpha($text) {
		if (!is_string($text) || empty($text)) {
			return false;
		}
		return str_replace(self::$arabic_chars, self::$persian_Chars, $text);
	}

/**
* Convertor::arabic2persianNumbers()
* 
* @param mixed $text
* @return
*/
	public static function arabic2persianNumbers($text) {
		if (!is_string($text) || empty($text)) {
			return false;
		}
		return str_replace(self::$arabic_numbers, self::$persian_numbers, $text);
	}    
}

