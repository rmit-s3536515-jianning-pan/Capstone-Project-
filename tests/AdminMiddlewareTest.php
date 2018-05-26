<?php
// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use App\User;

// class AdminTest extends TestCase {
//     protected $user = null;
//     public function setUp() {
//         parent::setUp();
//         $this->user = App\User::where("email", "admin@test.com")->first();
//     }
//     public function testAdminPage() {
//         $this->actingAs($this->user)
//                 ->visit('admin')    
//                 ->see('search');
//     }

class AdminMiddlewareTest extends TestCase{
    /** @test */
    public function non_admins_are_redirected(){
        $user = factory(User::class)->make(['is_admin' => false]);

        $this->actingAs($user);

        $request = Request::create('/admin', 'GET');

        $middleware = new AdminMiddleware;

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($response->getStatusCode(), 302);
    }


    /** @test */
    public function admins_are_not_redirected(){
        $user = factory(User::class)->make(['is_admin' => true]);

        $this->actingAs($user);

        $request = Request::create('/admin', 'GET');

        $middleware = new AdminMiddleware;

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($response, null);
        }
    }
}