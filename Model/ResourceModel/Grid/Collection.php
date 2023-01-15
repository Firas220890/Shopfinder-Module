<?php

/**
 * Grid Grid Collection.
 * @package   Firas_Shopfinder
 * @author    Firas
 */
namespace Firas\Shopfinder\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            'Firas\Shopfinder\Model\Grid',
            'Firas\Shopfinder\Model\ResourceModel\Grid'
        );
    }
}
