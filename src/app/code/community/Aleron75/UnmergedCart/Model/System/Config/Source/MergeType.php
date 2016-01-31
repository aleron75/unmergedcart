<?php
class Aleron75_UnmergedCart_Model_System_Config_Source_MergeType
{
    const MERGETYPE_DEFAULT = 0;
    const MERGETYPE_SESSION = 1;
    const MERGETYPE_CUSTOMER = 2;

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => self::MERGETYPE_DEFAULT, 'label'=>Mage::helper('aleron75_unmergedcart')->__('Yes: default behavior')),
            array('value' => self::MERGETYPE_SESSION, 'label'=>Mage::helper('aleron75_unmergedcart')->__('No: use session cart')),
            array('value' => self::MERGETYPE_CUSTOMER, 'label'=>Mage::helper('aleron75_unmergedcart')->__('No: use customer cart')),
        );
    }
}