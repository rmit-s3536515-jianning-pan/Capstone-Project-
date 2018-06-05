<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BasicTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    // public function testBasicExample()
    // {
    //     $this->visit('/')
    //          ->see('Encounter');
    // }
public function testHasItemInBox()
    {
        $box = new Box(['cat', 'toy', 'torch']);

        $this->assertTrue($box->has('toy'));
        $this->assertFalse($box->has('ball'));
    }
}
