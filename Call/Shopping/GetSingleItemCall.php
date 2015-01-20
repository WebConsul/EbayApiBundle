<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetSingleItem.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("GetSingleItemRequest")
 */
class GetSingleItemCall extends BaseShoppingCall
{
    /**
     * @var string
     * @SerializedName("IncludeSelector")
     */
    private $includeSelector;

    /**
     * @var string
     * @SerializedName("ItemID")
     */
    private $itemID;

    /**
     * @var string
     * @SerializedName("VariationSKU")
     */
    private $variationSKU;

    /**
     * @XmlList(entry = "NameValueList")
     * @SerializedName("VariationSpecifics")
     */
    private $variationSpecifics;

    /**
     * @return string
     */
    public function getItemID()
    {
        return $this->itemID;
    }

    /**
     * @param string $itemID
     * @return $this
     */
    public function setItemID($itemID)
    {
        $this->itemID = $itemID;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncludeSelector()
    {
        return $this->includeSelector;
    }

    /**
     * @param string $includeSelector
     * @return $this
     */
    public function setIncludeSelector($includeSelector)
    {
        $this->includeSelector = $includeSelector;

        return $this;
    }

    /**
     * @return string
     */
    public function getVariationSKU()
    {
        return $this->variationSKU;
    }

    /**
     * @param string $variationSKU
     * @return $this
     */
    public function setVariationSKU($variationSKU)
    {
        $this->variationSKU = $variationSKU;

        return $this;
    }

    /**
     * @return array
     */
    public function getVariationSpecifics()
    {
        return $this->variationSpecifics;
    }

    /**
     * @param array $variationSpecifics
     * @return $this
     */
    public function setVariationSpecifics(array $variationSpecifics)
    {
        $this->variationSpecifics = $variationSpecifics;

        return $this;
    }

}
