<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/getSearchKeywordsRecommendation.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

class GetSearchKeywordsRecommendationCall extends BaseFindingCall
{
    /** @var string */
    private $keywords;

    /**
     * @return string
     */
    public function getInput()
    {
        if ($this->keywords) {
            $this->input .= '<keywords>' . $this->keywords . '</keywords>' . "\n";
        }

        return $this->input;
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


}