<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\helpers;

/**
 * Inflector pluralizes and singularizes English nouns. It also contains some other useful methods.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @since 2.0
 */
class Inflector extends BaseInflector
{
    /**
     * @var array fallback map for transliteration used by [[slug()]] when intl isn't available.
     */
    public static $transliteration = [
        'đ' => 'd','Đ' => 'd',
        'á' => 'a', 'à' => 'a', 'ạ' => 'a', 'ả' => 'a', 'ã' => 'a', 
        'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ặ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a',
        'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ậ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 
        'Á' => 'a', 'À' => 'a', 'Ạ' => 'a', 'Ả' => 'a', 'Ã' => 'a', 'Ă' => 'a', 
        'Ắ' => 'a', 'Ằ' => 'a', 'Ặ' => 'a', 'Ẳ' => 'a', 'Ẵ' => 'a', 'Â' => 'a', 
        'Ấ' => 'a', 'Ầ' => 'a', 'Ậ' => 'a', 'Ẩ' => 'a', 'Ẫ' => 'a', 
        'ó' => 'o', 'ò' => 'o', 'ọ' => 'o', 'ỏ' => 'o', 'õ' => 'o', 
        'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ộ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 
        'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ợ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 
        'Ó' => 'o', 'Ò' => 'o', 'Ọ' => 'o', 'Ỏ' => 'o', 'Õ' => 'o',
        'Ô' => 'o', 'Ố' => 'o', 'Ồ' => 'o', 'Ộ' => 'o', 'Ổ' => 'o', 'Ỗ' => 'o', 
        'Ơ' => 'o', 'Ớ' => 'o', 'Ờ' => 'o', 'Ợ' => 'o', 'Ở' => 'o', 'Ỡ' => 'o',     
        'é' => 'e', 'è' => 'e', 'ẹ' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ê' => 'e', 
        'ế' => 'e', 'ề' => 'e', 'ệ' => 'e', 'ể' => 'e', 'ễ' => 'e', 
        'É' => 'e', 'È' => 'e', 'Ẹ' => 'e', 'Ẻ' => 'e', 'Ẽ' => 'e', 
        'Ê' => 'e', 'Ế' => 'e', 'Ề' => 'e', 'Ệ' => 'e', 'Ể' => 'e', 'Ễ' => 'e', 
        'ú' => 'u', 'ù' => 'u', 'ụ' => 'u', 'ủ' => 'u', 'ũ' => 'u', 
        'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ự' => 'u', 'ử' => 'u', 'ữ',
        'Ú' => 'u', 'Ù' => 'u', 'Ụ' => 'u', 'Ủ' => 'u', 'Ũ' => 'u', 
        'Ư' => 'u', 'Ứ' => 'u', 'Ừ' => 'u', 'Ự' => 'u', 'Ử' => 'u', 'Ữ' => 'u', 
        'í' => 'i', 'ì' => 'i', 'ị' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 
        'Í' => 'i', 'Ì' => 'i', 'Ị' => 'i', 'Ỉ' => 'i', 'Ĩ' => 'i', 
        'ý' => 'y', 'ỳ' => 'y', 'ỵ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 
        'Ý' => 'y', 'Ỳ' => 'y', 'Ỵ' => 'y', 'Ỷ' => 'y', 'Ỹ' => 'y'
    ];
    
    /**
     * Returns transliterated version of a string.
     *
     * If intl extension isn't available uses fallback that converts latin characters only
     * and removes the rest. You may customize characters map via $transliteration property
     * of the helper.
     *
     * @param string $string input string
     * @return string
     */
    protected static function transliterate($string)
    {
            return str_replace(array_keys(static::$transliteration), static::$transliteration, $string);
    }
}
