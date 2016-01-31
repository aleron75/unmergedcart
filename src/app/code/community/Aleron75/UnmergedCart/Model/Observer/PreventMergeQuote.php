<?php
class Aleron75_UnmergedCart_Model_Observer_PreventMergeQuote
{
    /**
     * @param Varien_Event_Observer $observer
     * @event sales_quote_merge_before
     */
    public function observe(Varien_Event_Observer $observer)
    {
        /** @var Aleron75_UnmergedCart_Helper_Data $h */
        $h = Mage::helper('aleron75_unmergedcart');
        if (!$h->isActive()) {
            return;
        }

        /** @var Mage_Sales_Model_Quote $customerQuote */
        $customerQuote = $observer->getQuote();

        /** @var Mage_Sales_Model_Quote $sessionQuote */
        $sessionQuote = $observer->getSource();

        if ($customerQuote->getId() && $sessionQuote->getId() != $customerQuote->getId()) {

            /** @var Mage_Sales_Model_Quote $discardableQuote */
            $discardableQuote = $h->isKeepSessionCart()
                ? $customerQuote
                : $sessionQuote;

            /** @var Mage_Sales_Model_Quote_Item $item */
            foreach ($discardableQuote->getAllItems() as $item) {
                $item->isDeleted(true);
                if ($item->getHasChildren()) {
                    /** @var Mage_Sales_Model_Quote_Item_Abstract $child */
                    foreach ($item->getChildren() as $child) {
                        $child->isDeleted(true);
                    }
                }
            }
        }
    }
}