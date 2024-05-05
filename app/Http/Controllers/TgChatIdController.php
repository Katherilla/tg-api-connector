<?php

namespace App\Http\Controllers;

use App\Actions\SendDailyReportAction;
use App\Actions\GetAllGroupsAction;

class TgChatIdController extends Controller
{
    public static function daily_report() {
        SendDailyReportAction::handle();
    }

    public static function get_all_groups() {
        GetAllGroupsAction::handle();
    }
}
