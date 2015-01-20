<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/20/15
 * Time: 1:45 AM
 */

namespace WebConsul\EbayApiBundle\Type;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

/**
 * @XmlRoot("itemFilter")
 */
class ItemFilter
{
    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var string
     * @SerializedName("paramName")
     */
    private $paramName;

    /**
     * @var string
     * @SerializedName("paramValue")
     */
    private $paramValue;

    /**
     * @var array
     * @XmlList(inline = true, entry = "value")
     */
    private $value;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    /**
     * @return string
     */
    public function getParamName()
    {
        return $this->paramName;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setParamName($name)
    {
        $this->paramName = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getParamValue()
    {
        return $this->paramValue;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setParamValue($value)
    {
        $this->paramValue = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param array $value
     * @return $this
     */
    public function setValue(array $value)
    {
        $this->value = $value;

        return $this;
    }
}
