<?php

namespace App\Http\Controllers;

use App\Models\TgChatId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TgChatIdController extends Controller
{
    public static function daily_report() {
        $results = json_decode(file_get_contents(config('url_config.DATA_AGGREGATOR_URL') . '/api/daily_report'));
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
        file_get_contents('http://api.telegram.org/' . config('tg_config.TG_TOKEN') . '/sendMessage&chat_id=' . $group_chat_id . '&text=' . $msg);
    }
}
