<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tblbarang;
use ErrorException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Node\Query;

class BarangController extends Controller
{
    //get All
    public function index()
    {
        try {
            $barang = tblbarang::pluck('namabarang', 'idbarang');
            return response()->json($barang, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($idbarang)
    {
        try {
            $barang = tblbarang::where('idbarang',$idbarang)->get();
            $response = [
                $barang
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
