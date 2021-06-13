<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index()
    {
        
        Helper::getHexColor();
       // $users = User::limit(5)->get();
        $users = User::withCount('posts')->orderBy('posts_count','DESC')->limit(3)->get();


        $users = User::withCount(['posts'=> function($query){

            $query->where('created_at' , '>=' , Carbon::now()->subDay()  );

        }])->orderBy('posts_count','DESC')->limit(3)->get();

     //  dd($users );

        return view('admin.dashboard')->with('users',$users);
        
    }

}
