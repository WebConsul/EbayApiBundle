<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsByProduct.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * @XmlRoot("FindProductsRequest")
 */
class FindItemsByProductCall extends BaseFindingCall
{

    /**
     * @Type("WebConsul\EbayApiBundle\Type\ProductID")
     * @SerializedName("productId")
     */
    private $productId;

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     * @return $this
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

}
