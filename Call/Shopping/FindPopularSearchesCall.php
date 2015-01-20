<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/FindPopularSearches.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("FindPopularSearchesRequest")
 */
class FindPopularSearchesCall extends BaseShoppingCall
{
    /**
     * @XmlList(inline = true, entry = "CategoryID")
     */
    private $categoryID;

    /**
     * @SerializedName("IncludeChildCategories")
     */
    private $includeChildCategories;

    /**
     * @var  integer
     * @SerializedName("MaxKeywords")
     */
    private $maxKeywords;

    /**
     * @var  integer
     * @SerializedName("MaxResultsPerPage")
     */
    private $maxResultsPerPage;

    /**
     * @XmlList(inline = true, entry = "QueryKeywords")
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
     * @return boolean
     */
    public function getIncludeChildCategories()
    {
        return $this->includeChildCategories;
    }

    /**
     * @param boolean $includeChildCategories
     * @return $this
     */
    public function setIncludeChildCategories($includeChildCategories)
    {
        $this->includeChildCategories = $includeChildCategories;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxKeywords()
    {
        return $this->maxKeywords;
    }

    /**
     * @param int $maxKeywords
     * @return $this
     */
    public function setMaxKeywords($maxKeywords)
    {
        $this->maxKeywords = $maxKeywords;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxResultsPerPage()
    {
        return $this->maxResultsPerPage;
    }

    /**
     * @param int $maxResultsPerPage
     * @return $this
     */
    public function setMaxResultsPerPage($maxResultsPerPage)
    {
        $this->maxResultsPerPage = $maxResultsPerPage;

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
