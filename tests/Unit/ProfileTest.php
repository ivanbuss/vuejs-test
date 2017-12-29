<?php

namespace Tests\Feature;

use App\Profile;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetUsers()
    {
        $response = $this->get('/api/user-list');
        $response->assertStatus(200);
    }

    public function testUserPage() {
        $user = factory(User::class)->create();
        $profile = new Profile(['first_name'=>'First Name', 'last_name'=>'Last Name']);
        $user->profile()->save($profile);

        $response = $this->get('/api/user/'.$user->id.'/profile');
        $response->assertStatus(200)->assertJson([
            'success' => true,
            'profile' => [
                'uid' => $profile->uid,
                'first_name' => $profile->first_name,
                'last_name' => $profile->last_name,
                'created_at' => $profile->created_at,
                'updated_at' => $profile->updated_at
            ],
        ]);
        $user->delete();
    }

    public function testProfileUpdate() {
        $user = factory(User::class)->create();
        $profile = new Profile(['first_name'=>'First Name', 'last_name'=>'Last Name']);
        $user->profile()->save($profile);

        $response = $this->json('POST', '/api/user/'.$user->id.'/save', [
          'first_name' => 'Sally',
          'last_name' => 'Quin'
        ]);
        $response->assertStatus(200)->assertJson([
          'success' => true,
          'message' => '',
          'profile' => [
            'uid' => $profile->uid,
            'first_name' => 'Sally',
            'last_name' => 'Quin',
            'created_at' => $profile->created_at,
            'updated_at' => $profile->updated_at
          ],
        ]);
        $user->delete();
    }
}
