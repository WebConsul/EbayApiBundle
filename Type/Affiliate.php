<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/20/15
 * Time: 2:00 AM
 */

namespace WebConsul\EbayApiBundle\Type;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("affiliate")
 */
class Affiliate
{
    /**
     * @var string
     * @SerializedName("customId")
     */
    private $customId;

    /**
     * @var boolean
     * @SerializedName("geoTargeting")
     */
    private $geoTargeting;

    /**
     * @var string
     * @SerializedName("networkId")
     */
    private $networkId;

    /**
     * @var string
     * @SerializedName("trackingId")
     */
    private $trackingId;

    /**
     * @return string
     */
    public function getCustomId()
    {
        return $this->customId;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setCustomId($id)
    {
        $this->customId = $id;

        return $this;
    }

    /**
     * @return bool
     */
    public function getGeoTargeting()
    {
        return $this->geoTargeting;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function setGeoTargeting($value)
    {
        $this->geoTargeting = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getNetworkId()
    {
        return $this->networkId;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setNetworkId($id)
    {
        $this->networkId = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingId()
    {
        return $this->trackingId;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setTrackingId($id)
    {
        $this->trackingId = $id;

        return $this;
    }
}
