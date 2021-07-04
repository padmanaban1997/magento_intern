<?php


namespace Navigate\Contactus\Block\Adminhtml\Items;


class AddRow extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry.
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry           $registry
     * @param array                                 $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) 
    {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Initialize Imagegallery Images Edit Block.
     */
    protected function _construct()
    {
        $this->_objectId = 'row_id';
        $this->_blockGroup = 'Navigate_Contactus';
        $this->_controller = 'adminhtml_items';
        parent::_construct();
        if ($this->_isAllowedAction('Navigate_Contactus::add_row')) {
            $this->buttonList->update('save', 'label', __('Save'));
        } else {
            $this->buttonList->remove('save');
        }
      
       // $this->buttonList->remove('reset');


        $this->buttonList->add(
            'save_and_continue_edit',
            [
                'class' => 'save',
                'label' => __('Save and Continue Edit'),
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form']],
                ]
            ],
            10  
        );
        $item = $this->_coreRegistry->registry('contact_row_data');
        if ($item->getEntityId()) {

        $this->addButton(
          'delete',
          [
              'label' => __('Delete'),
              'onclick' => 'deleteConfirm(' . json_encode(__('Are you sure you want to do this?'))
                  . ','
                  . json_encode($this->getDeleteUrl()
                  )
                  . ')',
              'class' => 'scalable delete',
              'level' => -1
          ]
      );
        }
     
     
      
    }

    /**
     * Retrieve text for header element depending on loaded image.
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
        {
            $item = $this->_coreRegistry->registry('contact_row_data');
            if ($item->getEntityId()) {
                return __("Edit Item '%1'", $this->escapeHtml($item->getName()));
            } else {
                return __('New Item');
            }
        }
        public function getDeleteUrl()
        {
            $item = $this->_coreRegistry->registry('contact_row_data');
        
            return $this->getUrl('navigate_contactus/*/delete/id/'.$item->getEntityId());
        }
    

    /**
     * Check permission for passed action.
     *
     * @param string $resourceId
     *
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
   
   
    /**
     * Get form action URL.
     *
     * @return string
     */
   
}