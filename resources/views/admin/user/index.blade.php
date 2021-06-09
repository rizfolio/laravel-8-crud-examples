@extends('admin.layouts.master')

@section('content')
 

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTablexxx" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Post Count</th>
                            <th>Date Created</th>
                            <th>Date Modified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Post Count</th>
                            <th>Date Created</th>
                            <th>Date Modified</th>
                            <th>Action</th>
                        
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($users as $user)
                            
                      
                        <tr id="user_row_{{ $user->id }}">
                            
                            <td>{{ $user->id }}</td>
                            <td>
                                
                              @if ($user->picture )

                                <img src="{{ Storage::url($user->picture) }}" alt=""  width="50" />
                              
                              @endif

                            
                            </td>
                            <td>{{ $user->name }} </td>
                            <td>  </td>
                            <td> {{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td> 
                                
                                <a class="border-0 btn-transition btn btn-outline-primary" href="{{ route('user.edit',['user'=>$user->id]) }}"><i class="fa fa-pen-alt"></i></a>  
                                
                                <a class="border-0 btn-transition btn btn-outline-danger btn-delete-user" data-user-id="{{ $user->id }}" href="{{ route('user.destroy', ['user'=>$user->id]) }}"><i class="fa fa-trash-alt"></i></a>  
                                
{{-- 
                                {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to delete this?")', 'route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}

                                    {!! Form::hidden('id', $user->id, array('required'=>'required','placeholder' => '','class' => 'form-control')) !!}

                                     {!! Form::button('<i class="fa fa-trash-alt"></i>', [ 'type' => "submit" , 'class' => 'border-0 btn-transition btn btn-outline-danger' , 'data-toggle'=>"tooltip" ,'data-placement'=>"top" ,'title'=>"", 'data-original-title'=>"Delete User"]) !!}

                                {!! Form::close() !!} --}}

                               
                            
                            
                            </td>
                            
                        </tr>

                        @endforeach
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>

 
<div class=""> 

    {{ $users->links() }}

</div>

@endsection


@push('head')

    <!-- Custom styles for this page -->
   <link href="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush


@push('footer')

    <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>


     <!-- Page level custom scripts -->
     <script src="{{ asset('admin_assets/js/demo/datatables-demo.js') }}"></script>

@endpush



