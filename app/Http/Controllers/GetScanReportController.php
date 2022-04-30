<?php

namespace App\Http\Controllers;

use App\VirusTotalReport;
use Illuminate\Http\Request;

class GetScanReportController extends Controller
{
    public function getScanReport(request $request){

        $api_key= config('virus_scanner.api_key',null);
        $resource= $request->input('scan_url');
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://www.virustotal.com/vtapi/v2/url/report?apikey='.$api_key.'&resource='.$resource.'&allinfo=true&scan=0', [
            'headers' => [
              'Accept' => 'application/json',
            ],
          ]);

          $response= $response->getBody();
          $response=json_decode($response,true);
          if($response['response_code'] == 1){

            $new_report= new VirusTotalReport();
            $new_report->scan_id=$response['scan_id'];
            $new_report->permalink=$response['permalink'];  
            $new_report->url=$response['url'];     
   
            $new_report->scan_date=$response['scan_date'];
            $new_report->updated_scan_date=$response['scan_date'];
            $new_report->positives=$response['positives'];
            $new_report->totals=$response['total'];
            $new_report->scans_clean_mx=isset($response['scans']['CLEAN MX'])?$response['scans']['CLEAN MX']:null;
            
            $new_report->scans_malwarepatrol = isset($response['scans']['MalwarePatrol'])?$response['scans']['MalwarePatrol']:null;
           
            $new_report->save();
        
            return $response;
          }else{
            return redirect()->back()->with('error', 'An error occured please try again!');
          }
          
    }

}