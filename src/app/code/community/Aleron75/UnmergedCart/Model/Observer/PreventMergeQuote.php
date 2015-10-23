<?php
class Aleron75_UnmergedCart_Model_Observer_PreventMergeQuote
{
    /**
     * @param Varien_Event_Observer $observer
     * @event sales_quote_merge_before
     */
    public function observe(Varien_Event_Observer $observer)
    {
        /** @var Mage_Sales_Model_Quote $customerQuote */
        $customerQuote = $observer->getQuote();

        /** @var Mage_Sales_Model_Quote $sourceQuote */
        $sourceQuote = $observer->getSource();

        if ($customerQuote->getId() && $sourceQuote->getId() != $customerQuote->getId()) {
            /** @var Mage_Sales_Model_Quote_Item $item */
            foreach ($customerQuote->getAllItems() as $item) {
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