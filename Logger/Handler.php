<?php
/**
 * Grid Logger Handler.
 * @package   Firas_Shopfinder
 * @author    Firas
 */

namespace Firas\Shopfinder\Logger;

class Handler extends \Magento\Framework\Logger\Handler\Base
{
    /**
     * Logging level.
     *
     * @var int
     */
    public $loggerType = Logger::INFO;

    /**
     * File name.
     *
     * @var string
     */
    public $fileName = '/var/log/grid.log';
}
