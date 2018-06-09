<?php
/**
* Test for event creation
* 
**/

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventsTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * The registration form can be displayed.
     *
     * @return void
     */
    // public function testSubmitNewEventRegistration()
    // {
    //     $this->visit('event/create')
    //         ->type('Fun Games', 'name')
    //         ->select('06/01/2018','event_date')
    //         ->type('5', 'max')
    //         ->type('12:00am', 'event_time')
    //         ->select('TENNIS','pref[]')
    //         ->type('jfnvjkdfmclkdm', 'description')
    //         ->press('Submit')
    //         ->see('You have create new Event!!!')
    //         ;

    //     // $this->visit('event/create')
    //     //     ->submitForm('Submit', [
    //     //         'name'=>'Fun Games',
    //     //         'event_date'=>'06/01/2018',
    //     //         'max'=>'5',
    //     //         'event_time'=>'12:00am',
    //     //         'pref[]'=>'TENNIS',
    //     //         'description'=>'jfnvjkdfmclkdm',
                
    //     //     ])
    //     //     ->andSee('You have create new Event!!!')
    //     //     ->onPage('/');

    // }


    public function testEventIsCreatedAndInDatabase()
    {
        $owner_id = '3';
        $title = 'Some title';
        $description = 'Some description';
        $max_attend = '5';
        $start_date = '2018-06-04';
        $start_time = '17:49:11';
        factory('App\Events')->create([
            'owner_id' => $owner_id,
            'title' => $title,
            'description' => $description,
            'max_attend' => $max_attend,
            'start_date' => $start_date,
            'start_time' => $start_time,
        ]);

        $this->seeInDatabase('events', [
            'owner_id' => $owner_id,
            'title' => $title,
            'description' => $description,
            'max_attend' => $max_attend,
            'start_date' => $start_date,
            'start_time' => $start_time,
        ]);


    }

        public function testEventCanBeDeletedAndRemovedFromDatabase()
    {
        $owner_id = '1';
        $title = 'Some title';
        $description = 'Some description';
        $max_attend = '5';
        $start_date = '2018-06-04';
        $start_time = '17:49:11';
        $event = factory('App\Events')->make([
            'owner_id' => $owner_id,
            'title' => $title,
            'description' => $description,
            'max_attend' => $max_attend,
            'start_date' => $start_date,
            'start_time' => $start_time,
        ]);

        $event->delete();
        $this->NotSeeInDatabase('events', [
            'owner_id' => $owner_id,
            'title' => $title,
            'description' => $description,
            'max_attend' => $max_attend,
            'start_date' => $start_date,
            'start_time' => $start_time,
        ]);

    }

}
