<?php

declare(strict_types=1);

use App\Models\Bitacora;
use App\Models\User;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

describe('smoke tests', function () {
    test('index page shows ok', function () {
        $user = User::factory()->create()->refresh();

        $this->actingAs($user);

        $response = $this->get(route('bitacora.index'));
        $response->assertOk();
    });
    test('create page shows ok', function () {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get(route('bitacora.create'));
        $response->assertOk();
    });
    test('edit page shows ok', function () {
        $user = User::factory()->create();
        $bitacora = Bitacora::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->get(route('bitacora.edit', $bitacora));
        $response->assertOk();
    });
});

test('to array', function () {
    $bitacora = Bitacora::factory()->create()->refresh();

    expect(array_keys($bitacora->toArray()))->toBe([
        'id',
        'user_id',
        'day',
        'time_of_test',
        'glucose',
        'condition',
        'created_at',
        'updated_at',
    ]);
});
