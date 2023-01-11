<?php


namespace App\Http\Controllers\Home;
// phpinfo();
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
//use Image;

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


    public function UpdateSlider(Request $request){

        $slide_id = $request->id;

        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_gen);

            // first you need to create a new folder  then create a new image 
            $save_url = 'upload/home_slide/'.$name_gen;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,

            ]); 
            $notification = array(
            'message' => 'Home Slide Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } else{

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,  

            ]); 
            $notification = array(
            'message' => 'Home Slide Updated without Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } // end Else

     }
    



}
