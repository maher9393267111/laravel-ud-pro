<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeSliderController extends Controller
{
    //

    public function HomeSlider(){
     //   $homeslide1 = Homeslide::find(1);
     $homeslide =  HomeSlide::orderBy('id', 'desc')->first();
      //  $homeslide =    DB::table('home_slides')->take(1)->get()[0];
      
        error_log('Entered lp_controller.php -+-❤️❤️❤️ (action: '.$homeslide.')');
        error_log('data');
      
        return view('admin.home_slide.home_slide_all', compact('homeslide'));
    }
}
