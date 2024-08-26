<?php 

use Carbon\Carbon;


function imageToBase64($path)
{
    $imagePath = asset($path);
    dd($imagePath);
    $type = pathinfo($imagePath, PATHINFO_EXTENSION);
    $data = file_get_contents($imagePath);
    return 'data:image/' . $type . ';base64,' . base64_encode($data);
}

//set active route for sidebar
function setActive(array $route){
    if (array($route)){
        foreach ($route as $r){
            if (request()->routeIs($r)){
                return 'active';
            }
        }
    }
}


//check the application status 
function check($reason,$delay){
     //FlightDelayed
     if($reason == 'flight_delayed' && $delay == 1){
        return 'More than 3hours';
    }elseif($reason == 'flight_delayed' && $delay == 0){
        return 'Less than 3hours';

        //FlightCancelled
    }elseif($reason == 'flight_cancelled' && $delay == 1){
        return 'More than 14days';
    }elseif($reason == 'flight_cancelled' && $delay == 0){
        return 'Less than 14days'; 
    }

    //DeniedBoarding
    elseif($reason == 'denied_boarding' && $delay == 1){
        return 'More than 3hours';
    }elseif($reason == 'denied_boarding' && $delay == 0){
        return 'Less than 3hours';
    }

    //ScheduleChange
    elseif($reason == 'schedule_change' && $delay == 1){
        return 'More than 14days';
    }elseif($reason == 'schedule_change' && $delay == 0){
        return 'Less than 14days'; 
    }

    //TransitLoss
    elseif($reason =='transit_loss' && $delay == 1){
        return 'More than 3hours';
    }elseif($reason == 'transit_loss' && $delay == 0){
        return 'Less than 3hours';
    }

    //FlightDiverted
    elseif($reason == 'flight_diverted' && $delay == 1){
        return 'More than 3hours';
    }elseif($reason == 'flight_divered' && $delay == 0){
        return 'Less than 3hours';
    }
}


function calculateTime($time){
   return Carbon::parse($time)->diffForHumans();
}