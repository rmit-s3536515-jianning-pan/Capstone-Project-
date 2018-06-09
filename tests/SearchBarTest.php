<?php
/**
* Tests filters
* 
**/
class SearchBarTest extends TestCase
{

	public function testEnterKeyWord()  
	{
		$user = factory(App\User::class)->make();
        $this->actingAs($user)
			->visit('event/showall')
			->see('SEARCH FOR EVENTS')
			->see('What are you looking for?')
			->type('super', 'keywords')
			->see("Searched Results")
			;
	}

	// 	public function testSearchUsingKeyWord()  
	// {
	// 	$user = factory(App\User::class)->make();
 //        $this->actingAs($user)
	// 		->visit('event/showall')
	// 		->see('SEARCH FOR EVENTS')
	// 		->see('What are you looking for?')
	// 		->type('super', 'keywords')
	// 		->see("Searched Results")
	// 		;
	// }

	// public function testSearchUsingCategory()  
	// {
	// 	$user = factory(App\User::class)->make();
 //        $this->actingAs($user)
	// 		->visit('index')
	// 		->see('ALL GROUPS')
	// 		->see('Chinese Club')
	// 		;
	// }


}