<?php
/**
* Tests filters
* 
**/
class SearchBarTest extends TestCase
{

	public function testEnterAKeyWord()  
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

	public function testSearchUsingKeyWordAndCategory()  
	{
		$user = factory(App\User::class)->make();
        $this->actingAs($user)
			->visit('event/showall')
			->see('SEARCH FOR EVENTS')
			->see('What are you looking for?')
			->type('super', 'keywords')
			->see('All Categories')
			->see('Basketball')
			->select('Basketball', 'subs[]')
			->click('Search')
			->see("Searched Results")
			;
	}

	public function testSearchUsingCategory()  
	{
		$user = factory(App\User::class)->make();
        $this->actingAs($user)
			->visit('event/showall')
			->see('SEARCH FOR EVENTS')
			->see('All Categories')
			->see('Basketball')
			->select('Basketball', 'subs[]')
			->click('Search')
			->see("Searched Results")
			;
	}


}