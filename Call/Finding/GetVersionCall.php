<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/getVersion.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("GetVersionRequest")
 */
class GetVersionCall extends BaseFindingCall
{
}
