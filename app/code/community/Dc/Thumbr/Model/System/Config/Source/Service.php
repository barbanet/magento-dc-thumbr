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

class Dc_Thumbr_Model_System_Config_Source_Service
{
    
    const FREE = '1';
    const PAID = '2';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array(
                'value' => self::FREE,
                'label' => Mage::helper('thumbr')->__('Free')
            ),
            array(
                'value' => self::PAID,
                'label' => Mage::helper('thumbr')->__('Paid')
            )
        );
    }

}
