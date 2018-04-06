<?php

namespace App\Http\Controllers;

use App\District;
use App\Division;
use App\Http\Resources\AllDivisionResource;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\UpazilaResource;
use App\Upazila;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function getAll($token)
    {
        // Division::with('districts.upazilas')->get()
        $status = $this->CheckAccessToken($token);

        if($status == true){
            return AllDivisionResource::collection(Division::with('districts.upazilas')->get());
        }else{
            return response()->json(['error'=>'unauthorized'],401);
        }

    }


    public function getDivision($token)
    {
        $status = $this->CheckAccessToken($token);

        if($status == true){
            return response()->json([
                'data' => Division::pluck('name')
            ]);
        }else{
            return response()->json(['error'=>'unauthorized'],401);
        }
    }


    public function getDistrict($division,$token)
    {
        $status = $this->CheckAccessToken($token);

        if($status == true){
            //$getDivisionId = Division::where('name',$division)->first()->id;
            try{
                $getDivisionId = Division::where('name',$division)->first()->id;
            }catch (\Exception $e){
                $getDivisionId = null;
            }


            if($getDivisionId != null){
                //dd($getDivisionId);
                return DistrictResource::collection(District::where('division_id',$getDivisionId)->get());
            }else{
                return response()->json(['error'=>'Not Found'],404);
            }

        }else{

            return response()->json(['error'=>'unauthorized'],401);
        }
    }


    public function getUpazila($district,$token)
    {
        $status = $this->CheckAccessToken($token);

        if($status == true){
            try{
                $getDistrictId = District::where('name',$district)->first()->id;
            }catch (\Exception $e){
                $getDistrictId = null;
            }

            if($getDistrictId != null){
                return UpazilaResource::collection(Upazila::where('district_id',$getDistrictId)->get());
            }else{
                return response()->json(['error'=>'Not Found'],404);
            }
        }else{
            return response()->json(['error'=>'unauthorized'],401);
        }
    }


    public function CheckAccessToken($token)
    {
        $status = false;
        $getTokens = DB::table('oauth_access_tokens')->get();

        foreach ($getTokens as $checkToken){
            if($checkToken->id == $token){
                $status = true;
                break;
            }
        }

        return $status;
    }
}
