<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findCompletedItems.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use WebConsul\EbayApiBundle\Type\ProductID;

/**
 * @XmlRoot("FindCompletedItemsRequest")
 */
class FindCompletedItemsCall extends BaseFindingCall
{
    /**
     * @Type("WebConsul\EbayApiBundle\Type\ProductID")
     * @SerializedName("ProductId")
     */
    private $productId;

    /**
     * @return ProductID
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param ProductID $productId
     * @return $this
     */
    public function setProductId(ProductID $productId)
    {
        $this->productId = $productId;

        return $this;
    }

}
