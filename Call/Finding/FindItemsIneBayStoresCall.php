<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsIneBayStores.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

/**
 * @XmlRoot("FindItemsIneBayStoresRequest")
 */
class FindItemsIneBayStoresCall extends BaseFindingCall
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
     * @var string
     * @SerializedName("keywords")
     */
    private $keywords;

    /**
     * @XmlList(inline = true, entry = "outputSelector")
     */
    private $outputSelector;

    /**
     * @var  string
     * @SerializedName("storeName")
     */
    private $storeName;

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
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     * @return $this
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

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

    /**
     * @return string
     */
    public function getStoreName()
    {
        return $this->storeName;
    }

    /**
     * @param string $storeName
     * @return $this
     */
    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;

        return $this;
    }

}
