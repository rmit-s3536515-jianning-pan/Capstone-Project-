<?php
/**
* Tests filters
* 
**/
use App\Http\Controllers;

class MyGroupsTest extends TestCase
{

	public function testJoinAGroup()  
	{
		$user = factory(App\User::class)->make();
        $this->actingAs($user)
			->visit('group/1')
			->see('Join')
			->click('Join')
			->see('Join this group')
			->click('Join')
			;
	}

	public function testLeaveAGroup()  
	{
		$user = factory(App\User::class)->make();
        $this->actingAs($user)
			->visit('group/1')
			->see('Leave')
			->press('Leave')
			->see('Are you sure that you want to leave this group?')
			->see('Leave')
			->press('Leave')
			;
	}


}