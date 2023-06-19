<?php

use App\Models\User;
use  function Pest\Laravel\{assertDatabaseCount, assertDatabaseHas, assertDatabaseMissing};

it('Fetch User by Id', function () {

    $user = User::factory()->create();

    $data = [
        'id' => $user->id,
    ];

    $response = $this->post('/api/v1/users/' . $data['id']);

    dd($user);

    $response->assertStatus(200);
    $response->assertJson(['data' => true]);
    expect($response['data'])->toBeArray();
    $this->assertDatabaseCount('users', 1);
    $this->assertCount(3, $response['data']);
    // $this->assertDatabaseHas('users', [
    //     'id' => $data['id'],
    //     // 'username' => $data['username'],

    // ]);
});
