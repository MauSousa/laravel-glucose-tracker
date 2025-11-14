<?php

declare(strict_types=1);

use App\Enums\Condition;
use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Support\Facades\Date;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

describe('smoke tests', function () {
    test('index page shows ok', function () {
        $user = User::factory()->create()->refresh();

        $this->actingAs($user);

        $response = $this->get(route('dashboard'));
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
        'food',
        'created_at',
        'updated_at',
    ]);
});

describe('create bitacora', function () {
    test('user can create new bitacora entrie', function () {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('bitacora.store'), [
            'day' => Date::now()->format('d-m-Y'),
            'time_of_test' => Date::now()->format('H:i'),
            'glucose' => 126,
            'condition' => Condition::Ayuno->value,
            'food' => 'Plato de papaya',
        ]);

        $response->assertRedirect(route('dashboard'));
    });

    test('user can not create new bitacora entrie if day is not provided', function () {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('bitacora.store'), [
            'time_of_test' => Date::now()->format('H:i:s'),
            'glucose' => 126,
            'condition' => Condition::Ayuno->value,
            'food' => 'Plato de papaya',
        ]);

        $response->assertSessionHasErrors('day');
    });

    test('user can not create new bitacora entrie if time is not provided', function () {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('bitacora.store'), [
            'day' => Date::now()->format('d-m-Y'),
            'glucose' => 126,
            'condition' => Condition::Ayuno->value,
            'food' => 'Plato de papaya',
        ]);

        $response->assertSessionHasErrors('time_of_test');
    });

    test('user can not create new bitacora entrie if glucose is not provided', function () {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('bitacora.store'), [
            'day' => Date::now()->format('d-m-Y'),
            'time_of_test' => Date::now()->format('H:i:s'),
            'condition' => Condition::Ayuno->value,
            'food' => 'Plato de papaya',
        ]);

        $response->assertSessionHasErrors('glucose');
    });

    test('user can not create new bitacora entrie if condition is not provided', function () {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('bitacora.store'), [
            'day' => Date::now()->format('d-m-Y'),
            'time_of_test' => Date::now()->format('H:i:s'),
            'glucose' => 124,
            'food' => 'Plato de papaya',
        ]);

        $response->assertSessionHasErrors('condition');
    });

    test('user can not create new bitacora entrie if food is not provided', function () {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('bitacora.store'), [
            'day' => Date::now()->format('d-m-Y'),
            'time_of_test' => Date::now()->format('H:i:s'),
            'condition' => Condition::Ayuno->value,
            'glucose' => 124,
        ]);

        $response->assertSessionHasErrors('food');
    });
});

describe('edit bitacora', function () {
    test('user can edit bitacora', function () {
        $user = User::factory()->create();
        $bitacora = Bitacora::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->patch(route('bitacora.update', $bitacora), [
            'glucose' => 199,
        ]);

        $response->assertRedirect(route('bitacora.edit', $bitacora));
    });
});
