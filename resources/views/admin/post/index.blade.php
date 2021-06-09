@extends('admin.layouts.master')

@section('content')
 

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Post List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date Created</th>
                            <th>Date Modified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date Created</th>
                            <th>Date Modified</th>
                            <th>Action</th>
                        
                        </tr>
                    </tfoot>
                    <tbody class="body_cont">

                        @foreach ($posts as $post)
                            
                      
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->id }} - {{ $post->user->name }} </td>
                            <td> {{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td> 
                                
                                <a class="border-0 btn-transition btn btn-outline-primary" href="{{ route('post.edit',['post'=>$post->id]) }}"><i class="fa fa-pen-alt"></i></a>  
                                

                                {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to delete this?")', 'route' => ['post.destroy', $post->id],'style'=>'display:inline']) !!}

                                    {!! Form::hidden('id', $post->id, array('required'=>'required','placeholder' => '','class' => 'form-control')) !!}

                                     {!! Form::button('<i class="fa fa-trash-alt"></i>', [ 'type' => "submit" , 'class' => 'border-0 btn-transition btn btn-outline-danger' , 'data-toggle'=>"tooltip" ,'data-placement'=>"top" ,'title'=>"", 'data-original-title'=>"Delete Post"]) !!}

                                {!! Form::close() !!}

                               
                            
                            
                            </td>
                            
                        </tr>

                        @endforeach
                      
                    </tbody>
                </table>

                <div class="pagination_wrapper">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
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

     <script>

        
        var ajaxPagination = (function(){

                'use strict';

                let _this = this;
                
                let tableBodyObj;
                let paginationWrapperObj;
                let paginationLinkObj;

                
                var methods = {};

               var init = function( options ){

                var defaultOptions =  { tableBody :'.data_tbody',  
                                        paginationWrapper :'.pagination_wrapper', 
                                        paginationLink   : '.pagination_link'
                                      }

                    options = {...defaultOptions, ...options};

                    //console.log(options);
                    let tableBodyObj =  document.querySelector(options.tableBody);

                    if(!tableBodyObj){
                        console.error(options.tableBody,' - unable to select data table or list wrapper');
                        return;
                    }

                    let paginationLinkObj =  document.querySelector(options.paginationLink);

                    if(!paginationLinkObj){
                        console.log(options.paginationLink,' - unable to select pagination links');
                    }

                    document.addEventListener('click', function (event) {

                        if (!event.target.matches(options.paginationLink)) return;

                        event.preventDefault();

                        let paginationHref = event.target.getAttribute('href');
                        if(!paginationHref){
                            return;
                        }
                        fetch(paginationHref, {
                            method: 'GET', // or 'PUT'
                            headers: {
                                'Content-Type': 'text/html',
                        }
                        })
                        .then(response => response.text())
                        .then(data => {

                           // console.log(options);
                            const parser = new DOMParser();
                            const body = parser.parseFromString(data, "text/html");
                            var tableBodyObj = body.querySelector(options.tableBody);
                            
                            document.querySelector(options.tableBody).innerHTML = tableBodyObj.innerHTML; 

                            var paginationWrapperObj = body.querySelector(options.paginationWrapper);
                            if(paginationWrapperObj)
                                document.querySelector(options.paginationWrapper).innerHTML = paginationWrapperObj.innerHTML;  

                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });

                    }, false);

                }

               return init;

        })();

        ajaxPagination({ tableBody:'.body_cont', paginationLink:'.page-link' });

     </script>
 

@endpush



