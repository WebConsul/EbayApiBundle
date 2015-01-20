<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetShippingCosts.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;
/**
 * @XmlRoot("GetShippingCostsRequest")
 */
class GetShippingCostsCall extends BaseShoppingCall
{
    /**
     * @var string
     * @SerializedName("DestinationCountryCode")
     */
    private $destinationCountryCode;

    /**
     * @var string
     * @SerializedName("DestinationPostalCode")
     */
    private $destinationPostalCode;

    /**
     * @var boolean
     * @SerializedName("IncludeDetails")
     */
    private $includeDetails;

    /**
     * @var string
     * @SerializedName("ItemID")
     */
    private $itemID;

    /**
     * @var integer
     * @SerializedName("QuantitySold")
     */
    private $quantitySold;


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
