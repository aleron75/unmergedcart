<?php
class Aleron75_UnmergedCart_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_MERGETYPE = 'checkout/cart/aleron75_unmergedcart_merge_type';

    public function isActive()
    {
        return $this->getMergeType() != Aleron75_UnmergedCart_Model_System_Config_Source_MergeType::MERGETYPE_DEFAULT;
    }

    public function getMergeType()
    {
        return Mage::getStoreConfig(self::XML_PATH_MERGETYPE);
    }

    public function isKeepSessionCart()
    {
        return $this->getMergeType() == Aleron75_UnmergedCart_Model_System_Config_Source_MergeType::MERGETYPE_SESSION;
    }

    public function isKeepCustomerCart()
    {
        return $this->getMergeType() == Aleron75_UnmergedCart_Model_System_Config_Source_MergeType::MERGETYPE_CUSTOMER;
    }
}
