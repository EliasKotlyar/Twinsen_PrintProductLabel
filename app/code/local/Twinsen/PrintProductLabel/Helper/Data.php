<?php
/**
 * Created by PhpStorm.
 * User: eko
 * Date: 3/1/16
 * Time: 12:45 PM
 */ 
class Twinsen_PrintProductLabel_Helper_Data extends Mage_Core_Helper_Abstract {
    const UPLOAD_XML = "twinsen_printproductlabel/settings/upload";
    public function getXml($productID = null){
        if($productID == null){
            $productID = Mage::registry('current_product')->getId();
        }


        $product = Mage::getModel('catalog/product')->load($productID);
        $attrArray = $product->getData();
        $xmlFile = $this->getXmlFileContent();
        foreach($attrArray as $key=>$value){
            $key = '#'.strtoupper($key).'#';
            //echo $key;
            $xmlFile = str_replace($key,$value,$xmlFile);
        }
        $bom = pack("CCC", 0xef, 0xbb, 0xbf);
        if (0 === strncmp($xmlFile, $bom, 3)) {
            $xmlFile = substr($xmlFile, 3);
        }

        return $xmlFile;

    }
    public function getXmlFileContent(){

        return file_get_contents($this->getXmlFileName());
    }
    public function getXmlFileName(){
        return Mage::getBaseDir('media') .DS.'printuploads'.DS. Mage::getStoreConfig(self::UPLOAD_XML);
    }
}