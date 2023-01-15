<?php
/**
 * @author Firas
 * @package Firas_Shopfinder
 */

namespace Firas\Shopfinder\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Firas\Shopfinder\Helper\Data;

class ShopDataCheck
{
    /**
     * @var Data
     */
    protected Data $helperData;

    /**
     * @param Data $helperData
     */
    public function __construct(
        Data $helperData
    ) {
        $this->helperData = $helperData;
    }

    /**
     * @param array $data
     * @throws GraphQlInputException
     */
    public function execute($data)
    {
        try {
            $this->vaildateData($data);
            $response = $this->helperData->saveShop($data);

        } catch (LocalizedException $e) {
            throw new GraphQlInputException(__($e->getMessage()));
        }
        return $response;
    }

    /**
     * Handle bad request.
     *
     * @param array $data
     * @throws LocalizedException
     */
    private function vaildateData(array $data)
    {
        if (!isset($data['shop_id']) ||
            !isset($data['shop_name'])
        ) {
            throw new LocalizedException(__('Must be set required data'));
        }
    }
}
