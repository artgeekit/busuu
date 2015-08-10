<?php
/**
 * @author Arthur Frank <frank.artur0303@gmail.com>
 * @description Main test controller 
 */

namespace BusuuTest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BusuuTestController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

	public function ThumbUpAction()
	{
		// AF: Set thumb up for a comment
	}

	public function ThumbDownAction()
	{
		// AF: Set thumb down for a comment
	}

	public function TotalScoreAction()
	{
		// Get total score of up and down thumbs for a comment
	}
}
