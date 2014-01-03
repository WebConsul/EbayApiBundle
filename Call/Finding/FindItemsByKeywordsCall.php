<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsByKeywords.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

class FindItemsByKeywordsCall extends BaseFindingCall
{
    /** @var string */
    private $keywords;
    /** @var array */
    private $outputSelector = array();

    public $standardInputFields = array(
        'affiliate',
        'buyerPostalCode',
        'paginationInput',
        'sortOrder',
    );

    /**
     * @return string
     */
    public function getInput()
    {

        if ($this->keywords) {
            $this->input .= '<keywords>' . $this->keywords . '</keywords>' . "\n";
        }
        if (!empty($this->aspectFilter)) {
            $this->input .= $this->performAspectFilter();
        }
        if (!empty($this->domainFilter)) {
            $this->input .= $this->performDomainFilter();
        }
        if (!empty($this->itemFilter)) {
            $this->input .= $this->performItemFilter();
        }
        if (!empty($this->outputSelector)) {
            foreach ($this->outputSelector as $outputSelector) {
                $this->input .= '<outputSelector>' . $outputSelector . '</outputSelector>' . "\n";
            }
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