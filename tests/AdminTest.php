<?php 

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;
// use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use App\User;

class AdminTest extends TestCase {
    protected $user = null;
    public function setUp() {
        parent::setUp();
        $this->user = App\User::where("email", "admin@test.com")->first();
    }
    public function testAdminPage() {
        $this->actingAs($this->user)
                ->visit('admin')    
                ->see('search');
    }
}