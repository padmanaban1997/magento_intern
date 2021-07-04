<?php

/**
 * @category   Navigate
 * @package    Navigate_Cooking
   
  
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Navigate\Cooking\Controller\Index;




use Magento\Framework\App\Action\Context;
use Navigate\Cooking\Model\GridFactory;

class Save extends \Magento\Framework\App\Action\Action
{
	/**  
     * @var Cookingcourse
     */
    protected $_cookingcourse;

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
      GridFactory $cookingcourse
  ) {
        $this->_cookingcourse =  $cookingcourse;
        $this->scopeConfig = $scopeConfig;
        $this->inlineTranslation = $inlineTranslation;
        $this->storeManager = $storeManager;
        $this->_transportBuilder = $transportBuilder;
        parent::__construct($context);
    }
    public function execute()
    {
        
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $sendEmailTo =  $this->scopeConfig->getValue('navigate/email/cooking_recipient_email', $storeScope);
        $ccPartyEmailTo =  $this->scopeConfig->getValue('navigate/email/copy_to', $storeScope);
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

    $toCc=explode(',', $ccPartyEmailTo);

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

        $transport = $this->_transportBuilder
            ->setTemplateIdentifier('send_email_email_template') // this code we have mentioned in the email_templates.xml
            ->setTemplateOptions(
                [
                    'area' => \Magento\Framework\App\Area::AREA_FRONTEND, // this is using frontend area to get the template file
                    'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
                ]
            )
            ->setTemplateVars(['data' => $postObject])
            ->setFrom($sender)
            ->addTo($recipientMail)
            ->getTransport();

        $transport->sendMessage();
        $this->inlineTranslation->resume();
        $this->messageManager->addSuccess(
            __('Thanks for contacting us. We\'ll respond to you very soon.')
        );
        $this->_redirect('/');
        return;
    } 
    catch (\Exception $e) {
        $this->inlineTranslation->resume();
        $this->messageManager->addError(
            __('We can\'t process your request right now. Sorry, that\'s all we know.' . $e->getMessage())
        );
        $this->_redirect('/');
        return;
    }
    
    
    finally{
          
    
   
        $data = $this->getRequest()->getParams();      
        $cookingcourse = $this->_cookingcourse->create();

        if(empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || empty($data['telephone']) || empty($data['no_of_people']) || empty($data['course']) || empty($data['description']))
        {
          $this->messageManager->addErrorMessage(__('Someone feild was missing '));
      }
      else
      {

        $emailTemplateVariables = array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email'=>$data['email'],
            'telephone'=>$data['telephone'],
            'no_of_people'=>$data['no_of_people'],
            'course'=>$data['course'],
            'description'=>$data['description'],
            
        );


        $to = [$sendEmailTo];
       $toBcc  = array('pillaipadmanaban@gmail.com','pankajkalal383@gmail.com');
        $sender = array('name' => $adminSenderName,'email' => $adminSenderEmail);
        $transport = $this->_transportBuilder->setTemplateIdentifier('cooking_course_email_template')
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

        $cookingcourse->setData($data);
        if($cookingcourse->save()){
            $this->messageManager->addSuccessMessage(__('Your Cooking Course data was saved.'));
        }else{
            $this->messageManager->addErrorMessage(__('Your Cooking Course Data was not saved.'));
        } 

     
    }
}

    $resultRedirect = $this->resultRedirectFactory->create();
    $resultRedirect->setPath('party-catering.html');
    return $resultRedirect;
}
}
?>


