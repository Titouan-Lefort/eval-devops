<?php

use App\Models\User;

test('user has fillable attributes', function () {
    $user = new User();

    expect($user->getFillable())->toBe([
        'name',
        'email',
        'password',
    ]);
});

test('user has hidden attributes', function () {
    $user = new User();

    expect($user->getHidden())->toBe([
        'password',
        'remember_token',
    ]);
});

test('user has casts', function () {
    $user = new User();

    expect($user->getCasts())->toBe([
        'id' => 'int',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ]);
});
