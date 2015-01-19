/**
 * Dc_Regions
 * 
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Dc
 * @package    Dc_Regions
 * @copyright  Copyright (c) 2014 Damián Culotta. (http://www.damianculotta.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

Validation.add('region-code', 'Text length does not satisfy specified text range.', function (v) {
    var code=v.strip();
    if (code.length >= 1 && code.length <= 32) {
        return true;
    }
    return false;
});