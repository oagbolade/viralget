<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TrendsPlan;
use App\InfluencerManagementPlan;

class ManagementInvoiceMailables extends Mailable
{
    use Queueable, SerializesModels;
    public $user_details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_details)
    {
        $this->user_details = $user_details;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = 'info@viralget.com.ng';

        return $this->from($from)
            ->view('emails.managementInvoice')->with([
                'plan_name' => $this->getPlanDetails()['plan_name'],
                'amount' => $this->getPlanDetails()['amount'],
            ]);
    }

    public function getPlanDetails(){
        $plan = TrendsPlan::where(['id' => $this->user_details->plan_id])->first();

        if($this->user_details->booking_type == 'influencer_management'){
            $plan = InfluencerManagementPlan::where(['id' => $this->user_details->plan_id])->first();
        }

        return ['plan_name' => $plan->name, 'amount' => $plan->price];
    }
}
