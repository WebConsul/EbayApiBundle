<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetShippingCosts.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

class GetShippingCostsCall extends BaseShoppingCall
{
    /** @var  string */
    private $destinationCountryCode;
    /** @var  string */
    private $destinationPostalCode;
    /** @var  bool */
    private $includeDetails;
    /** @var string */
    private $itemID;
    /** @var  int */
    private $quantitySold;


    /**
     * @return string
     */
    public function getInput()
    {
        if ($this->destinationCountryCode) {
            $this->input .= '<DestinationCountryCode>' . $this->destinationCountryCode . '</DestinationCountryCode>' . "\n";
        }
        if ($this->destinationPostalCode) {
            $this->input .= '<DestinationPostalCode>' . $this->destinationPostalCode . '</DestinationPostalCode>' . "\n";
        }
        if ($this->includeDetails) {
            $this->input .= '<IncludeDetails>' . $this->includeDetails . '</IncludeDetails>' . "\n";
        }
        if ($this->itemID) {
            $this->input .= '<ItemID>' . $this->itemID . '</ItemID>' . "\n";
        }
        if ($this->quantitySold > 0) {
            $this->input .= '<QuantitySold>' . $this->quantitySold . '</QuantitySold>' . "\n";
        }

        return $this->input;
    }

    /**
     * @return string
     */
    public function getItemID()
    {
        return $this->itemID;
    }

    /**
     * @param string $itemID
     * @return $this
     */
    public function setItemID($itemID)
    {
        $this->itemID = $itemID;

        return $this;
    }

    /**
     * @return string
     */
    public function getDestinationCountryCode()
    {
        return $this->destinationCountryCode;
    }

    /**
     * @param string $destinationCountryCode
     * @return $this
     */
    public function setDestinationCountryCode($destinationCountryCode)
    {
        $this->destinationCountryCode = $destinationCountryCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getDestinationPostalCode()
    {
        return $this->destinationPostalCode;
    }

    /**
     * @param string $destinationPostalCode
     * @return $this
     */
    public function setDestinationPostalCode($destinationPostalCode)
    {
        $this->destinationPostalCode = $destinationPostalCode;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getIncludeDetails()
    {
        return $this->includeDetails;
    }

    /**
     * @param boolean $includeDetails
     * @return $this
     */
    public function setIncludeDetails($includeDetails)
    {
        $this->includeDetails = $includeDetails;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantitySold()
    {
        return $this->quantitySold;
    }

    /**
     * @param int $quantitySold
     * @return $this
     */
    public function setQuantitySold($quantitySold)
    {
        $this->quantitySold = $quantitySold;

        return $this;
    }

}