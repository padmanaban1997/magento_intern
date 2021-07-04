<?php
/**
 * @category   Navigate
 * @package    Navigate_Cooking
   
  
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Navigate\Cooking\Block\Adminhtml\Grid\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{
    protected $_wysiwygConfig;
 
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
        return __('Cooking Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Cooking Information');
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
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
   
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('Item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Cooking Information')]);
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
                'title' => __('First_Name'),
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
                'title' => __('Last_Name'),
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
                'label' => __('Telephone'),
                'id' => 'telephone',
                'title' => __('Telephone'),
                'class'=> 'validate-number',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'no_of_people',
            'text',
            [
                'name' => 'no_of_people',
                'label' => __('No Of People'),
                'id' => 'no_of_people',
                'title' => __('No_Of_People'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'course',
            'text',
            [
                'name' => 'course',
                'label' => __('Course'),
                'id' => 'course',
                'title' => __('Course'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

       
        $fieldset->addField(
            'description',
            'editor',
            [
                'name' => 'description',
                'label' => __('Description'),
                'style' => 'height:36em;',
                'required' => true,
               
            ]
        );

    
        
        $form->setValues($model->getData());
     //   $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
