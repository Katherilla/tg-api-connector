<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use App\Models\TgChatId;
use Pest\Exceptions;
use Illuminate\Support\Facades\Http;

uses(Tests\TestCase::class);

it('checks if get_all_groups is correct', function(){
    $response = $this->get('api/get_all_groups/');
    $response->assertOk();
    $response->assertJsonCount(TgChatId::count());
    foreach (json_decode($response->content()) as $item) {
        expect($item)->toHaveKeys(['group_name', 'group_id'])
            ->and($item->group_name)->toBeString()
            ->and($item->group_id)->toBeNumeric();
    }
});

it('checks if data-aggregator is accessible', function (){
    $response = Http::get(config('url_config.DATA_AGGREGATOR_URL'));
    expect($response->status())->toBe(200);
});

it('should create a new group', function () {
    $group = TgChatId::factory()->create([
        'group_name' => 'Test',
        'group_id' => '1234',
        'group_chat_id' => '4321',
    ]);

    expect($group->group_name)->toBe('Test')
        ->and($group->group_id)->toBe('1234')
        ->and($group->group_chat_id)->toBe('4321');
});
