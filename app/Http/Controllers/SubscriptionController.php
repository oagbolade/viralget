<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Subscription;
use App\Plans;
use App\TrafficData;
use App\Transactions;

class SubscriptionController extends Controller
{
    //

    public function subscribe() {
        $user = Auth()->user();

        $plan = Plans::where('name', request()->plan)->first();

        if($plan->amount == 0) { //if free
            Subscription::updateOrCreate(
            ['user_id' => $user->id ],
            [
                'plan_id' => $plan->id,
                'reporting_balance' => $plan->reporting_limit,
                'profiling_balance' => $plan->profiling_limit,
            ]);            

            return redirect(route('campaigns.view'))->withSuccess("Congratulations! Your $plan->name subscription is active");
        }

        if(!$user->details) {
            return redirect()->intended(route('login.signup'));
        }

        return view('pages.checkout')
                ->withPlan($plan)
                ->withUser($user);
    }

    public function verifySubscription() {
        $reference = request()->reference;
        $user = Auth()->user();

        $client = new Client();
        try {
            $result = $client->get('https://api.paystack.co/transaction/verify/'.rawurlencode($reference), [
                'headers' => [
                    'Authorization' => 'Bearer '.env('PAYSTACK_SK'),
                ]
            ]);        
    
        } catch(GuzzleException $e) {

            $response = $e->getResponse();
            $responseBodyAsString = json_decode($response->getBody());
            // dd($responseBodyAsString);
            return redirect(route('pricing'))->withError('An error occured with your payment data. Please try again.');

        }

        $response = json_decode($result->getBody());        
        
        if($response && $response->data && $response->data->status == 'success') {
            $data = $response->data;
            //Store transaction/payment record
            Transactions::create([
                'user_id' => $user->id,
                'amount' => $data->amount / 100,
                'reference' => $data->reference,
                'comment' => $data->message,
            ]);

            if (isset($_COOKIE['ip_address'])) {
                $get_traffic_data = TrafficData::where('ip_address', $_COOKIE['ip_address'])->first();
                if($get_traffic_data){
                    $get_traffic_data = TrafficData::where('ip_address', $_COOKIE['ip_address'])->update([
                        'paid' => 'Yes'
                    ]);
                }
            }
            
            $plan = Plans::where('name', $data->metadata->custom_fields[0]->value)->first();
            //Create subscription record for user
            Subscription::updateOrCreate(
            ['user_id' => $user->id ],
            [
                'plan_id' => $plan->id,
                'reporting_balance' => $plan->reporting_limit,
                'profiling_balance' => $plan->profiling_limit,
            ]);
                
            return redirect(route('campaigns.view'))->withSuccess("Congratulations! Your $plan->name subsciption is active");
        } else {
            return redirect(route('subscribe', ['plan', \strtolower($plan->name)]))->withError('An error occured with your payment data');
        }
    }
}
