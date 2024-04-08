<?php

namespace App\Http\Controllers;

use App\Models\TgChatId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TgChatIdController extends Controller
{
    public static function daily_report() {
        $results = json_decode(file_get_contents('https://c179-93-188-41-68.ngrok-free.app/api/daily_report'));
        $yesterday= \Carbon\Carbon::yesterday()->toDateString();
        foreach($results as $res){
            $msg = 'Stats for ' . $yesterday;
            $msg .= "\nGroup name: " . $res->group_name;
            $msg .= "\nPosts: " . $res->cnt_posts;
            $msg .= "\nLikes: " . $res->cnt_likes;
            $msg .= "\nComments: " . $res->cnt_comments;
            $msg .= "\nReposts: " . $res->cnt_reposts;

            $group_chat_id = TgChatId::where('group_id', $res->group_id)->get()[0]->group_chat_id;
            self::tg_send_message($group_chat_id, $msg);
        }
    }

    public static function tg_send_message($group_chat_id, $msg) : void{
        TgChatId::create([
            'group_name' => $msg,
            'group_id' => 'test',
            'group_chat_id' => $group_chat_id
        ]);
    }
}
