<?php namespace frontend\tests;

use frontend\models\ContactForm;

class MyTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests

    /**
     *
     */
    public function testSomeFeature()
    {
        $a = 1;
        $this->assertEquals(1, $a);
        $this->assertTrue($a === 1);
        $this->assertLessThan(2, $a);

        $model = new ContactForm();

        $model->attributes = [
            'name' => 'Tester',
            'email' => 'tester@example.com',
            'subject' => 'very important letter subject',
            'body' => 'body of current message',
        ];

        $this->assertAttributeEquals('Tester', 'name', $model);
        $this->assertAttributeEquals('test@example.com', 'email', $model);
        $this->assertAttributeEquals('left message', 'subject', $model);
        $this->assertAttributeEquals('boddy', 'body', $model);

        $array = [
            'first' => '111',
            'second' => '222',
            'third' => '333',
            'fourth' => '444',
            ];

        $this->assertArrayHasKey('second', $array);
    }
}