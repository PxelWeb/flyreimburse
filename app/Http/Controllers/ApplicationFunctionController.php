<?php 

namespace App\Http\Controllers;

use App\Exports\NomadApplicationExport;
use PDF;
use App\Exports\RefusedExport;
use App\Exports\CompletedExport;
use App\Exports\DeliveredExport;
use App\Exports\NewArrivalExport;
use App\Exports\ApplicationExport;
use App\Exports\InPayProcessExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class ApplicationFunctionController extends Controller{

    
    public function pdfDownload(Request $request){
        $id = $request->input('id');
        $username = $request->input('username');
        $sign = $request->input('sign');

        $imageData = file_get_contents($sign);
        $base64 = base64_encode($imageData);
        $mimeType = mime_content_type($sign);
        $signPath = 'data:' . $mimeType . ';base64,' . $base64;

     $pdf = PDF::loadView('pdf.index',compact('id','username','signPath'))
     ->setOption('dpi', 100);
     return $pdf->stream('document.pdf');
    }

    public function nomadApplicationPdf(Request $request){
        $id = $request->input('id');
        $username = $request->input('username');
        $sign = $request->input('sign');

        $imageData = file_get_contents($sign);
        $base64 = base64_encode($imageData);
        $mimeType = mime_content_type($sign);
        $signPath = 'data:' . $mimeType . ';base64,' . $base64;

        $pdf = PDF::loadView('pdf.nomad-application',compact('id','username','signPath'))
        ->setOption('dpi',100);
        return $pdf->stream('document.pdf');
    }

    public function download(Request $request){
        $file_path = public_path($request->query('filename'));
        if(file_exists($file_path)){
            return response()->download($file_path);
        }else{
            return abort(404);
        }
    }


    public function excel(){
        return Excel::download(new ApplicationExport,'application.xlsx');
    }
    public function completedExcel(){
        return Excel::download(new CompletedExport,'completed.xlsx');
    }
    public function deliveredExcel(){
        return Excel::download(new DeliveredExport,'delivered.xlsx');
    }
    public function inPayProcessExcel(){
        return Excel::download(new InPayProcessExport,'inPayProcess.xlsx');
    }
    public function newArrivalExcel(){
        return Excel::download(new NewArrivalExport,'newArrival.xlsx');
    }

    public function refusedExcel(){
        return Excel::download(new RefusedExport,'refused.xlsx');
    }

    public function nomadApplicationExcel(){
        return Excel::download(new NomadApplicationExport,'nomad-applications.xlsx');
    }
}