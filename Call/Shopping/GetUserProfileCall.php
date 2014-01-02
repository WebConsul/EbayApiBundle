<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetUserProfile.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

class GetUserProfileCall extends BaseShoppingCall
{
    /** @var array */
    private $includeSelector = array();
    /** @var  string */
    private $userID;

    /**
     * @return string
     */
    public function getInput()
    {
        if (!empty($this->includeSelector)) {
            $this->input .= '<IncludeSelector>' . implode(',', $this->includeSelector) . '</IncludeSelector>' . "\n";
        }
        if ($this->userID) {
            $this->input .= '<UserID>' . $this->userID . '</UserID>' . "\n";
        }

        return $this->input;
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

    /**
     * @return array
     */
    public function getIncludeSelector()
    {
        return $this->includeSelector;
    }

    /**
     * @param array $includeSelector
     * @return $this
     */
    public function setIncludeSelector($includeSelector)
    {
        $this->includeSelector = $includeSelector;

        return $this;
    }

}