@extends('admin.layouts.master')

@section('content')

 

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Post</h6>
        </div>
        <div class="card-body">
          
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="p-5">
                   
                      
                            
                        {!! Form::model($post,array('class' => 'user', 'route' => ['post.update',$post->id],'method'=>'PATCH')) !!}

                            <div class="form-group row">
                                <div class="col-sm-8 mb-3  ">
                            
                                        <label for="title">Post Title</label>

                                         {!! Form::text('title', null, array('required'=>'required','placeholder' => 'Post Title','class' => 'form-control')) !!}   
                                </div>

                                <div class="col-sm-8 mb-3  ">
                               
                                    <label for="title">Author</label>

                                     {!! Form::select('user_id', $users,null, array('required'=>'required','class' => 'form-control')) !!}   

                            </div>

                            <div class="col-sm-8 mb-3  ">
    
                                <label for="title">Category</label>

                                 {!! Form::select('category_id[]', $categories,$selectedCategories, array( 'multiple' , 'required'=>'required','class' => 'form-control')) !!}   
                             </div>

                                <div class="col-sm-8 mb-3">
                                    <label for="excerpt"> Excerpt</label>
                                    {!! Form::textarea('excerpt', null, array('rows'=>'5', 'id'=>'excerpt', 'class' => 'form-control')) !!}
                                    
                                </div>

                                <div class="col-sm-8 mb-3 ">
                                    <label for="content">Content</label>
                                    {!! Form::textarea('content', null, array('rows'=>'10','id'=>'editor','class' => 'form-control')) !!}
                                    
                                </div>
                            </div>
                           
                           
                             <button type="submit" class="btn btn-primary btn-create"> Update Post</button>
                             <a class="btn btn-link  " href="{{ route('post.index') }}">Go Back to List</a>
                        
                     {!! Form::close() !!}
                       
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

 


@endsection




