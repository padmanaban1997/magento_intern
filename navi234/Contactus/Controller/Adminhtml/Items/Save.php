<?php

namespace Navigate\Contactus\Controller\Adminhtml\Items;

class Save extends \Magento\Backend\App\Action
{
   
    var $contactFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Navigate\Contactus\Model\ContactFactory $contactFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Navigate\Contactus\Model\ContactFactory $contactFactory
    ) {
        parent::__construct($context);
        $this->contactFactory = $contactFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
       


     if ($this->getRequest()->getPostValue()) {
            try {
                $model = $this->_objectManager->create('Navigate\Contactus\Model\Contact');
                $data = $this->getRequest()->getPostValue();

         
                $inputFilter = new \Zend_Filter_Input(
                    [],
                    [],
                    $data
                );
                $data = $inputFilter->getUnescaped();
                $id = $this->getRequest()->getParam('id');
                if ($id) {
                    $model->load($id);
                    if ($id != $model->getEntityId()) {
                        throw new \Magento\Framework\Exception\LocalizedException(__('The wrong item is specified.'));
                    }
                }
                $model->setData($data);
                $session = $this->_objectManager->get('Magento\Backend\Model\Session');
                $session->setPageData($model->getData());
                $model->save();
                $this->messageManager->addSuccess(__('You saved the item.'));
                $session->setPageData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('navigate_contactus/*/addrow', ['id' => $model->getId()]);
                    return;
                }
                $this->_redirect('navigate_contactus/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
                $id = (int)$this->getRequest()->getParam('id');
                if (!empty($id)) {
                    $this->_redirect('navigate_contactus/*/addrow', ['id' => $id]);
                } else {
                    $this->_redirect('/*/new');
                }
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('Something went wrong while saving the item data. Please review the error log.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($data);
                $this->_redirect('navigate_contactus/*/addrow', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->_redirect('navigate_contactus/items/index');    
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Navigate_Contactus::save');
    }

    
}   