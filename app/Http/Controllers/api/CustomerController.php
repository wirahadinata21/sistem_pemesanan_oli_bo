<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tblcustomer;
use ErrorException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Node\Query;

class CustomerController extends Controller
{
    //get All
    public function index(Request $request)
    {
        $this->email = $request->email;
        try {
             //$customer = tblcustomer::all();
            $customer = tblcustomer::where('email',$this->email)->get();
            return response()->json($customer, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Berhasil!', 
            'text' => 'Data berhasil diinput.'
        ]);
    }

    public function show($idcustomer)
    {
        try {
            $customer = tblcustomer::where('idcustomer',$idcustomer)->get();
            $response = [
                $customer
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
