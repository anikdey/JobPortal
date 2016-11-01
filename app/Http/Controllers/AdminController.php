<?php

namespace App\Http\Controllers;

use App\Services\CityService;
use App\Services\CountryService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller {

    private $countryService;
    private $cityService;
    public function __construct(CountryService $countryService, CityService $cityService)
    {
        $this->countryService = $countryService;
        $this->cityService = $cityService;
    }

   public function welcomeScreen() {

       if(Auth::check() && Auth::user()->role == "ADMIN") {
           $sidebar = view('inc.sidebar');
           $header = view('inc.header');
           $footer = view('inc.footer');

           return view("admin.dashboard.welcomeScreen")
               ->with('header', $header)
               ->with('sidebar', $sidebar)
               ->with('footer', $footer)
               ;
       } else {
           Session::flash('message', 'You are not authorized!');
           return Redirect::to('/');
       }
   }


    public function downloadAttachment($fileName) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            return response()->download(storage_path('\app\uploads\\cvs\\' . $fileName));
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function showAttachment($fileName) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {

            $path = storage_path('\app\uploads\\cvs\\' . $fileName);

            return Response::make(file_get_contents($path), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$fileName.'"'
            ]);


           // return response()->download(storage_path('\app\uploads\\cvs\\' . $fileName));
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }





}
