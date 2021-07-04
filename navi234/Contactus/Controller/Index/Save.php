<?php

/**
 * @category   Navigate
 * @package    Navigate_Contactus
   
  
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Navigate\Contactus\Controller\Index;




use Magento\Framework\App\Action\Context;
use Navigate\Contactus\Model\ContactFactory;

class Save extends \Magento\Framework\App\Action\Action
{
  /**  
     * @var Contactus
     */
    protected $_contactus;

    /**
    * @var \Magento\Framework\App\Config\ScopeConfigInterface
    */
    protected $scopeConfig;


    /**
* @var \Magento\Framework\Mail\Template\TransportBuilder
*/
protected $_transportBuilder;



    /**
    * @var \Magento\Store\Model\StoreManagerInterface
    */
    protected $storeManager;


    public function __construct(
      Context $context,
      \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
      \Magento\Store\Model\StoreManagerInterface $storeManager,
      \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
      \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
      ContactFactory $contactus
  ) {
        $this->_contactus =  $contactus;
        $this->scopeConfig = $scopeConfig;
        $this->inlineTranslation = $inlineTranslation;
        $this->storeManager = $storeManager;
        $this->_transportBuilder = $transportBuilder;
        parent::__construct($context);
    }
    public function execute()
    {
        
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $sendEmailTo =  $this->scopeConfig->getValue('navigate/email/contact_recipient_email', $storeScope);
        $ccEmailTo =  $this->scopeConfig->getValue('navigate/email/copy_to', $storeScope);
        $emailSender =  $this->scopeConfig->getValue('navigate/email/sender_email_identity', $storeScope);

       if($emailSender=='sales')
        {

            $adminSenderName= $this->scopeConfig->getValue('trans_email/ident_sales/name', $storeScope);
            $adminSenderEmail= $this->scopeConfig->getValue('trans_email/ident_sales/email', $storeScope);

        }
        elseif ($emailSender=='general') {
          $adminSenderName= $this->scopeConfig->getValue('trans_email/ident_general/name', $storeScope);
          $adminSenderEmail= $this->scopeConfig->getValue('trans_email/ident_general/email', $storeScope);
      }
      elseif ($emailSender=='support') {
          $adminSenderName= $this->scopeConfig->getValue('trans_email/ident_support/name', $storeScope);
          $adminSenderEmail= $this->scopeConfig->getValue('trans_email/ident_support/email', $storeScope);
      }

      elseif ($emailSender=='custom1') {
          $adminSenderName= $this->scopeConfig->getValue('trans_email/ident_custom1/name', $storeScope);
          $adminSenderEmail= $this->scopeConfig->getValue('trans_email/ident_custom1/email', $storeScope);
      }
      else
      {
       $adminSenderName= $this->scopeConfig->getValue('trans_email/ident_custom1/name', $storeScope);
       $adminSenderEmail= $this->scopeConfig->getValue('trans_email/ident_custom1/email', $storeScope); 
       }

    $toCc=explode(',', $ccEmailTo);

      $post = $this->getRequest()->getPostValue();
    if (!$post) {
        $this->_redirect('/');
        return;
    }

    $this->inlineTranslation->suspend();
     try {
        $recipientMail = $this->getRequest()->getPostValue('email');

        $postObject = new \Magento\Framework\DataObject();
        $postObject->setData($post);

        $error = false;
        $sender = array('name' => $adminSenderName,'email' => $adminSenderEmail);

          $data=$this->getRequest()->getParams(); 
           $emailTemplateVariables = array(
             'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email'=>$data['email'],
            'telephone'=>$data['telephone'],
            'company'=>$data['company'],
            'website'=>$data['website_name'],
            'description'=>$data['description']
            
        );

        $data['website']=$data['website_name'];


        $transport = $this->_transportBuilder
            ->setTemplateIdentifier('contact_us_email_template_front') // this code we have mentioned in the email_templates.xml
            ->setTemplateOptions(
                [
                    'area' => \Magento\Framework\App\Area::AREA_FRONTEND, // this is using frontend area to get the template file
                    'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
                ]
            )
            ->setTemplateVars($emailTemplateVariables)
            ->setFrom($sender)
            ->addTo($recipientMail)
            ->getTransport();

        $transport->sendMessage();
        $this->inlineTranslation->resume();
      
        $this->_redirect('contact-us');
        return;
    } 
    catch (\Exception $e) {
        $this->inlineTranslation->resume();
        $this->messageManager->addError(
            __('We can\'t process your request right now. Sorry, that\'s all we know.' . $e->getMessage())
        );
        $this->_redirect('contact-us');
        return;
    }




    finally{


       $data = $this->getRequest()->getParams();      
        $model = $this->_contactus->create();

        if(empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || empty($data['telephone']) || empty($data['company']))
        {
          $this->messageManager->addErrorMessage(__('Someone feild was missing '));
          $this->_redirect('contact-us');
          return;
      }
      else
      {

        $emailTemplateVariables = array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email'=>$data['email'],
            'telephone'=>$data['telephone'],
            'company'=>$data['company'],
            'website'=>$data['website_name'],
            'description'=>$data['description']
            
        );

        $data['website']=$data['website_name'];
        $to = $sendEmailTo;

        $sender = array('name' => $adminSenderName,'email' => $adminSenderEmail);
        $transport = $this->_transportBuilder->setTemplateIdentifier('contact_us_email_template_admin')
        ->setTemplateOptions(
            [
                'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
            ]
        )
        ->setTemplateVars($emailTemplateVariables)
        ->setFrom($sender)
        ->addTo($to)
        ->addCc($toCc)
        ->getTransport();

        $transport->sendMessage();

        $model->setData($data);
        if($model->save()){
          $this->messageManager->addSuccess(
            __('Thanks for contacting us. We\'ll respond to you very soon.')
        );
        }else{
            $this->messageManager->addErrorMessage(__('We can\'t process your request right now. Sorry, that\'s all we know.'));
        }

     
    }
  }


   
}
}
?>



