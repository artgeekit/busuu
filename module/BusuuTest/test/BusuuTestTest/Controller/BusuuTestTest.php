<?php

namespace BusuuTestTest\Model;

use BusuuTest\Model\BusuuTest;
use PHPUnit_Framework_TestCase;

class BusuuTestTest extends PHPUnit_Framework_TestCase
{
    public function testCommentInitialState()
    {
        $comments = new BusuuTest();
        $this->assertNull(
            $comments->comment,
            '"comments" should be null'
        );
        // ...
    }

    public function testExchangeArraySetsPropertiesCorrectly()
    {
        $comments = new BusuuTest();
        $data  = array(
            'Id'           => 1,
            'UserId'       => 1,
            'CommentText'  => 'Arthur first text'
        );
        $comments->exchangeArray($data);

        $this->assertSame(
            $data['Id'],
            $comments->comment['Id'],
            '"Comment id" was not set correctly'
        );
        $this->assertSame(
            $data['UserId'],
            $comments->comment['UserId'],
            '"UserId" was not set correctly'
        );
        $this->assertSame(
            $data['CommentText'],
            $comments->comment['CommentText'],
            '"Comment Text" was not set correctly'
        );
    }
    // ... AF: here could much more other test...
}