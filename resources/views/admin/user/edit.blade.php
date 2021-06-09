@extends('admin.layouts.master')

@section('content')

 

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New User</h6>
        </div>
        <div class="card-body">
          
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="p-5">
                   
                      
                            
                        {!! Form::model($user,array('class' => 'user', 'route' => ['user.update',$user->id],'method'=>'PATCH','enctype'=>'multipart/form-data')) !!}

                            <div class="form-group row">
                                <div class="col-sm-8 mb-3  ">
                               
                                    <label for="title">User Name</label>

                                     {!! Form::text('name', null, array('required'=>'required','placeholder' => 'Full name','class' => 'form-control')) !!}   

                            </div>

                            <div class="col-sm-8 mb-3  ">
                           
                                <label for="title">Email</label>

                                 {!! Form::text('email', null, array('required'=>'required','placeholder' => 'Email Address','class' => 'form-control')) !!}   

                        </div>

                        <div class="col-sm-8 mb-3  ">
                           
                            <label for="title">Password</label>

                             {!! Form::password('password', array('class' => 'form-control')) !!}   

                    </div>

                    <div class="col-sm-8 mb-3  ">
                               
                        <label for="title">Picture</label>

                         {!! Form::file('picture', array('class' => 'form-control')) !!}   

                    </div>

                              
                            </div>
                           
                           
                             <button type="submit" class="btn btn-primary btn-create"> Update User</button>
                             <a class="btn btn-link  " href="{{ route('user.index') }}">Go Back to List</a>
                        
                     {!! Form::close() !!}
                       
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

 


@endsection




