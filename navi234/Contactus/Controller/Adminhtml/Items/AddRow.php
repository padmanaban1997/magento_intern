<?php

namespace Navigate\Contactus\Controller\Adminhtml\Items;

use Magento\Framework\Controller\ResultFactory;

class AddRow extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * @var \Navigate\Contactus\Model\ContactFactory
     */
    private $contactFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry,
     * @param \Navigate\Contactus\Model\ContactFactory $contactFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Navigate\Contactus\Model\ContactFactory $contactFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->contactFactory = $contactFactory;
    }

    /**
     * Mapped Grid List page.
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        
        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->contactFactory->create();

    
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if ($rowId) {
      
         
           $rowData = $rowData->load($rowId);
           $rowTitle = $rowData->getTitle();
           if (!$rowData->getEntityId()) {
               $this->messageManager->addError(__('row data no longer exist.'));
               $this->_redirect('navigate_support/*');
               return;
           }
       }

       $this->coreRegistry->register('contact_row_data', $rowData);
       $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
       $title = $rowId ? __('Edit  Information ').$rowTitle : __('Add  Information');
       $resultPage->getConfig()->getTitle()->prepend($title);
       return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Navigate_Contactus::add_row');
    }
}