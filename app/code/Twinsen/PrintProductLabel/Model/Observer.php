<?php

class Twinsen_PrintProductLabel_Model_Observer
{
    /**
     * Add a new button next to the existing "Save and Continue Edit" button
     *
     * @return void
     */
    public function addButton()
    {
// Retrieve layout
        $layout = Mage::app()->getLayout();

// Retrieve product_edit block
        $productEditBlock = $layout->getBlock('product_edit');

// Retrieve original "Save and Continue Edit" button
        $saveAndContinueButton = $productEditBlock->getChild('save_and_edit_button');


        $myButton = $layout->createBlock('twinsen_printproductlabel/button')->setTemplate('twinsen_printproductlabel/printproductlabel.phtml');


// Create a container that will gather existing "Save and Continue Edit" button and the new button
        $container = $layout->createBlock('core/text_list', 'button_container');

// Append existing "Save and Continue Edit" button and the new button to the container
        $container->append($myButton);

        $container->append($saveAndContinueButton);


// Replace the existing "Save and Continue Edit" button with our container
        $productEditBlock->setChild('save_and_edit_button', $container);
    }


}