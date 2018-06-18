<?php
/**
* Test for checked/unchecked preferences
* Test for page redirection
* Step 2 of Registration
**/
class ChoosePreferencesTest extends TestCase
{

	public function testUserCanSelectPreferencesAfterEnteringDetails()  
	{
		$user = factory(App\User::class)->make();
        
		$this->visit('register')
			->type('mai', 'name')
			->type('fdvdc@hotmail.com', 'email')
			->type('asdfghT1', 'password')
			->type('asdfghT1', 'password_confirmation')
			->press('Sign Up')
			->seePageIs('/register/step2')
			->see('Get Few Interest')
			->see('Sport')
			->select('Tennis', 'pref[]')
			->select('Basketball', 'pref[]')
			->select('Pool', 'pref[]')
			->see('Music')
			->select('Jazz', 'pref[]')
			;
	}


}