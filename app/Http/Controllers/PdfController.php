<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use File;
use Response;
 
class PdfController extends Controller
{
    //
    public function index(){
        
        //  return Response::make(file_get_contents('images/image1.pdf'), 200, [
        //                 'content-type'=>'application/pdf',
        //             ]);
        // //or
        return response()->file(public_path('images/image1.pdf'),['content-type'=>'application/pdf']);
    }

}