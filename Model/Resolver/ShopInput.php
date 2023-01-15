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
use Firas\Shopfinder\Model\ShopDataCheck;

class ShopInput implements ResolverInterface
{
    /**
     * @var ShopDataCheck
     */
    private ShopDataCheck $shopDataCheck;

    /**
     * @param ShopDataCheck $shopDataCheck
     */
    public function __construct(
        ShopDataCheck $shopDataCheck
    ) {
        $this->shopDataCheck = $shopDataCheck;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (empty($args['input']) || !is_array($args['input'])) {
            throw new GraphQlInputException(__('"input" value should be specified'));
        }
        $response = $this->shopDataCheck->execute($args['input']);
        return [
            'success' => true,
            'message' =>$response
        ];
    }
}
