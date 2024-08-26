<?php

namespace App\Exports;

use App\Models\Application;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ApplicationExport implements FromView,ShouldAutoSize
{

    use Exportable; 
    

    private $applications;

    public function __construct() {
        $this->applications = Application::all();
    }


    public function view(): View{
        return view('excel.application',[
            'applications'=>$this->applications
        ]);
    }
}
