<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Biodata;
use App\Models\City;
use App\Models\Province;
use App\Models\Activity;
use App\Models\Assets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
class HomeController extends Controller
{
    public function index(){
        return view('home');
    }


    public function allActivity(){
        return view('allActivity',[
            'allactivity' => Activity::get(),
        ]);
    }

    public function landingpage(){

        $debit = Assets::where('payment', 'Debit')->sum('amount');
        $kredit = Assets::where('payment', 'Kredit')->sum('amount');

        $total = $kredit - $debit;


        // $laki = Biodata::where('gender','laki-laki')->count();
        // $perempuan = Biodata::where('gender','perempuan')->count();
        return view('landingpage', [
            'activities' => Activity::skip(0)->take(3)->get(),
            'anggota' => Biodata::where('condition','!=', null)->count(),
            'kota' => City::where('count','<>', 0)->count(),
            'allkota' => City::where('count', '!=',0) ->get(),
            'provinsi' => Province::where('count','<>', 0)->count(), 
            'cashflow' => Assets::get(),
            'totalsaldo' => number_format($total, 2, ',', '.'),
            'totalkk' => Biodata::where('head_kk','=',null) -> count(),
            'genderlaki' => Biodata::where('gender', '=', 'laki-laki')
                              -> where('condition', '!=', null)
                              -> count(),
            
            'genderperempuan' => Biodata::where('gender', '=', 'perempuan')
                              -> where('condition', '!=', null)
                              -> count(),
            // 'gender' => Biodata::where('gender','=','perempuan','or','laki-laki') -> count()
            // 'genderlaki' => Biodata::where('gender', '=', 'laki-laki') -> count(),
            // 'gender' => Biodata::select('gender')->get()
            
        ]);
    }




    public function detail($id){

         return view('detail',[
             'biodata' => Biodata::find($id)
         ]);
    }

    public function detailActivity($id){
        // $activity = Activity::find($id);
        // $text = trim(strip_tags($activity->body));

        // dd($text)
        return view ('detailActivity',[
            'detailActivity' => Activity::find($id)
            
        ]);
    }



    // public function getDetailActivity(string $id): View
    // {
        
    //     $detailActivity = Activity::findOrFail($id);

    //     dd(detailActivity);
    //     // return view('detailActivity', compact('detailActivity'));
    // }




    public function province(){
//        $jsonProvinces = Storage::json('/public');

//        dd($jsonContent);

//        foreach ($jsonProvinces as $data){
//            $province = new Province();
//            $province->name=$data['name'];
//            $province->save();
//        }

        return 'successfully';
    }
}
