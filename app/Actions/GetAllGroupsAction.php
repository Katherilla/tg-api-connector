<?php

namespace App\Actions;

use App\Models\TgChatId;

class GetAllGroupsAction
{
    public static function handle(){
        return response()->json(TgChatId::all(), 200);
    }
}