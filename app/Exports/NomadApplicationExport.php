<?php

namespace App\Exports;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class NomadApplicationExport implements FromView,ShouldAutoSize
{
    use Exportable; 

    private $applications;
    
    public function __construct()
    {
        $this->applications = Application::where('user_id',Auth::user()->id)->get();
    }

    public function view(): View{
        return view('excel.nomad-application',[
            'applications'=>$this->applications
        ]);
    }
}
