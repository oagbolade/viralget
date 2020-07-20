<?php
namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;

ini_set("memory_limit", -1);

set_time_limit(0);

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class ManagementInvoiceController extends Controller
{
    public function show($name, $company_name, $campaign_objective, $booking_type, $user_query, $plan_name, $amount)
    {
        $client = new Party([
            'name'          => 'Viralget Limited',
            'address'         => '168C Ekoro Road, Opposite Foursquare Gospel Church, Abule-Egba Lagos.',
            'phone'         => '080xxxxxxxxx',
            'custom_fields' => [
                'website'        => 'www.viralget.com.ng',
            ],
        ]);



        $customer = new Party([
            'name'          => $name,
            'custom_fields' => [
                'company name' => $company_name,
                'description' => $campaign_objective,
            ],
        ]);

        $title = 'trends';

        if($booking_type == 'influencer_management'){
            $title = 'influencer management';
        }

        $items = [
            (new InvoiceItem())->title('Viralget '. $title . 'campaign for the keyword/hashtag ' . $user_query)->pricePerUnit($amount)->quantity(1)->discount(0)->units('N/A'),
        ];

        $notes = [
            'This payment is for the ' . $plan_name . 'plan',
        ];
        $notes = implode("<br>", $notes);

        $six_digit_random_number = mt_rand(100000, 999999);

        $invoice = Invoice::make('receipt')
            ->series('BIG')
            ->sequence($six_digit_random_number)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now())
            ->dateFormat('d/m/Y')
            ->payUntilDays(15)
            ->currencySymbol('₦')
            ->currencyCode('NGN')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator(',')
            ->currencyDecimalPoint('.')
            ->filename($customer->name . ' invoice')
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('vendor/invoices/viralget.jpg'));

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->download();
    }
}
