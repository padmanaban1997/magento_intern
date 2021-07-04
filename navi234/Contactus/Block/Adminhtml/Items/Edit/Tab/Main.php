<?php

 
namespace Navigate\Contactus\Block\Adminhtml\Items\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;


class Main extends Generic implements TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    protected $_wysiwygConfig;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    ) 
    {
       
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

      /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __(' Contact Us Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __(' Contact Us  Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
           /** @var \Magento\Framework\Data\Form $form */
        $model = $this->_coreRegistry->registry('contact_row_data');
        $form = $this->_formFactory->create();
      
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('  Contact Us  Information'), 'class' => 'fieldset-wide']
        );
    
        if ($model->getEntityId()) {
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } 
           

        $fieldset->addField(
            'first_name',
            'text',
            [
                'name' => 'first_name',
                'label' => __('First Name'),
                'id' => 'first_name',
                'title' => __('First Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
            );


        $fieldset->addField(
            'last_name',
            'text',
            [
                'name' => 'last_name',
                'label' => __('Last Name'),
                'id' => 'last_name',
                'title' => __('Last Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
            );



        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email'),
                'id' => 'email',
                'title' => __('Email'),
                'class'=>'validate-email',
               
                'required' => true,
            ]
            );


                $fieldset->addField(
                    'telephone',
                    'text',
                    [
                        'name' => 'telephone',
                        'label' => __('Telephone No'),
                        'id' => 'telephone',
                        'title' => __('Telephone No'),
                        'class'=> 'validate-number',
                        'class'=>'validate-phoneLax',
                        'required' => true,
                    ]
                    );


            $fieldset->addField(
                'company',
                'text',
                [
                    'name' => 'company',
                    'label' => __('Company Name'),
                    'id' => 'company',
                    'title' => __('Company Name'),
                    'class' => 'required-entry',
                    'required' => true,
                ]
                );
                    $fieldset->addField(
                        'website',
                        'text',
                        [
                            'name' => 'website',
                            'label' => __('website Name'),
                            'id' => 'website',
                            'title' => __('website Name'),
                            'class' => 'required-entry',
                            'required' => true,
                        ]
                        );
                        
              
              
          

        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);

        $fieldset->addField(
            'description',
            'editor',
            [
                'name' => 'description',
                'label' => __('Description'),
                'style' => 'height:5em;',
                'required' => true,
                'config' => $wysiwygConfig
            ]
        );
       

          
            
    

    
        $form->setValues($model->getData());
      //  $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}