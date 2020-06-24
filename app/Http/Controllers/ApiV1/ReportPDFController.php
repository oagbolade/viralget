<?php

namespace App\Http\Controllers\ApiV1;

ini_set("memory_limit", -1);

set_time_limit(0);

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Exception;
use PDF;

class ReportPDFController extends Controller
{
    function downloadProfilingReport()
    {
        $report_type_days = request()->report_type_days;
        $handle = request()->handle;
        $date_from = request()->date_from;
        $date_to = request()->date_to;

        $impressions = request()->impressions;
        $reach = request()->reach;
        $followers = request()->followers;
        $following = request()->following;
        $averageRetweets = request()->averageRetweets;
        $averageLikes = request()->averageLikes;
        $totalTweets = request()->totalTweets;
        $total_engagements =  request()->total_engagements;
        $engagement_rate = request()->engagement_rate;
        $location = request()->location;
        $retweets = request()->retweets;
        $tweets = request()->tweets;
        $about = request()->about;
        $name = request()->name;

        $data = [
            "report_days" => $report_type_days,
            "handle" => $handle,
            "date_from" => $date_from,
            "date_to" => $date_to,

            "impressions" => $impressions,
            "reach" => $reach,
            "followers" => $followers,
            "following" => $following,
            "averageRetweets" => $averageRetweets,
            "averageLikes" => $averageLikes,
            "total_engagements" => $total_engagements,
            "location" => $location,
            "retweets" => $retweets,
            "tweets" => $tweets,
            "total_tweets" => $totalTweets,
            "engagement_rate" => $engagement_rate,
            "about" => $about,
            "name" => $name,
           
        ];

        return view('report.profilingReport')->with('data', $data);


        $pdf_name = $handle . ' '. $this->getTimeNow();

        $pdf = PDF::loadView('report.profilingReport', ['data' => $data]);
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('images', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        return $pdf->download($pdf_name);
    }
    
    function downloadKeywordReport()
    {
        $report_type_days = request()->report_type_days;
        $handle = request()->handle;
        $date_from = request()->date_from;
        $date_to = request()->date_to;
        $potential_impact = request()->potential_impact;
        $potential_reach = request()->potential_reach;
        $campaign_value = request()->campaign_value;
        $totalTweets = request()->totalTweets;
        $media_count = request()->media_count;
        $text_count = request()->text_count;
        $contributors = request()->contributors;
        $avr_contribution = request()->avr_contribution;
        $likes =  request()->likes;
        $engagement_rate = request()->engagement_rate;

        // High tweet related data
        $top_retweeters = request()->high_retweeters;
        $highest_retweeted_tweets = request()->highest_retweeted_tweets;
        $highest_impacts = request()->high_impacts;
        $top_contributors = request()->top_contributors;

        $data = [
            "report_days" => $report_type_days,
            "campaign_value" => $campaign_value,
            "handle" => $handle,
            "date_from" => $date_from,
            "date_to" => $date_to,
            "potential_impact" => $potential_impact,
            "potential_reach" => $potential_reach,
            "total_tweets" => $totalTweets,
            "media_count" => $media_count,
            "text_count" => $text_count,
            "contributors" => $contributors,
            "avr_contribution" => $avr_contribution,
            "likes_data" =>  $likes,
            "engagement_rate" => $engagement_rate,
            "top_retweeters" => $top_retweeters,
            "highest_retweeted_tweets" => $highest_retweeted_tweets,
            "highest_impacts" => $highest_impacts,
            "top_contributors" => $top_contributors,
        ];

        // return view('report.reportPDF')->with('data', $data);


        $pdf_name = $handle . ' '. $this->getTimeNow();

        $pdf = PDF::loadView('report.keywordHashtagReport', ['data' => $data]);
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('images', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        return $pdf->download($pdf_name);
    }

    function getTimeNow(){
        return date("Y-m-d");
    }
}
