<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsByKeywords.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("FindItemsByImageRequest")
 */
class FindItemsByKeywordsCall extends BaseFindingCall
{
    /**
     * @XmlList(inline = true, entry = "aspectFilter")
     */
    private $aspectFilter;

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

}
