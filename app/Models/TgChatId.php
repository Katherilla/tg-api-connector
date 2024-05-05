<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TgChatId extends Model
{
    use HasFactory;
    protected $table = 'tg_chat_ids';
    protected $guarded = [];
}
