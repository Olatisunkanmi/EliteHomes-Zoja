<?php

namespace Tests\Feature\User;

use App\Models\User;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {

    $this->user = User::factory()->create([
        'password' => 'RashForddd',
    ]);

    $this->data = [
        'email' => $this->user->email,
        'password' => 'RashForddd',
    ];

    $response = $this->postJson(route('login', $this->data));
});

it('Updates User', function () {

    $data = [
        'id' => $this->user->id,
        'username' => 'olatisunkanmi_',
        'first_name' => $this->user->first_name,
        // 'last_name' => fake()->lastName(),
        // 'phone_number' => fake()->phoneNumber(),
    ];

    $response = $this->put('/api/v1/users/' . $data['id']);

    // dd($this->user);
    dd($response);
});
