<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\UserDetailsManagement;
use App\Transactions;

use App\Mail\PlanMailables;
use App\Mail\ManagementInvoiceMailables;
use App\Scheduler;
use App\SchedulerManagement;
use App\TrafficData;
use Exception;

class ManagementSubscriptionController extends Controller
{
    //

    public function checkExpired()
    {
        $user = Auth()->user();

        $plan = Plans::where('name', request()->plan)->first();

        if ($plan->amount == 0) { //if free
            Subscription::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'plan_id' => $plan->id,
                    'reporting_balance' => $plan->reporting_limit,
                    'profiling_balance' => $plan->profiling_limit,
                ]
            );

            return redirect(route('campaigns.view'))->withSuccess("Congratulations! Your $plan->name subscription is active");
        }

        if (!$user->details) {
            return redirect()->intended(route('login.signup'));
        }

        return view('pages.checkout')
            ->withPlan($plan)
            ->withUser($user);
    }

    public function checkPaid(){

    }

    public function verifySubscription()
    {
        $reference = request()->reference;
        $user_plan_id = request()->user_plan_id;
        $email = request()->email;

        $user = Auth()->user();

        $client = new Client();
        try {
            $result = $client->get('https://api.paystack.co/transaction/verify/' . rawurlencode($reference), [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('PAYSTACK_SK'),
                ]
            ]);
        } catch (GuzzleException $e) {

            $response = $e->getResponse();
            $responseBodyAsString = json_decode($response->getBody());
            return redirect(route('pricing'))->withError('An error occured with your payment data. Please try again.');
        }

        $response = json_decode($result->getBody());

        if ($response && $response->data && $response->data->status == 'success') {
            $data = $response->data;

            $user_details = UserDetailsManagement::where(['id' => $user_plan_id, 'email' => $email]);
            $get_user_details = $user_details->first();

            // Verify that plan from URL is legit by comparing with database
            // Update traffic data
            // 

            $update = $user_details->update(['paid' => 'true']);

            if($get_user_details->booking_type == 'influencer_management'){
                try {
                    Scheduler::create([
                        'user_id' => $get_user_details->user_id,
                        'user_details_id' => $get_user_details->id,
                        'last_refresh' => $get_user_details->date,
                    ]);
                } catch (Exception $e) {
                    return response([
                        'status' => 500,
                        'message' => 'An error occured '. $e->getMessage()
                    ], 500);
                }
            }

            if (isset($_COOKIE['ip_address'])) {
                $get_traffic_data = TrafficData::where('ip_address', $_COOKIE['ip_address'])->first();
                if ($get_traffic_data) {
                    $get_traffic_data = TrafficData::where('ip_address', $_COOKIE['ip_address'])->update([
                        'paid' => 'Yes'
                    ]);
                }
            }
            
            try {
                SchedulerManagement::create([
                    'user_id' => $get_user_details->user_id,
                    'user_details_id' => $get_user_details->id,
                    'last_refresh' => $get_user_details->date,
                ]);
            } catch (Exception $e) {
                return response([
                    'status' => 500,
                    'message' => 'An error occured '. $e->getMessage()
                ], 500);
            }

            $viralget_email = 'info@viralget.com.ng';
            Mail::to($viralget_email)->send(new PlanMailables($get_user_details));
            Mail::to($email)->send(new ManagementInvoiceMailables($get_user_details));
            // Send invoice

            // Store transactions records
            Transactions::create([
                'user_id' => $user->id,
                'amount' => $data->amount / 100,
                'reference' => $data->reference,
                'comment' => $data->message,
            ]);

            if ($get_user_details->booking_type == 'influencer_management') {
                return redirect(route('campaigns.influencermanagement'))->withSuccess("Congratulations! Your plan is active.
             You can now view and monitor how influencers are interacting with your hashtag");
            }

            return redirect(route('campaigns.trends'))->withSuccess("Congratulations! Your plan is active.
             You will be able to view and monitor your hashtag as soon as it starts to trend which will take about 48hrs. Thank you");

        } else {
            return redirect(route('subscribe', ['plan', \strtolower($plan->name)]))->withError('An error occured with your payment data');
        }
    }
}
