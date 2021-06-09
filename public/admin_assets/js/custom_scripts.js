 

jQuery(document).ready(function($){


            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

          
            
        $('.btn-delete-user').click(function(e){

            e.preventDefault();

            var user_id = $(this).data('user-id');
            var user_url = $(this).attr('href');
            var user_row = '#user_row_'+user_id;
 
             
            if(confirm('Are you sure you want to delete?')){


                $.ajax({
                    type: 'DELETE',
                    url: user_url,
                    data: {   id:user_id   },
                    success:function(data){
                       $(user_row).fadeOut('slow');
                    }
    
                });x


            }

           


        });

    });