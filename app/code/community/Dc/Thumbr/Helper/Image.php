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

class Dc_Thumbr_Helper_Image extends Mage_Catalog_Helper_Image
{

    /**
     * Return Image URL
     *
     * @return bool|string
     */
    public function __toString()
    {
        try {
            $model = $this->_getModel();
            if ($this->getImageFile()) {
                $model->setBaseFile($this->getImageFile());
            } else {
                $model->setBaseFile($this->getProduct()->getData($model->getDestinationSubdir()));
            }
            $url = false;
            if (Mage::helper('thumbr')->isEnable()) {
                if ((string)$model->getWidth()) {
                    $_size = (string)$model->getWidth();
                } else {
                    $_size = (string)1200;
                }
                $_image_name = substr($model->getNewFile(), (strrpos($model->getNewFile(), '/')+1), strlen($model->getNewFile()));
                $_effect = Mage::getStoreConfig('thumbr/filters/effect');
                if ($_effect) {
                    $_thumbr = Mage::helper('thumbr')->thumbrio($model->getUrl(), $_size . Mage::getStoreConfig('thumbr/filters/crop') , $_image_name, 'effects=' . $_effect);
                } else {
                    $_thumbr = Mage::helper('thumbr')->thumbrio($model->getUrl(), $_size . Mage::getStoreConfig('thumbr/filters/crop') , $_image_name);
                }
                if ($this->_fileExists($_thumbr)) {
                    $url = $_thumbr;
                }
            }
            if (!$url) {
                if ($model->isCached()) {
                    $url = $model->getUrl();
                } else {
                    if ($this->_scheduleRotate) {
                        $model->rotate($this->getAngle());
                    }
                    if ($this->_scheduleResize) {
                        $model->resize();
                    }
                    if ($this->getWatermark()) {
                        $model->setWatermark($this->getWatermark());
                    }
                    $url = $model->saveFile()->getUrl();
                }
            }
        } catch (Exception $e) {
            $url = Mage::getDesign()->getSkinUrl($this->getPlaceholder());
        }
        return $url;
    }

    /**
     * @param $url
     * @return bool
     */
    private function _fileExists($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_NOBODY, 1);
        curl_setopt($curl, CURLOPT_FAILONERROR, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        if (curl_exec($curl) !== false) {
            return true;
        } else {
            return false;
        }
    }

}
