<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;

use App\User;
use App\Subscription;
use App\ManagementReportingHistory;
use App\ManagementProfilingHistory;
use App\SummaryHistory;

class ManagementShowDataController extends Controller
{


    function authenticate() {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();

        return $user;
    }

    public function showSummaryHistory() {
        $id = request()->id;

        $profile_summary = SummaryHistory::find($id);

        if(!$profile_summary) return response(['status' => 'error', 'message' => 'Data not found']);

        $data['keyword'] = $profile_summary->keyword;
        $data['report_type'] = $profile_summary->plan->name;
        $data['report_type_days'] = $profile_summary->plan->days;
        $data['data'] = json_decode(json_encode($profile_summary->report_data));
        $data['influencers'] = $profile_summary->influencers;

        return response(['status' => 'success', 'data' => $data]);
    }
    
    public function showProfilingHistory() {

        $user = $this->authenticate();

        $id = request()->id;

        $profile = ManagementProfilingHistory::find($id);

        if(!$profile) return response(['status' => 'error', 'message' => 'Data not found']);

        $data['keyword'] = $profile->keyword;
        $data['report_type'] = $profile->plan->name;
        $data['report_type_days'] = $profile->plan->days;
        $data['data'] = json_decode(json_encode($profile->report_data));
        $data['handle'] = $profile->handle;

        // $profile_data = json_decode($profile->report_data);
        //Temporary hack to update er
        // Coming soon
        // if($profile_data) {
        //     Influencers::where('handle','LIKE', "%$profile->handle%")->update(['er' => $profile_data->engagement_rate]);
        // }

        return response(['status' => 'success', 'data' => $data]);
    }

    public function showReportingHistory() {
        $user = $this->authenticate();

        $id = request()->id;

        $report = ManagementReportingHistory::find($id);

        if(!$report) return response(['status' => 'error', 'message' => 'Data not found']);

        $data['report_type'] = $report->plan->name;
        $data['report_type_days'] = $report->plan->days;
        $data['data'] = json_decode(json_encode($report->report_data));
        $data['handle'] = $report->query;

        return response(['status' => 'success', 'data' => $data]);
    }

}
