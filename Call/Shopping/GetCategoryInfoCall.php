<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetCategoryInfo.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("GetCategoryInfoRequest")
 */
class GetCategoryInfoCall extends BaseShoppingCall
{
    /**
     * @var string
     * @SerializedName(value="CategoryID")
     */
    private $categoryID;

    /**
     * @var  string
     * @SerializedName(value="IncludeSelector")
     */
    private $includeSelector;

    /**
     * @return string
     */
    public function getCategoryID()
    {
        return $this->categoryID;
    }

    /**
     * @param string $categoryID
     * @return $this
     */
    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;

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

}
