<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(2);

           // return response($users,200)
         //               ->header('content-type','text/json');
                        
        return view('admin.user.index')->with('users',$users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {



        $picture_file = $request->file('picture');
        $path = null;

        if($picture_file){

            $path = $picture_file->store('public/user_pictures');
            $path = Str::replace('public/','',$path);

        }


        //dd($path);


        // $user = User::create($request->all());
        // $user->picture = $path;
        // $user->save();
        
        User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
                'picture'=>$path
                ]);


            // $to = 'rizwanchand@msn.com';
            // $subject = 'new user created';
            // $body = 'this is email';
            // Mail::to($to)
            //     ->cc($to)
            //     ->send();


        return redirect(route('user.index'))->with('success','User created successfully.');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        return view('admin.user.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        //

        try {


        
            $picture_file = $request->file('picture');

        

                if($picture_file){

                    $path = $picture_file->store('public/user_pictures');
                    $path = Str::replace('public/','',$path);

                    $user->picture = $path;

                }

                if(!empty($request->input('password'))){

                    $user->password = Hash::make($request->input('password'));
                }

                $user->name = $request->input('name');
                $user->email = $request->input('email');

                $user->save();
                return redirect(route('user.index'))->with('success','User updated successfully.');

        } catch (Exception $e){

            return redirect(route('user.index'))->with('error',$e->getMessage());

        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //if($request->ajax() ){

          //  $user->delete();

        $user = User::find($id);
        $user->delete();

        return response('ok',200);

       // }


    }
}
