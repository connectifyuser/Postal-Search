<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostalController extends Controller
{
	public function loadPostalView()
	{
		return view('postal-search');
	}


   /**
	* Search postal detail
	* @param int postalcode
	* @return json
	*/
   public function returnPostalData(Request $request)
   {
		$postalCode = $request->postcode;
		$endpoint = 'https://api.postalpincode.in/pincode/'.$postalCode;
		$postApiRes = Http::get($endpoint);
		$postApiResArr = $postApiRes->json();
		if ($postApiResArr[0]['Status'] == 'Success' && isset($postApiResArr[0]['PostOffice']) && $postApiResArr[0]['PostOffice']) {
			$postCodeHtml = '';
			$postalData = $postApiResArr[0]['PostOffice'] ?? '';
			foreach ($postalData as $key => $postd) {
				$key++;
				$postCodeHtml .= '<tr>';
				$postCodeHtml .=  '<td>'.$key.'</td>';
				$postCodeHtml .= '<td>'.$postd['Name'].'</td>';
				$postCodeHtml .= '<td>'.$postd['BranchType'].'</td>';
				$postCodeHtml .= '<td>'.$postd['District'].'</td>';
				$postCodeHtml .= '<td>'.$postd['Circle'].'</td>';
				$postCodeHtml .= '</tr>';
			}
			return response()->json([
			  "status" => "ok",
			  "message" => "Record Found",
			  "html" => $postCodeHtml
			]);
		}
		return response()->json([
			  "status" => "fail",
			  "message" => "No Record Found",
			  "html" => '<p>No Record Found</p>'
			]);
   }
}
