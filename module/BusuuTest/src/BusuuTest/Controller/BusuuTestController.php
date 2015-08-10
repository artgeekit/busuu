<?php
/**
 * @author Arthur Frank <frank.artur0303@gmail.com>
 * @description Main test controller 
 */

namespace BusuuTest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use BusuuTest\Model\BusuuTest;

class BusuuTestController extends AbstractActionController
{
	protected $commentTable;
	protected $comment;

    public function indexAction()
    {
        return new ViewModel(array(
            'comments' => $this->getCommentTable()->fetchAll(),
        ));
    }

	public function UpAction()
	{
		// AF: Set thumb up for a comment
		$commentId = $this->params()->fromRoute('id', 0);
		$comments  = new BusuuTest();
		$comments->exchangeArray($this->getCommentTable()->getComment($commentId, false));
		
		return new ViewModel(array(
            'comment' => $this->getCommentTable()->rateComment($comments->comment, true),
        ));
	}

	public function DownAction()
	{
		// AF: Set thumb down for a comment
		$commentId = $this->params()->fromRoute('id', 0);
		$comments  = new BusuuTest();
		$comments->exchangeArray($this->getCommentTable()->getComment($commentId, false));
		
		return new ViewModel(array(
            'comment' => $this->getCommentTable()->rateComment($comments->comment),
        ));
	}

	public function getAction()
	{
		$commentId = $this->params()->fromRoute('id', 0);
		
		return new ViewModel(array(
            'comment' => $this->getCommentTable()->getComment($commentId),
        ));
	}

	public function getCommentTable()
    {
        if (!$this->commentTable) {
            $sm = $this->getServiceLocator();
            $this->commentTable = $sm->get('BusuuTest\Model\BusuuTestTable');
        }
        return $this->commentTable;
    }
}
