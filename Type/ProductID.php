<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/19/15
 * Time: 4:05 AM
 */

namespace WebConsul\EbayApiBundle\Type;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

/**
 * @XmlRoot("ProductID")
 */
class ProductID
{
    /** @XmlAttribute */
    private $type;

    /** @XmlValue */
    private $value;

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}