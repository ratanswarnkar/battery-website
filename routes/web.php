<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('pages.home', [
    'products' => config('products'),
    'featuredProducts' => array_slice(config('products'), 0, 3),
]));

Route::get('/about', fn() => view('pages.about'));

Route::get('/products', fn() => view('pages.products', [
    'products' => config('products'),
]))->name('products.index');

Route::get('/products/{slug}', function (string $slug) {
    $products = config('products');
    $product = collect($products)->firstWhere('slug', $slug);

    abort_unless($product, 404);

    return view('pages.product-show', [
        'product' => $product,
        'relatedProducts' => collect($products)
            ->reject(fn (array $item) => $item['slug'] === $slug)
            ->take(3)
            ->values()
            ->all(),
    ]);
})->name('products.show');

Route::get('/contact', fn() => view('pages.contact'));
