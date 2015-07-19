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
 * @copyright  Copyright (c) 2013-2015 Damián Culotta. (http://www.damianculotta.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Dc_Thumbr_Model_System_Config_Source_Crop
{
    
    const NONE = null;
    const FILL = 'f';
    const SMART_CROP = 's';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array(
                'value' => self::NONE,
                'label' => Mage::helper('thumbr')->__('None')
            ),
            array(
                'value' => self::FILL,
                'label' => Mage::helper('thumbr')->__('Fill')
            ),
            array(
                'value' => self::SMART_CROP,
                'label' => Mage::helper('thumbr')->__('Smart Crop')
            )
        );
    }
    
}
