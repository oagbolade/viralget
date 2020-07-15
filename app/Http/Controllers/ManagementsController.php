<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Validator;
use App\User;
use App\UserDetailsManagement;
use App\TrendsPlan;
use App\InfluencerManagementPlan;
use Exception;

class ManagementsController extends Controller
{
    public function managementSignup()
    {
        $bookingType = request()->bookingType;
        $plan_id = request()->plan;

        return view('managements.signup')->with([
            'bookingType' => $bookingType,
            'plan' => $plan_id,
        ]);
    }

    public function submitDetails()
    {
        $bookingType = request()->bookingType;

        if(!isset($bookingType)){
            $message = 'Cannot get price data please go to the pricing page';

            return redirect()->back()
                ->withErrors(['errors' => $message])
                ->withInput();
        }

        $plan = request()->plan;
        $agency_type = request()->agency_type;
        $name = request()->name;
        $company_name = request()->company_name;
        $position = request()->position;
        $phone = request()->phone;
        $email = request()->email;
        $user_query = request()->user_query;
        $influencers = request()->influencers;
        $brand_name = request()->brand_name;
        $brand_industry = request()->brand_industry;
        $campaign_objective = request()->campaign_objective;
        $date = request()->date;

        $validator = Validator::make(request()->all(), [
            'agency_type' => 'required',
            'company_name' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'user_query' => 'required',
            'brand_name' => 'required',
            'brand_industry' => 'required',
            'campaign_objective' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where(['email' => $email])->first();

        if ($user && $user->user_type !== $bookingType) {
            $message = 'User with this email already exists, please signup with a different email';

            return redirect()->back()
                ->withErrors(['errors' => $message])
                ->withInput();
        }

        try {
            User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make($email),
                    'user_type' => $bookingType,
                ]
            );
        } catch (Exception $e) {
            return response([
                'status' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }

        try {
            UserDetailsManagement::create([
                'booking_type' => $bookingType,
                'name' => $name,
                'agency_type' => $agency_type,
                'company_name' => $company_name,
                'position' => $position,
                'phone' => $phone,
                'email' => $email,
                'influencers' => $influencers,
                'user_query' => $user_query,
                'brand_name' => $brand_name,
                'brand_industry' => $brand_industry,
                'campaign_objective' => $campaign_objective,
                'date' => $date,
            ]);
        } catch (Exception $e) {
            return response([
                'status' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }

        return redirect()->intended(route('management.checkout', ['plan' => $plan, 'bookingType' => $bookingType, 'email' => $email]))
            ->withSuccess('We have received your details, kindly proceed to make payments');
    }

    public function checkout()
    {
        $bookingType = request()->bookingType;
        $plan_id = request()->plan;
        $email = request()->email;

        if (!isset($bookingType) || !isset($plan_id)) {
            return response([
                'status' => 400,
                'message' => 'Cannot get pricing data, please go to the pricing page',
            ], 400);
        }

        $plan = TrendsPlan::where(['id' => $plan_id])->first();

        if ($bookingType === 'influencer_management') {
            $plan = InfluencerManagementPlan::where(['id' => $plan_id])->first();
        }
        
        return view('managements.checkout')->with([
            'plan' => $plan,
            'email' => $email,
        ]);
    }
}
