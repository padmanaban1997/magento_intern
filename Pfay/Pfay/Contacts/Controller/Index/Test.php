<?php
namespace Pfay\Contacts\Controller\Index;
class Test extends \Magento\Framework\App\Action\Action
{
    
    
    protected $_pageFactory;

	protected $_postFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Pfay\Contacts\Model\ContactFactory $postFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
		return parent::__construct($context);
	}
	public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
?>  