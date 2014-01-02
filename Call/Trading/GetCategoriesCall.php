<?php
/**
 * @link http://developer.ebay.com/DevZone/xml/docs/Reference/ebay/GetCategories.html
 */

namespace WebConsul\EbayApiBundle\Call\Trading;

class GetCategoriesCall extends BaseTradingCall
{
    private $categoryParent = array();
    private $categorySiteID;
    private $levelLimit;
    private $viewAllNodes;
    private $standardInputFields = array(
        'DetailLevel',
        'ErrorLanguage',
        'MessageID',
        'OutputSelector',
        'Version',
        'WarningLevel'
    );


    /**
     * @return mixed
     */
    public function getInput()
    {
        $this->input .= '<RequesterCredentials><eBayAuthToken>' . parent::$parameters['auth_token'] . '</eBayAuthToken></RequesterCredentials>' . "\n";
        if (!empty($this->categoryParent)) {
            foreach ($this->categoryParent as $parent) {
                $this->input .= '<CategoryParent>' . $parent . '</CategoryParent>' . "\n";
            }
        }
        if ($this->categorySiteID) {
            $this->input .= '<CategorySiteID>' . $this->categorySiteID . '</CategorySiteID>' . "\n";
        }
        if ($this->levelLimit) {
            $this->input .= '<LevelLimit>' . $this->levelLimit . '</LevelLimit>' . "\n";
        }
        if ($this->viewAllNodes) {
            $this->input .= '<ViewAllNodes>' . $this->viewAllNodes . '</ViewAllNodes>' . "\n";
        }

        return $this->input;
    }


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

    /**
     * @return array
     */
    public function getStandardInputFields()
    {
        return $this->standardInputFields;
    }

}