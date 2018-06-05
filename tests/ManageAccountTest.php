<?php
/**
* Feature
* Test for details updated
* 
**/


class ManageAccountTest extends TestCase
{

	public function testUserGoesToTheirProfile()  
	{
		$user = factory(App\User::class)->make();
        $this->actingAs($user)
			->visit('profile')
			->see('User Profile')
			// ->click('Update')
			// ->see('Update Details')
			;
	}

	public function testUserCanUpdateName()  
	{
		$name = 'naxdcme';
		$email = 'cddw@vf.com';
		$password = 'secret';
		$dob = '2018-05-12';
		$gender = 'Female';
		$address = 'somewhere';
		$bio = 'cfdnvjkfndlcdl';

		$user = factory('App\User')->make([
			'name' => $name,
			'email' => $email,
			'password' => $password,
			'dob' => $dob,
	        'gender' => $gender,
	        'address' => $address,
	        'bio' => $bio,
		]);

		$newName = 'Changed Name';
		$user->update([
			'name' => $newName,
		]);

        $this->seeInDatabase('users', [
            'name' => $newName,
			'email' => $email,
			'password' => $password,
			'dob' => $dob,
	        'gender' => $gender,
	        'address' => $address,
	        'bio' => $bio,
        ]);

	}

	public function testDetailsCanBeChanged()  
	{
		$user = factory(App\User::class)->make();
        $this->actingAs($user)
			->visit('/updateDetail')
			->see('Update Details')
			->type('Jane', 'name')
			->type('fdfs@fdf.com', 'email')
			->type('25/02/1996', 'dob')
			->select('Male', 'gender')
			->press('Update')
			;
	}

	public function testFemaleGenderCanBeSelected()  
	{
		$user = factory(App\User::class)->make();
        $this->actingAs($user)
			->visit('/updateDetail')
			->see('Update Details')
			->select('Female', 'gender')
			->press('Update')
			;
	}

	public function testPreferenceCanBeSelected()  
	{

		// $cate_id = '1';
		// $name = 'Basetball';
		// factory('App\SubCategory')->create([
		// 	'cate_id' => $cate_id,
		// 	'name' => $name,
		// ]);

		$name = 'naxdcme';
		$email = 'cddw@vf.com';
		$password = 'secret';
		$dob = '2018-05-12';
		$gender = 'Female';
		$address = 'somewhere';
		$bio = 'cfdnvjkfndlcdl';

		$user = factory('App\User')->make([
			'name' => $name,
			'email' => $email,
			'password' => $password,
			'dob' => $dob,
	        'gender' => $gender,
	        'address' => $address,
	        'bio' => $bio,
		]);
		
        $this->actingAs($user)
			->visit('/updateDetail')
			->see('Update Details')
			->see('Sport')
			->select('Tennis', 'pref[]')
			;
	}


}