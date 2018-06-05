<?php
/**
* Tests filters
* 
**/
class MyEventsTest extends TestCase
{
	public function testJoinAnEvent()  
	{
		$user = factory(App\User::class)->make();
        $this->actingAs($user)
			->visit('event/1')
			->see('Join')
			->click('Join')
			->see('Join this event')
			->click('Join')
			;
	}

	public function testLeaveAnEvent()  
	{
		$user = factory(App\User::class)->make();
        $this->actingAs($user)
			->visit('event/1')
			->see('Leave')
			->press('Leave')
			->see('Are you sure that you want to leave this event?')
			->see('Leave')
			->press('Leave')
			;
	}




}