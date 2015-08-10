<?php
/**
 * @author Arthur Frank <frank.artur0303@gmail.com>
 */

namespace BusuuTest\Model;

use Zend\Db\TableGateway\TableGateway;

class BusuuTestTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
    	$comments = array();
        $resultSet = $this->tableGateway->select();
        foreach ($resultSet as $comment) {
        	$comments[] = $comment;
        }
        return json_encode($comments);
    }

    public function getComment($id, $json = true)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('Id' => $id));
        $row = $rowset->current();
        if (!$row) {
            return json_encode(array('status' => 404, 'message' => 'No commnet found', 'commentId' => $id));
        }
        $row->comment['status'] = 200;
        return json_encode($row->comment);
    }

    public function rateComment($comments, $up = false, $json = true)
    {
    	$comments = json_decode($comments);
    	if ($comments->status == 200) {
	        $data = $up ? 
	        array('ThumbUp' => $comments->ThumbUp + 1) : 
	        array('ThumbDown' => $comments->ThumbDown + 1);
	        
	        $id = (int)$comments->Id;
	        if (!empty($id)) {
	            if ($this->getComment($id)) {
	                $this->tableGateway->update($data, array('Id' => $id));
	                
	                $comment = $this->tableGateway->select($data, array('Id' => $id));
	                foreach ($comment as $c) {
	                	return $json ? json_encode($c) : $c;
	                	break;
	                }
	            } else {
	                return json_encode(array('status' => 404, 'message' => 'No commnet found', 'commentId' => $comments->commentId));
	            }
	        }
    	} else {
    		return json_encode(array('status' => 404, 'message' => 'No commnet found', 'commentId' => $comments->commentId));
    	}
    }
}