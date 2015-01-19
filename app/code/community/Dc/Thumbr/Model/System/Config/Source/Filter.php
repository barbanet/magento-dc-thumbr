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

class Dc_Thumbr_Model_System_Config_Source_Filter
{
    
    const NONE = null;
    const BARCELONA = 'barcelona';
    const BROWN = 'brown';
    const BW = 'bw';
    const CANARY = 'canary';
    const COOL = 'cool';
    const FIRE = 'fire';
    const FUN = 'fun';
    const HIPSTER = 'hipster';
    const LOVE = 'love';
    const MARC = 'marc';
    const NYC = 'nyc';
    const OLD = 'old';
    const SEPIA = 'sepia';
    const SUMMER = 'summer';
    const SUNSHINE = 'sunshine';
    const TALES = 'tales';
    const THAMES = 'thames';
    const TRENDY = 'trendy';
    const WATER = 'water';
    
    public function toOptionArray()
    {
        return array(
            array(
                'value' => self::NONE,
                'label' => Mage::helper('thumbr')->__('None')
            ),
            array(
                'value' => self::BARCELONA,
                'label' => Mage::helper('thumbr')->__('Barcelona')
            ),
            array(
                'value' => self::BW,
                'label' => Mage::helper('thumbr')->__('Black & White')
            ),
            array(
                'value' => self::BROWN,
                'label' => Mage::helper('thumbr')->__('Brown')
            ),
            array(
                'value' => self::CANARY,
                'label' => Mage::helper('thumbr')->__('Canary')
            ),
            array(
                'value' => self::COOL,
                'label' => Mage::helper('thumbr')->__('Cool')
            ),
            array(
                'value' => self::FIRE,
                'label' => Mage::helper('thumbr')->__('Fire')
            ),
            array(
                'value' => self::FUN,
                'label' => Mage::helper('thumbr')->__('Fun')
            ),
            array(
                'value' => self::HIPSTER,
                'label' => Mage::helper('thumbr')->__('Hipster')
            ),
            array(
                'value' => self::LOVE,
                'label' => Mage::helper('thumbr')->__('Love')
            ),
            array(
                'value' => self::MARC,
                'label' => Mage::helper('thumbr')->__('Marc')
            ),
            array(
                'value' => self::NYC,
                'label' => Mage::helper('thumbr')->__('Nyc')
            ),
            array(
                'value' => self::OLD,
                'label' => Mage::helper('thumbr')->__('Old')
            ),
            array(
                'value' => self::SEPIA,
                'label' => Mage::helper('thumbr')->__('Sepia')
            ),
            array(
                'value' => self::SUMMER,
                'label' => Mage::helper('thumbr')->__('Summer')
            ),
            array(
                'value' => self::SUNSHINE,
                'label' => Mage::helper('thumbr')->__('Sunshine')
            ),
            array(
                'value' => self::TALES,
                'label' => Mage::helper('thumbr')->__('Tales')
            ),
            array(
                'value' => self::THAMES,
                'label' => Mage::helper('thumbr')->__('Thames')
            ),
            array(
                'value' => self::TRENDY,
                'label' => Mage::helper('thumbr')->__('Trendy')
            ),
            array(
                'value' => self::WATER,
                'label' => Mage::helper('thumbr')->__('Water')
            )
        );
    }
    
}