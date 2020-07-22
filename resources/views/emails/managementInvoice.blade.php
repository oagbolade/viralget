@extends('layouts.email')

@section('content')
<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
    Hi {{ $user_details->name }},
</p>
<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
    Thank you for purchasing our trends plan. With our twitter trending topic, you have influencers talking about your campaign/brand, saying the right things to help
    boost your campaign objective. we are very keen on the type of tweets that goes out on every trend, ensuring they
    resonate with the brand.<br>
</p>
<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
    Please click the link below to download your invoice.
</p>
<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary"
    style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
    <tbody>
        <tr>
            <td align="left"
                style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                <table border="0" cellpadding="0" cellspacing="0"
                    style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                    <tbody>
                        <tr>
                            <td
                                style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #1181dd; border-radius: 5px; text-align: center;">
                                <a href="http://localhost:8000/api/v1/management/invoice/{{ $user_details->name  }}/{{ $user_details->company_name }}/{{ $user_details->campaign_objective }}/{{ $user_details->booking_type }}/{{ $user_details->user_query }}/{{ $plan_name }}/{{ $amount }}"
                                    target="_blank"
                                    style="display: inline-block; color: #ffffff; background-color: #1181dd; border: solid 1px #1181dd; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #1181dd;">
                                    Download Invoice
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection