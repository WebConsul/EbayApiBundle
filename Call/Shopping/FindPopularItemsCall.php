<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/FindPopularItems.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("FindPopularItemsRequest")
 */
class FindPopularItemsCall extends BaseShoppingCall
{
    /**
     * @XmlList(inline = true, entry = "CategoryID")
     */
    private $categoryID;

    /**
     * @XmlList(inline = true, entry = "CategoryIDExclude")
     */
    private $categoryIDExclude;

    /**
     * @var  string
     * @SerializedName("QueryKeywords")
     */
    private $queryKeywords;


    /**
     * @return array
     */
    public function getCategoryID()
    {
        return $this->categoryID;
    }

    /**
     * @param array $categoryID
     * @return $this
     */
    public function setCategoryID(array $categoryID)
    {
        $this->categoryID = $categoryID;

        return $this;
    }

    /**
     * @return array
     */
    public function getCategoryIDExclude()
    {
        return $this->categoryIDExclude;
    }

    /**
     * @param array $categoryIDExclude
     * @return $this
     */
    public function setCategoryIDExclude(array $categoryIDExclude)
    {
        $this->categoryIDExclude = $categoryIDExclude;

        return $this;
    }

    /**
     * @return string
     */
    public function getQueryKeywords()
    {
        return $this->queryKeywords;
    }

    /**
     * @param string $queryKeywords
     * @return $this
     */
    public function setQueryKeywords($queryKeywords)
    {
        $this->queryKeywords = $queryKeywords;

        return $this;
    }

}
