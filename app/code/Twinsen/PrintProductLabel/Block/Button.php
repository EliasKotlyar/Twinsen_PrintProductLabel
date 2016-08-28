<?php

class Twinsen_PrintProductLabel_Block_Button extends Mage_Adminhtml_Block_Abstract
{
    public function getXml()
    {
        return Mage::helper('twinsen_printproductlabel')->getXml();
    }

    public function getProductId()
    {
        return Mage::registry('current_product')->getId();
    }
}