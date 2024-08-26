<?php

namespace App\Exports;

use App\Models\Application;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NewArrivalExport implements FromView,ShouldAutoSize
{
    
    use Exportable; 

    private $applications;
    
    public function __construct()
    {
        $this->applications = Application::where('status','new_arrival')->get();
    }

    public function view(): View{
        return view('excel.new-arrival',[
            'applications'=>$this->applications
        ]);
    }
}
