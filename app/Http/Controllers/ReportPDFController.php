<?php

namespace App\Http\Controllers;

ini_set("memory_limit", -1);

set_time_limit(0);

use App\Http\Controllers\Controller;
use PDF;
use App\ReportingHistory;
use App\ManagementReportingHistory;
use App\ManagementProfilingHistory;
use App\SummaryHistory;
use App\ProfilingHistory;
use Exception;

class ReportPDFController extends Controller
{
    function download()
    {
        $id = request()->id;
        $type = request()->type;
        
        if($type === 'hashtag'){
            return $this->keywordReport($id);
        }
        
        if($type === 'profiling'){
            return $this->profilingReport($id);
        }
        
        if($type === 'management_profiling'){
            return $this->managementProfilingReport($id);
        }
        
        if($type === 'management_trends'){
            return $this->managementKeywordReport($id);
        }
        
        if($type === 'summary'){
            return $this->campaignSummaryReport($id);
        }
          
    }

    function managementProfilingReport($id)
    {
        $report = ManagementProfilingHistory::find($id);
        if (!$report) return response(['status' => 'error', 'message' => 'Data not found']);
        $data['report_type'] = $report->plan->name;
        $data['report_type_days'] = $report->plan->days;
        $data['data'] = json_decode(json_encode($report->report_data));
        $decode_data = json_decode($data['data']);

        $pdf = PDF::loadView('report.ManagementProfilingReport', [
            'extra_data' => $data,
            'data' => $decode_data,
        ]);

        try {
            return $pdf->download($decode_data->profile->name . ' ' . $this->getTimeNow() . '.pdf');
        } catch (Exception $e) {
            return response([
                'error' => 500,
                'message' => 'An error occured' . $e->getMessage(),
            ], 500);
        } 
    }

    function managementKeywordReport($id)
    {
        $report = ManagementReportingHistory::find($id);

        if (!$report) return response(['status' => 'error', 'message' => 'Data not found']);
        $data['report_type'] = $report->plan->name;
        $data['report_type_days'] = $report->plan->days;
        $data['data'] = json_decode(json_encode($report->report_data));
        $decode_data = json_decode($data['data']);

        $contributors['original_contributors'] = json_decode(json_encode($report->original_contributors));
        $contributors['top_original_contributors'] = json_decode(json_encode($report->top_original_contributors));
        $high_tweets['most_recent_tweets'] = json_decode(json_encode($report->most_recent_tweets));
        $high_tweets['most_recent_replies'] = json_decode(json_encode($report->most_recent_replies));
        $high_tweets['highest_retweeted_tweets'] = json_decode(json_encode($report->highest_retweeted_tweets));
        $data['handle'] = $report->query;

        $pdf = PDF::loadView('report.ManagementReportingPDF', [
            'extra_data' => $data,
            'data' => $decode_data,
            'contributors' => $contributors,
            'high_tweets' => $high_tweets
        ]);

        try {
            return $pdf->download($data['handle'] . ' ' . $this->getTimeNow() . '.pdf');
        } catch (Exception $e) {
            return response([
                'error' => 500,
                'message' => 'An error occured' . $e->getMessage(),
            ], 500);
        }  
    }
    
    function profilingReport($id)
    {
        $report = ProfilingHistory::find($id);
        if (!$report) return response(['status' => 'error', 'message' => 'Data not found']);
        $data['report_type'] = $report->plan->name;
        $data['report_type_days'] = $report->plan->days;
        $data['data'] = json_decode(json_encode($report->report_data));
        $decode_data = json_decode($data['data']);

        $pdf = PDF::loadView('report.profilingReport', [
            'extra_data' => $data,
            'data' => $decode_data,
        ]);

        try {
            return $pdf->download($decode_data->profile->name . ' ' . $this->getTimeNow() . '.pdf');
        } catch (Exception $e) {
            return response([
                'error' => 500,
                'message' => 'An error occured' . $e->getMessage(),
            ], 500);
        }  
    }

    function keywordReport($id)
    {
        $report = ReportingHistory::find($id);

        if (!$report) return response(['status' => 'error', 'message' => 'Data not found']);
        $data['report_type'] = $report->plan->name;
        $data['report_type_days'] = $report->plan->days;
        $data['data'] = json_decode(json_encode($report->report_data));
        $decode_data = json_decode($data['data']);

        $contributors['original_contributors'] = json_decode(json_encode($report->original_contributors));
        $contributors['top_original_contributors'] = json_decode(json_encode($report->top_original_contributors));
        $high_tweets['most_recent_tweets'] = json_decode(json_encode($report->most_recent_tweets));
        $high_tweets['most_recent_replies'] = json_decode(json_encode($report->most_recent_replies));
        $high_tweets['highest_retweeted_tweets'] = json_decode(json_encode($report->highest_retweeted_tweets));
        $data['handle'] = $report->query;

        $pdf = PDF::loadView('report.ReportingPDF', [
            'extra_data' => $data,
            'data' => $decode_data,
            'contributors' => $contributors,
            'high_tweets' => $high_tweets
        ]);
        $pdf->setOption('enable-javascript', false);

        try {
            return $pdf->download($data['handle'] . ' ' . $this->getTimeNow() . '.pdf');
        } catch (Exception $e) {
            return response([
                'error' => 500,
                'message' => 'An error occured' . $e->getMessage(),
            ], 500);
        }  
    }
    
    function campaignSummaryReport($id)
    {
        $report = SummaryHistory::find($id);

        if (!$report) return response(['status' => 'error', 'message' => 'Data not found']);
        $data['report_type'] = $report->plan->name;
        $data['report_type_days'] = $report->plan->days;
        $data['data'] = json_decode(json_encode($report->report_data));
        $decode_data = json_decode($data['data']);
        $data['handle'] = $report->keyword;

        // Testing points
        // return response([
        //     'message' => $decode_data,
        //     'data' => $data,
        // ], 500);

        // return view('report.SummaryReport')->with([
        //     'extra_data' => $data,
        //     'data' => $decode_data,
        // ]);

        $pdf = PDF::loadView('report.SummaryReport', [
            'extra_data' => $data,
            'data' => $decode_data,
        ]);
        $pdf->setOption('enable-javascript', false);

        try {
            return $pdf->download($data['handle'] . ' ' . $this->getTimeNow() . '.pdf');
        } catch (Exception $e) {
            return response([
                'error' => 500,
                'message' => 'An error occured' . $e->getMessage(),
            ], 500);
        }  
    }

    function getTimeNow()
    {
        return date("Y-m-d");
    }
}
