<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tblorderheader;
use App\Models\tblorderdetail;
use App\Models\mastersequences;
use App\Models\tblcustomer;
use App\Models\tbllogorder;
use App\Models\user;
use ErrorException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Node\Query;
use Livewire\WithFileUploads;

class OrderPOController extends Controller
{
    use WithFileUploads;
    private $idcustomer;
  

    public function index(Request $request)
    {
        // $this->idcustomer ='CT-260623-2';
        $this->idcustomer = $request->idcustomer;
        try {
            $category = tblorderheader::vieworderbycust($this->idcustomer);
            return response()->json($category, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = validator::make($request->all(), [
                'nomorpo' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
           
            $ms = mastersequences::find("OD");
            $num=$ms->seqno;
            $jmlh=$num+1;
            $waktu=date('dmy');
            $nounik="OD-".$waktu.-$jmlh;
            
            // $marketing = tblcustomer::find("CT-260623-2");
            // $idmarketing=$marketing->idmarketing;


            //$file = $request->lampiranpo->storeAs('public/fileupload','Test.pdf');
            // $file = $request->file('lampiranpo')->storeAs('lampiranpo', 'Test.pdf');
            // $file = $request->lampiranpo->storeAs('lampiranpo','lampiranpo.pdf');
            if ($request->hasFile('lampiranpo')) {
                /** Make sure you will properly validate your file before uploading here */
        
                /** Get the file data here */
                $file = $request->lampiranpo;
        
                /** Generate random unique_name for file */
                // $fileName = time().md5(time());
                if (is_array($file)) {
                    foreach ($file as $item) {
                        $item->store('files', 'public');
                    }
                } else {
                    $file->store('files', 'public');
                }
                // $file->storeAs('lampiranpo','lampiranpo.pdf');
           };
            tblorderheader::Create([
                'idorder'=> $nounik,
                'tgltransaksi'=>date('dmy'),
                'idcustomer'=> $request->idcustomer,
                'tglpo'=>$request->tglpo,
                'nomorpo'=>$request->nomorpo,
                'nilaipo'=>$request->nilaipo,
                'lampiranpo'=>'PO-'.$nounik,
                'idmarketing'=> $request->idmarketing,
                'komisi'=> ($request->jumlah)* 50000,
                'statusorder'=>'MSKPO'
                ]);

            tblorderdetail::Create([
                    'idorder'=> $nounik,
                    'idbarang'=>$request->idbarang,
                    'jumlah'=>$request->jumlah
            ]);

            tbllogorder::Create([
                'idorder'=> $nounik,
                'prosesname'=> "MSKPO",
                'user' => 'Customer'//auth()->user()->name
                ]);

            $ms->seqno = $jmlh;
            $ms->save();

            // tblorderheader::create($request->all());
            $response = [
                'Success' => 'New PO Created',
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function show($id)
    {
        try {
            $category = tblorderheader::findOrFail($id);
            $response = [
                $category
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $category = tblorderheader::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['succeed' => false, 'Message' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $tblorderheader->update($request->all());
            $response = [
                'Success' => 'Category Updated'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'no result',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function destroy($id)
    {
        try {
            tblorderheader::findOrFail($id)->delete();
            return response()->json(['success' => 'Category deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
