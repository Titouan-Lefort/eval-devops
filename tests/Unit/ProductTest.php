<?php

use App\Models\Product;

test('product has fillable attributes', function () {
    $product = new Product();

    expect($product->getFillable())->toBe([
        'name',
        'description',
        'price',
    ]);
});
