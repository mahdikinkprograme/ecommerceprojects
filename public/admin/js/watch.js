
    $(document).on('click','.chang',function(){
        if($(this).hasClass('changqty')){
            var plusval = $(this).data('cardqty');
            plusval = parseInt(plusval) + 1;

        }

        if($(this).hasClass('changqtys')){
            var plusval = $(this).data('cardqty');
            plusval = parseInt(plusval)-1;
        }
        var prod_ids = $(this).parent('#alldel').find('.proid');
        var price_ids = $(this).parent('#alldel').find('.prices');
        console.log(plusval,prod_ids);
        $.ajax({
            method: 'PATCH',
            url : '/updatecart',  
            data: { plusval : plusval ,prod_ids : prod_ids, price_ids : price_ids},  
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                   $('#alldel').html(response.view);

              },
          });
       });

       $(document).on('click','#delcart',function(e){
        e.preventDefault()
         var prod_id = $(this).data('cart'); 
        
                console.log(prod_id);
                 $.ajax({
                     method: 'DELETE',
                     url : "/prods-delcart",  
                     data: {prod_id: prod_id,},
                     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                     success: function (data) {
                            $('#alldel').remove(); 
                            //$('#alldel').html(data.statuse);
                     },
                 })
             })
         
