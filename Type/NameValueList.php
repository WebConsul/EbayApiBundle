<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/19/15
 * Time: 1:18 PM
 */

namespace WebConsul\EbayApiBundle\Type;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("NameValueList")
 */
class NameValueList
{
    /**
     * @var string
     * @SerializedName("Name")
     */
    private $name;

    /**
     * @XmlList(inline = true, entry = "Value")
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