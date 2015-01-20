<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsByCategory.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;

/**
 * @XmlRoot("FindItemsAdvancedRequest")
 */
class FindItemsByCategoryCall extends BaseFindingCall
{
    /**
     * @XmlList(inline = true, entry = "aspectFilter")
     */
    private $aspectFilter;

    /**
     * @XmlList(inline = true, entry = "categoryId")
     */
    private $categoryId;

    /**
     * @XmlList(inline = true, entry = "itemFilter")
     */
    private $itemFilter;

    /**
     * @XmlList(inline = true, entry = "outputSelector")
     */
    private $outputSelector;

    /**
     * @return array
     */
    public function getAspectFilter()
    {
        return $this->aspectFilter;
    }

    /**
     * @param array $aspectFilter
     * @return $this
     */
    public function setAspectFilter($aspectFilter)
    {
        $this->aspectFilter = $aspectFilter;

        return $this;
    }

    /**
     * @return array
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param array $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return array
     */
    public function getItemFilter()
    {
        return $this->itemFilter;
    }

    /**
     * @param array $itemFilter
     * @return $this
     */
    public function setItemFilter($itemFilter)
    {
        $this->itemFilter = $itemFilter;

        return $this;
    }

    /**
     * @return array
     */
    public function getOutputSelector()
    {
        return $this->outputSelector;
    }

    /**
     * @param array $outputSelector
     * @return $this
     */
    public function setOutputSelector($outputSelector)
    {
        $this->outputSelector = $outputSelector;

        return $this;
    }

}