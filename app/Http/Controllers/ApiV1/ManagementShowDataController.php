<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;

use App\User;
use App\ManagementReportingHistory;
use App\ManagementProfilingHistory;
use App\SummaryHistory;

class ManagementShowDataController extends Controller
{


    function authenticate()
    {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();

        return $user;
    }

    public function showSummaryHistory()
    {
        $id = request()->id;

        $profile_summary = SummaryHistory::find($id);

        if (!$profile_summary) return response(['status' => 'error', 'message' => 'Data not found']);

        $data['keyword'] = $profile_summary->keyword;
        $data['report_type'] = $profile_summary->plan->name;
        $data['report_type_days'] = $profile_summary->plan->days;
        $data['data'] = json_decode(json_encode($profile_summary->report_data));
        $data['influencers'] = $profile_summary->influencers;

        return response(['status' => 'success', 'data' => $data]);
    }

    public function showProfilingHistory()
    {

        $user = $this->authenticate();

        $id = request()->id;

        $profile = ManagementProfilingHistory::find($id);

        if (!$profile) return response(['status' => 'error', 'message' => 'Data not found']);

        $data['keyword'] = $profile->keyword;
        $data['report_type'] = $profile->plan->name;
        $data['report_type_days'] = $profile->plan->days;
        $data['data'] = json_decode(json_encode($profile->report_data));
        $data['handle'] = $profile->handle;

        return response(['status' => 'success', 'data' => $data]);
    }

    public function showReportingHistory()
    {
        $user = $this->authenticate();

        $id = request()->id;

        $report = ManagementReportingHistory::find($id);

        if (!$report) return response(['status' => 'error', 'message' => 'Data not found']);

        $data['report_type'] = $report->plan->name;
        $data['report_type_days'] = 24;
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
