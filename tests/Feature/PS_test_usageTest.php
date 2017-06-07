<?php

namespace Tests\Feature;

use Tests\PsTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends PsTestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_ps_test()
    {

        /*
//        $response = $this->get('/');
//        $response->assertStatus(200);
//
//        $foo = 'test';
//        $this->assertTrue(is_string($foo));
//        $this->assertEquals('test', $foo);
//        $this->assertEquals(4, strlen($foo));

//        $this->assertGreaterThanOrEqual(4, strlen($foo));

//        $this->assertRegExp('/^.+\@\S+\.\S+$/', 'me@email.com');

//        $this->assert_ps_isEmail('no@email.com', 'from message: invalid message');
//        $this->assert_ps_isNotEmail('email mail.com');
        */



        $this->assert_ps_type('pe@mail.com', 5, 'e');
        $this->assert_ps_type('http://www.yahoo.com', 5, 'u');
        $this->assert_ps_type(2, 0, 'f');
        $this->assert_ps_type(31, 0, 'i');
        $this->assert_ps_type('your text here ', 10, 'd');
    }


}
