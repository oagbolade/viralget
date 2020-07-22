<?php

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Arr;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

use App\User;
use App\Subscription;
use App\ReportingHistory;
use App\ProfilingHistory;
use App\Account;

class ShowDataController extends Controller
{


    function authenticate() {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();

        return $user;
    }

    public function showProfilingHistory() {

        $user = $this->authenticate();

        $id = request()->id;

        $profile = ProfilingHistory::find($id);

        if(!$profile) return response(['status' => 'error', 'message' => 'Data not found']);

        $data['report_type'] = $user->subscription->plan->name;
        $data['report_type_days'] = $user->subscription->plan->days;
        $data['data'] = json_decode(json_encode($profile->report_data));
        $data['handle'] = $profile->handle;

        $profile_data = json_decode($profile->report_data);
        //Temporary hack to update er
        if($profile_data) {
            Account::where('handle','LIKE', "%$profile->handle%")->update(['er' => $profile_data->engagement_rate]);
        }

        return response(['status' => 'success', 'data' => $data]);
    }

    public function showReportingHistory() {
        $user = $this->authenticate();

        $id = request()->id;

        $report = ReportingHistory::find($id);

        if(!$report) return response(['status' => 'error', 'message' => 'Data not found']);

        $data['report_type'] = $report->plan->name;
        $data['report_type_days'] = $report->plan->days;
        $data['data'] = json_decode(json_encode($report->report_data));
        $data['handle'] = $report->query;

        return response(['status' => 'success', 'data' => $data]);
    }

}
