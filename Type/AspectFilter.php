<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/20/15
 * Time: 1:34 AM
 */

namespace WebConsul\EbayApiBundle\Type;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

/**
 * @XmlRoot("aspectFilter")
 */
class AspectFilter
{
    /**
     * @var string
     * @SerializedName("aspectName")
     */
    private $name;

    /**
     * @var array
     * @XmlList(inline = true, entry = "aspectValueName")
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
