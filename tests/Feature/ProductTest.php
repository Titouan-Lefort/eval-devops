<?php

use App\Models\Product;

test('can list products', function () {
    Product::create([
        'name' => 'Product 1',
        'description' => 'Description 1',
        'price' => 10.00,
    ]);

    $response = $this->get(route('products.index'));

    $response->assertStatus(200);
    $response->assertSee('Product 1');
});

test('can show create product page', function () {
    $response = $this->get(route('products.create'));

    $response->assertStatus(200);
});

test('can create product', function () {
    $productData = [
        'name' => 'New Product',
        'description' => 'New Description',
        'price' => 99.99,
    ];

    $response = $this->post(route('products.store'), $productData);

    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseHas('products', $productData);
});

test('can show edit product page', function () {
    $product = Product::create([
        'name' => 'Product to Edit',
        'description' => 'Description',
        'price' => 10.00,
    ]);

    $response = $this->get(route('products.edit', $product));

    $response->assertStatus(200);
    $response->assertSee('Product to Edit');
});

test('can update product', function () {
    $product = Product::create([
        'name' => 'Old Name',
        'description' => 'Old Description',
        'price' => 10.00,
    ]);

    $updatedData = [
        'name' => 'Updated Name',
        'description' => 'Updated Description',
        'price' => 20.00,
    ];

    $response = $this->put(route('products.update', $product), $updatedData);

    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseHas('products', $updatedData);
});

test('can delete product', function () {
    $product = Product::create([
        'name' => 'Product to Delete',
        'description' => 'Description',
        'price' => 10.00,
    ]);

    $response = $this->delete(route('products.destroy', $product));

    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseMissing('products', ['id' => $product->id]);
});

test('validates product creation', function () {
    $response = $this->post(route('products.store'), [
        'name' => '',
        'price' => '',
    ]);

    $response->assertSessionHasErrors(['name', 'price']);
});

test('validates product update', function () {
    $product = Product::create([
        'name' => 'Product',
        'description' => 'Description',
        'price' => 10.00,
    ]);

    $response = $this->put(route('products.update', $product), [
        'name' => '',
        'price' => 'not-a-number',
    ]);

    $response->assertSessionHasErrors(['name', 'price']);
});
