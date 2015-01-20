<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/20/15
 * Time: 2:14 AM
 */

namespace WebConsul\EbayApiBundle\Type;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("PaginationInput")
 */
class PaginationInput
{
    /**
     * @var integer
     * @SerializedName("entriesPerPage")
     */
    private $entriesPerPage;

    /**
     * @var integer
     * @SerializedName("pageNumber")
     */
    private $pageNumber;

    /**
     * @return int
     */
    public function getEntriesPerPage()
    {
        return $this->entriesPerPage;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setEntriesPerPage($value)
    {
        $this->entriesPerPage = $value;

        return $this;
    }

    /**
     * @return int
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setPageNumber($value)
    {
        $this->pageNumber = $value;

        return $this;
    }

}
