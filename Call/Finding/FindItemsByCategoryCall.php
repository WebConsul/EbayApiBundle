<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsByCategory.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("FindItemsAdvancedRequest")
 */
class FindItemsByCategoryCall extends BaseFindingCall
{
}
