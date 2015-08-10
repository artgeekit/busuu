<?php
/**
 * @author Arthur Frank <frank.artur0303@gmail.com>
 * @description Main model
 */

namespace BusuuTest\Model;

class BusuuTest
{
    public $comment;
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->comment = !empty($data) ? $data : null;
    }

    // public function getInputFilter()
    // {
    //     if (!$this->inputFilter) {
    //         $inputFilter = new InputFilter();

    //         $inputFilter->add(array(
    //             'name'     => 'ThumbUp',
    //             'filters'  => array(
    //                 array('name' => 'StripTags'),
    //                 array('name' => 'StringTrim'),
    //             )
    //         ));

    //         $this->inputFilter = $inputFilter;
    //     }
    //     return $this->inputFilter;
    // }
}