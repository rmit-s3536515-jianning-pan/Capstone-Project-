<?php
/**
* Feature Testing
* Test for group creation
*
**/
use App\Groups;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GroupsTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testGroupReturnAllGroups()
    // {
    //     $user = factory(App\User::class)->create();

    //     $groups = factory(App\Groups::class)->create(['owner_id'=>$user->id]);

    //     $response = $this->call('GET', 'showG');
    //     $this->assertEquals(302, $response->status());
        
        // foreach($groups as $group){
        //     $this->seeJson([
        //         'owner_id' => $group->owner_id,
        //     'title' => $group->title,
        //     'description'=> $group->description,
        //     ]);
        // }
        // $this->assertTrue(true);
    // }

    public function testGroupCanBeDeletedAndRemovedFromDatabase()
    {
        $owner_id = '3';
        $title = 'Some title';
        $description = 'Some description';
        $groups = factory('App\Groups')->make([
            'owner_id' => $owner_id,
            'title' => $title,
            'description' => $description,
        ]);
        $groups->delete();
        $this->notSeeInDatabase('groups', [
            'owner_id' => $owner_id,
            'title' => $title,
            'description' => $description,
        ]);
    }

    //     public function testGroupCanBeCreated()
    // {
    //     $user = factory(App\User::class)->create();

    //     $group = new Groups();
    //     $groups = $user->Group()->create(['owner_id'=>$user->id,
    //         'title' => 'Something',
    //         'description'=> 'long description',
    //     ]);

        
    // }

    public function testGroupIsCreatedAndInDatabase()
    {
        $owner_id = '2';
        $title = 'Some title';
        $description = 'Some description';
        factory('App\Groups')->create([
            'owner_id' => $owner_id,
            'title' => $title,
            'description' => $description,
        ]);

        $this->seeInDatabase('groups', [
            'owner_id' => $owner_id,
            'title' => $title,
            'description' => $description,
        ]);

    }

}
