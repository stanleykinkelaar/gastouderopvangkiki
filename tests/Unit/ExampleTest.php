<?php

/**
 * Simple example unit tests demonstrating Pest syntax
 */

test('basic math operations work correctly', function () {
    expect(2 + 2)->toBe(4);
    expect(10 - 5)->toBe(5);
    expect(3 * 4)->toBe(12);
});

test('strings can be manipulated', function () {
    $name = 'Gastouderopvang Kiki';

    expect(strtoupper($name))->toBe('GASTOUDEROPVANG KIKI');
    expect(strtolower($name))->toBe('gastouderopvang kiki');
    expect(strlen($name))->toBe(20);
});

test('arrays work as expected', function () {
    $colors = ['teal', 'amber', 'purple'];

    expect($colors)->toHaveCount(3);
    expect($colors)->toContain('teal');
    expect($colors[0])->toBe('teal');
});

test('booleans and null work correctly', function () {
    expect(true)->toBeTrue();
    expect(false)->toBeFalse();
    expect(null)->toBeNull();
    expect('value')->not->toBeNull();
});

test('custom expectation example', function () {
    // Using the custom 'toBeOne' expectation defined in Pest.php
    expect(1)->toBeOne();
});
