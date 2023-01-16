<?php

/**
 * Grid Grid Model.
 * @package   Firas_Shopfinder
 * @author    Firas
 */
namespace Firas\Shopfinder\Model;

use Firas\Shopfinder\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'shops_data';

    /**
     * @var string
     */
    protected $_cacheTag = 'shops_data';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'shops_data';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Firas\Shopfinder\Model\ResourceModel\Grid');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set Title.
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Get getCountry.
     *
     * @return varchar
     */
    public function getCountry()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Set Country.
     */
    public function setCountry($country)
    {
        return $this->setData(self::CONTENT, $country);
    }

    /**
     * Get Image.
     *
     * @return varchar
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * Set Image.
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
