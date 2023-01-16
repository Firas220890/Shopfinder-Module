<?php
/**
 * Grid GridInterface.
 * @package   Firas_Shopfinder
 * @author    Firas
 */

namespace Firas\Shopfinder\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const TITLE = 'title';
    const COUNTRY = 'country';
    const IMAGE = 'image';
    const IS_ACTIVE = 'is_active';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';

   /**
    * Get EntityId.
    *
    * @return int
    */
    public function getEntityId();

   /**
    * Set EntityId.
    */
    public function setEntityId($entityId);

   /**
    * Get Title.
    *
    * @return varchar
    */
    public function getTitle();

   /**
    * Set Title.
    */
    public function setTitle($title);

   /**
    * Get Country.
    *
    * @return varchar
    */
    public function getCountry();

   /**
    * Set Country.
    */
    public function setCountry($country);

   /**
    * Get Image.
    *
    * @return varchar
    */
    public function getImage();

   /**
    * Set Image.
    */
    public function setImage($image);

   /**
    * Get IsActive.
    *
    * @return varchar
    */
    public function getIsActive();

   /**
    * Set StartingPrice.
    */
    public function setIsActive($isActive);

   /**
    * Get UpdateTime.
    *
    * @return varchar
    */
    public function getUpdateTime();

   /**
    * Set UpdateTime.
    */
    public function setUpdateTime($updateTime);

   /**
    * Get CreatedAt.
    *
    * @return varchar
    */
    public function getCreatedAt();

   /**
    * Set CreatedAt.
    */
    public function setCreatedAt($createdAt);
}
