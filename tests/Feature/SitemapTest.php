<?php

use function Pest\Laravel\get;

it('generates sitemap successfully', function () {
    $response = get(route('sitemap'));

    $response->assertStatus(200);
    $response->assertHeader('Content-Type', 'application/xml');
});

it('contains the home page URL', function () {
    $response = get(route('sitemap'));

    $response->assertStatus(200);
    $response->assertSee(url('/'), false);
});

it('contains the services section URL', function () {
    $response = get(route('sitemap'));

    $response->assertStatus(200);
    $response->assertSee(url('/#services'), false);
});

it('contains the about section URL', function () {
    $response = get(route('sitemap'));

    $response->assertStatus(200);
    $response->assertSee(url('/#about'), false);
});

it('contains the contact section URL', function () {
    $response = get(route('sitemap'));

    $response->assertStatus(200);
    $response->assertSee(url('/#contact'), false);
});
