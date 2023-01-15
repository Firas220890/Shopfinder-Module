<?php
/**
 * @author Firas
 * @package Firas_Shopfinder
 */

namespace Firas\Shopfinder\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Firas\Shopfinder\Model\ResourceModel\Grid\CollectionFactory as GridColFactory;

class ShopsList implements ResolverInterface
{
    protected GridColFactory $gridColFactory;

    /**
     * @param GridColFactory $gridColFactory
     */
    public function __construct(
        GridColFactory $gridColFactory
    ) {
        $this->gridColFactory = $gridColFactory;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $gridCol = $this->gridColFactory->create();
        $gridColData = $gridCol
            ->load();
//        $dataCol = $gridColData->getFirstItem();
        return $gridColData->getData();
    }
}
