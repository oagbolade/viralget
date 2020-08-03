<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;

use App\User;
use App\ReportingHistory;
use App\ProfilingHistory;

class ShowDataController extends Controller
{


    function authenticate()
    {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();

        return $user;
    }

    public function showProfilingHistory()
    {

        $user = $this->authenticate();

        $id = request()->id;

        $profile = ProfilingHistory::find($id);

        if (!$profile) return response(['status' => 'error', 'message' => 'Data not found']);

        $data['report_type'] = $user->subscription->plan->name;
        $data['report_type_days'] = $user->subscription->plan->days;
        $data['data'] = json_decode(json_encode($profile->report_data));
        $data['handle'] = $profile->handle;

        $profile_data = json_decode($profile->report_data);

        return response(['status' => 'success', 'data' => $data]);
    }

    public function showReportingHistory()
    {
        $user = $this->authenticate();

        $id = request()->id;

        $report = ReportingHistory::find($id);

        if (!$report) return response(['status' => 'error', 'message' => 'Data not found']);
        $data['report_type'] = $report->plan->name;
        $data['report_type_days'] = $report->plan->days;
        $data['data'] = json_decode(json_encode($report->report_data));
        $contributors['original_contributors'] = json_decode(json_encode($report->original_contributors));
        $contributors['top_original_contributors'] = json_decode(json_encode($report->top_original_contributors));
        $high_tweets['most_recent_tweets'] = json_decode(json_encode($report->most_recent_tweets));
        $high_tweets['most_recent_replies'] = json_decode(json_encode($report->most_recent_replies));
        $high_tweets['highest_retweeted_tweets'] = json_decode(json_encode($report->highest_retweeted_tweets));
        $data['handle'] = $report->query;

        return response([
            'status' => 'success',
            'data' => $data,
            'high_tweets' => $high_tweets,
            'contributors' => $contributors
        ]);
    }
}
