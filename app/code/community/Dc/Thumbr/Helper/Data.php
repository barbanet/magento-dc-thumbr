<?php
/**
 * Dc_Thumbr
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Dc
 * @package    Dc_Thumbr
 * @copyright  Copyright (c) 2015 Damián Culotta. (http://www.damianculotta.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Dc_Thumbr_Helper_Data extends Mage_Core_Helper_Abstract
{

    const API_UNSECURE = 'http://api.thumbr.io/';
    const API_SECURE = 'https://api.thumbr.io/';
    const CDN_UNSECURE = 'http://cdn.thumbr.io/';
    const CDN_SECURE = 'https://cdn.thumbr.io/';

    protected function getServiceUrl()
    {
        $_type = Mage::getStoreConfig('thumbr/service/type');
        if ($_type == 2) {
            return 'http://cdn.thumbr.io/';
        } else {
            return 'http://api.thumbr.io/';
        }
    }
    
    public function isEnable()
    {
        return Mage::getStoreConfig('thumbr/service/enable');
    }

    
    /**
     * $url is the URL of the image that you want to process. This string should
     * be pure ASCII or UTF-8.
     */
    function thumbrio($url, $size, $thumb_name='thumb.png', $query_arguments=NULL, $base_url=NULL) {
        if (!$base_url) {
            $base_url = self::API_UNSECURE;
        }
        if (substr($url, 0, 7) === 'http://') {
            $url = substr($url, 7);
        }
        $encoded_url = $this->_thumbrio_urlencode($url);
        $encoded_size = $this->_thumbrio_urlencode($size);
        $encoded_thumb_name = $this->_thumbrio_urlencode($thumb_name);
        $path = "$encoded_url/$encoded_size/$encoded_thumb_name";
    
        if ($query_arguments) {
            $path .= "?$query_arguments";
        }
    
        // We should add the API to the URL when we use the non customized
        // thumbr.io domains
        if (in_array($base_url, array(self::API_UNSECURE, self::API_SECURE, self::CDN_UNSECURE, self::CDN_SECURE))) {
            $path = Mage::getStoreConfig('thumbr/credentials/api_key') . "/$path";
        }
    
        // some bots (msnbot-media) "fix" the url changing // by /, so even if
        // it's legal it's troublesome to use // in a URL.
        $path = str_replace('//', '%2F%2F', $path);
        $token = hash_hmac('md5', $base_url . $path, Mage::getStoreConfig('thumbr/credentials/secret_key'));
        return "$base_url$token/$path";
    }
    
    /**
     * Encodes a string following RFC 3986, adding "/" to the safe characters.
     * Assumes the $str is encoded in UTF-8.
     */
    private function _thumbrio_urlencode($str) {
        $length = strlen($str);
        $encoded = '';
        for ($i = 0; $i < $length; $i++) {
            $c = $str[$i];
            if (($c >= 'a' && $c <= 'z') ||
                ($c >= 'A' && $c <= 'Z') ||
                ($c >= '0' && $c <= '9') ||
                $c == '/' || $c == '-' || $c == '_' || $c == '.')
                $encoded .= $c;
            else
                $encoded .= '%' . strtoupper(bin2hex($c));
        }
        return $encoded;
    }

}