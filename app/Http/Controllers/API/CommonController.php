<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CommonController extends Controller
{
    private $googleMapApiKey = 'AIzaSyD109WXndE4efQIRVVObr55-QFVbwpOHbA'; // Hardcoded API key

    public function placeAutoComplete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search_text' => 'required',
            'country_code' => 'required',
            'language' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 'false',
                'message' => $validator->errors()->first(),
                'all_message' => $validator->errors()
            ];

            return json_custom_response($data, 400);
        }

        $response = Http::withHeaders([
            'Accept-Language' => request('language'),
        ])->get('https://maps.googleapis.com/maps/api/place/autocomplete/json?input=' . request('search_text') . '&components=country:' . request('country_code') . '&key=' . $this->googleMapApiKey);

        return $response->json();
    }

    public function placeDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'placeid' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 'false',
                'message' => $validator->errors()->first(),
                'all_message' => $validator->errors()
            ];

            return json_custom_response($data, 400);
        }

        $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $request->placeid . '&key=' . $this->googleMapApiKey);

        return $response->json();
    }

    public function distanceMatrix(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'origins' => 'required',
            'destinations' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 'false',
                'message' => $validator->errors()->first(),
                'all_message' => $validator->errors()
            ];

            return json_custom_response($data, 400);
        }

        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $request->origins . '&destinations=' . $request->destinations . '&key=' . $this->googleMapApiKey . '&mode=driving');

        return $response->json();
    }
}
