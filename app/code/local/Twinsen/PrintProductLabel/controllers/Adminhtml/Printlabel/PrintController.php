<?php

class Twinsen_PrintProductLabel_Adminhtml_Printlabel_PrintController extends Mage_Adminhtml_Controller_Action
{

    public function printAction()
    {
        $productId = $this->getRequest()->getParam('id');

        $this->getResponse ()
            ->setHttpResponseCode ( 200 )
            ->setHeader ( 'Pragma', 'public', true )
            ->setHeader ( 'Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true )
            /* View in browser */
            //->setHeader ( 'Content-type', 'application/pdf', true )
            /*  Download */
            ->setHeader ( 'Content-type', 'application/force-download' )

            ->setHeader ('Content-Disposition', 'inline' . '; filename=' . "label.label" );
        $this->getResponse ()->clearBody ();
        $this->getResponse ()->sendHeaders ();

        echo Mage::helper('twinsen_printproductlabel')->getXml($productId);
    }


}