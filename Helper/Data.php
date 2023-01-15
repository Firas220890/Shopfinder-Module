<?php
/**
 * @author Firas
 * @package Firas_Shopfinder
 */

namespace Firas\Shopfinder\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Firas\Shopfinder\Model\ResourceModel\Grid\CollectionFactory as GridColFactory;
use Firas\Shopfinder\Model\GridFactory as GridModelFactory;
use Firas\Shopfinder\Model\ResourceModel\Grid as GridModel;

Class Data extends AbstractHelper
{
    protected GridColFactory $gridColFactory;
    protected GridModelFactory $gridModelFactory;
    protected GridModel $gridModel;
    /**
     * @param Context $context
     * @param GridColFactory $gridColFactory
     * @param GridModelFactory $gridModelFactory
     * @param GridModel $gridModel
     */

    public function __construct(
        Context $context,
        GridColFactory $gridColFactory,
        GridModelFactory $gridModelFactory,
        GridModel $gridModel
    )
    {
        parent::__construct($context);
        $this->gridColFactory = $gridColFactory;
        $this->gridModelFactory = $gridModelFactory;
        $this->gridModel = $gridModel;
    }

    /**
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function saveShop($data): string
    {
      $shopId = $data['shop_id'];
      $shopName = $data['shop_name'];
        $country = $data['country_code'];
        $imageName = $data['base64_encoded_file'];
        $gridCol = $this->gridColFactory->create();
        $gridColData = $gridCol
            ->addFieldToFilter('entity_id', $shopId)
            ->addFieldToSelect('entity_id')
            ->load();
        $dataCol = $gridColData->getFirstItem();
        $dataId = $dataCol->getEntityId();
        if ($dataId) {
            $gridData = $this->gridModelFactory->create();
            $this->gridModel->load($gridData, $dataId);
            $gridData->setTitle($shopName);
            $gridData->setCountry($country);
            $imageNew = $this->saveImage($imageName);
            $gridData->setImage($imageNew);
            $this->gridModel->save($gridData);

            return "Shop data with id ".$shopId.' updated';
        } else {
            return "Entered shop does not exist with id: ".$shopId;
        }

    }

    public function getShopById($data): array
    {
        $shopId = $data['shop_id'];
        $gridCol = $this->gridColFactory->create();
        $gridColData = $gridCol
            ->addFieldToFilter('entity_id', $shopId)
            ->load();
        $dataCol = $gridColData->getFirstItem();
        return $dataCol->getData();
    }

    public function saveImage($image)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $fileSystem = $objectManager->create('\Magento\Framework\Filesystem');
        $mediaPath = $fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath();
        $media = $mediaPath . 'Firas/Shopfinder/images/';
        $imagePath = 'Firas/Shopfinder/images/';
        $data = $image;
        $data = base64_decode($data);
        $name = 'test';
        $finalName = $name . uniqid() . '.png';
        $imageToSave = $media.$finalName;
        $imageGraphQL = $imagePath.$finalName;
        if (file_put_contents($imageToSave, $data)) {
            return $imageGraphQL;
        } else {
            return NULL;
        }
    }
}
