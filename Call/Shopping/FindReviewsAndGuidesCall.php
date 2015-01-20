<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/FindReviewsAndGuides.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;
use WebConsul\EbayApiBundle\Type\ProductID;

/**
 * @XmlRoot("FindReviewsAndGuidesRequest")
 */
class FindReviewsAndGuidesCall extends BaseShoppingCall
{
    /**
     * @var string
     * @SerializedName(value="CategoryID")
     */
    private $categoryID;

    /**
     * @var  integer
     * @SerializedName(value="MaxResultsPerPage")
     */
    private $maxResultsPerPage;

    /**
     * @var  string
     * @SerializedName(value="ReviewSort")
     */
    private $reviewSort;

    /**
     * @var  string
     * @SerializedName(value="SortOrder")
     */
    private $sortOrder;

    /**
     * @var  string
     * @SerializedName(value="UserID")
     */
    private $userID;

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
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param string $sortOrder
     * @return $this
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return string
     */
    public function getReviewSort()
    {
        return $this->reviewSort;
    }

    /**
     * @param string $reviewSort
     * @return $this
     */
    public function setReviewSort($reviewSort)
    {
        $this->reviewSort = $reviewSort;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param string $userID
     * @return $this
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }

}
