<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetUserProfile.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("GetUserProfileRequest")
 */
class GetUserProfileCall extends BaseShoppingCall
{
    /**
     * @var string
     * @SerializedName("IncludeSelector")
     */
    private $includeSelector;

    /**
     * @var  string
     * @SerializedName("UserID")
     */
    private $userID;

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