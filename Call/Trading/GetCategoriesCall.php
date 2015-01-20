<?php
/**
 * @link http://developer.ebay.com/DevZone/xml/docs/Reference/ebay/GetCategories.html
 */

namespace WebConsul\EbayApiBundle\Call\Trading;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("GetCategoriesRequest")
 */
class GetCategoriesCall extends BaseTradingCall
{
    /**
     * @XmlList(inline = true, entry = "CategoryParent")
     */
    private $categoryParent;

    /**
     * @var string
     * @SerializedName("CategorySiteID")
     */
    private $categorySiteID;

    /**
     * @var integer
     * @SerializedName("LevelLimit")
     */
    private $levelLimit;

    /** @var boolean
     * @SerializedName("ViewAllNodes")
     */
    private $viewAllNodes;


    /**
     * @return array
     */
    public function getCategoryParent()
    {
        return $this->categoryParent;
    }

    /**
     * @param array $categoryParent
     * @return $this
     */
    public function setCategoryParent(array $categoryParent)
    {
        $this->categoryParent = $categoryParent;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategorySiteID()
    {
        return $this->categorySiteID;
    }

    /**
     * @param mixed $categorySiteID
     * @return $this
     */
    public function setCategorySiteID($categorySiteID)
    {
        $this->categorySiteID = $categorySiteID;

        return $this;
    }

    /**
     * @return int
     */
    public function getLevelLimit()
    {
        return $this->levelLimit;
    }

    /**
     * @param int $levelLimit
     * @return $this
     */
    public function setLevelLimit($levelLimit)
    {
        $this->levelLimit = $levelLimit;

        return $this;
    }

    /**
     * @return bool
     */
    public function getViewAllNodes()
    {
        return $this->viewAllNodes;
    }

    /**
     * @param bool $viewAllNodes
     * @return $this
     */
    public function setViewAllNodes($viewAllNodes)
    {
        $this->viewAllNodes = $viewAllNodes;

        return $this;
    }


}