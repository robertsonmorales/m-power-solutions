<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Arr;

class ApiController extends Controller
{
    public function dashboard(){
        $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        $avg = []; // array(0,2, 2.8, 3.4, 3.8, 3.5, 2.8, 2.5, 3, 4.3, 4.5, 4.1, 5);
        $exams = []; // array(0, 2, 2.2, 2.5, 2.8, 3.4, 3.7, 3.6, 3.2, 2.6, 2.7, 3, 4.4);

        for ($i=0; $i < 12; $i++) { 
            $avg[] = mt_rand(2.0, 5.0);
            $exams[] = mt_rand(2.0, 5.0);
        }

        return array(
            'months' => $months,
            'avg' => $avg,
            'exams' => $exams
        );
    }
}
