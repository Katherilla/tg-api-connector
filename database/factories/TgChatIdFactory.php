<?php

namespace Database\Factories;

use App\Models\TgChatId;
use Illuminate\Database\Eloquent\Factories\Factory;

class TgChatIdFactory extends Factory
{
    protected $model = TgChatId::class;

    public function definition()
    {
        return [
            'group_name' => $this->faker,
            'group_id' => $this->faker,
            'group_chat_id' => $this->faker,
        ];
    }
}