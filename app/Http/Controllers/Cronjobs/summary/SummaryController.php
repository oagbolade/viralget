<?php

namespace App\Http\Controllers\Cronjobs\summary;

ini_set("memory_limit", -1);

set_time_limit(0);

use App\Http\Controllers\Controller;
use App\Scheduler;
use App\UserDetailsManagement;
use App\Http\Controllers\ApiV1\ManagementTwitterAPIController;
use Exception;

class SummaryController extends Controller
{
    function checkSchedule()
    {
        $refresh = Scheduler::all();

        foreach ($refresh as $schedule) {
            if ($this->refresh($schedule['last_refresh'])) {
                $get_user_details = UserDetailsManagement::where(['id' => $schedule['user_details_id']])->first();

                $user_id = $get_user_details->user_id;
                $influencers = $get_user_details->influencers;
                $keyword = $get_user_details->user_query;
                $plan_id = $get_user_details->plan_id;
                $user_details_id = $get_user_details->id;

                $twitterAPI = new ManagementTwitterAPIController;

                try {
                    $twitterAPI->getCampaignSummary($user_id, $influencers, $keyword, $plan_id, $user_details_id);
                } catch (Exception $e) {
                    continue;
                }

                $new_refresh_date = date("Y-m-d");

                $this->updateScheduler($user_details_id, $new_refresh_date);

                $msg = "Cron has ended";

                $msg = wordwrap($msg, 70);

                mail("oladayo.agbolade@viralget.com.ng", "Campaign Summary Cron Ended", $msg);
            }
        }
    }

    public function updateScheduler($user_details_id, $new_refresh_date)
    {
        try {
            Scheduler::where([
                'user_details_id' => $user_details_id,
            ])->update([
                'last_refresh' => $new_refresh_date,
            ]);
        } catch (Exception $e) {
            return response([
                'status' => 500,
                'message' => 'An error occured ' . $e->getMessage(),
            ], 500);
        }
    }

    public function refresh($refreshDate)
    {
        $user_date = date_create($refreshDate);
        $now = date("Y-m-d");
        $current_time = date_create($now);
        $diff = date_diff($user_date, $current_time);
        $time_difference =  $diff->format("%a%");

        if ($time_difference > 0) {
            return true;
        }

        return false;
    }
}
