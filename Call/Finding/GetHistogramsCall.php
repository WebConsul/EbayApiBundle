<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/getHistograms.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

class GetHistogramsCall extends BaseFindingCall
{
    /** @var string */
    private $categoryId;

    /**
     * @return string
     */
    public function getInput()
    {
        if ($this->categoryId) {
            $this->input .= '<categoryId>' . $this->categoryId . '</categoryId>' . "\n";
        }

        return $this->input;
    }

    /**
     * @return array
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param array $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

}