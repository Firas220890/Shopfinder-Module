<?php

/**
 * Shop Save Controller.
 * @package   Firas_Shopfinder
 * @author    Firas
 */
namespace Firas\Shopfinder\Controller\Adminhtml\Grid;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Firas\Shopfinder\Model\GridFactory
     */
    var $gridFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Firas\Shopfinder\Model\GridFactory $gridFactory
     */

     /**
* @var \Magento\Framework\Image\AdapterFactory
*/
protected $adapterFactory;
/**
* @var \Magento\MediaStorage\Model\File\UploaderFactory
*/
protected $uploader;
/**
* @var \Magento\Framework\Filesystem
*/
protected $filesystem;
/**
* @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
*/
protected $timezoneInterface;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Firas\Shopfinder\Model\GridFactory $gridFactory,
        \Magento\Framework\Image\AdapterFactory $adapterFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploader,
        \Magento\Framework\Filesystem $filesystem
    ) {
        $this->adapterFactory = $adapterFactory;
        $this->uploader = $uploader;
        $this->filesystem = $filesystem;
        parent::__construct($context);
        $this->gridFactory = $gridFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $profileImage = $this->getRequest()->getFiles('image');

        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('grid/grid/addrow');
            return;
        }
        try {
          //start block upload image
            if (isset($_FILES['image']) && isset($_FILES['image']['name']) && strlen($_FILES['image']['name'])) {
            /*
            * Save image upload
            */
            try {
                $base_media_path = 'Firas/Shopfinder/images';
                $uploader = $this->uploader->create(
                    ['fileId' => 'image']
                );
                $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $imageAdapter = $this->adapterFactory->create();
                $uploader->addValidateCallback('image', $imageAdapter, 'validateUploadFile');
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(true);
                $mediaDirectory = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
                $result = $uploader->save($mediaDirectory->getAbsolutePath($base_media_path));
                $data['image'] = $base_media_path.$result['file'];
            } catch (\Exception $e) {
                if ($e->getCode() == 0) {
                    $this->messageManager->addError($e->getMessage());
                }
            }
            } else {
                if (isset($data['image']) && isset($data['image']['value'])) {
                    if (isset($data['image']['delete'])) {
                        $data['image'] = null;
                        $data['delete_image'] = true;
                    } elseif (isset($data['image']['value'])) {
                        $data['image'] = $data['image']['value'];
                    } else {
                        $data['image'] = null;
                    }
                }
            }
            //end block upload image
            $rowData = $this->gridFactory->create();
            // print_r($data);exit;
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('New shop has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('grid/grid/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Firas_Shopfinder::save');
    }
}
