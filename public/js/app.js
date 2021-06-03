$(document).ready(function(){
var pedidos_id = 0;

    /****Update****/
    
//opening the modal
$('.open-modal').click(function(){
        //getting the car id through edit button value attribute
        pedidos_id= $(this).val();
        
        //setting the data from the response to modal form fields
        $.get('edit'+'/'+pedidos_id , function(data){
        $('.update').text('Save Changes');
        $('#nro_orden').val(data.nro_orden);
        $('#sub_total').val(data.sub_total);
        $('#estado').val(data.nombre);
        $('#frmModificarPedido').modal('show');
        });


});
    
//editing the data via ajax
$('.update').click(function(){


        $.ajax({
        method : 'POST' , 
        url : urlEdit  ,
        //data passed to the function    
        data:{nro_orden: $('#nro_orden').val() , pedidoid :pedidos_id , sub_total: $('#sub_total').val(), estado: $('#estado').val(), _token : token}
        }).done(function(msg){
         //updating the table   
        $('#pedido_nro_orden'+pedidos_id).text(msg['new_orden']);
        $('#pedido_sub_total'+pedidos_id).text(msg['new_subtotal']);
        $('#pedido_estado'+pedidos_id).text(msg['new_estado']);
        $('#frmModificarPedido').modal('hide');
        //reset form inputs    
        $('#frmModificarPedido').find("input[type=text], input[type=number]").val("");
        });


});

        /*******Insert*******/
    
//Opening the modal
$('.add-modal').click(function(){

        $('#frmModificarPedido').modal('show');


});
    
//addign the data    
$('.add').click(function(e){
        e.preventDefault(); 
        $.ajax({
        method : 'POST' , 
        url : urlAdd , 
        data:{
        brand : $('#brand').val(),
        model : $('#model').val(),
        year : $('#year').val(),
        _token : token
        }
        }).done(function(msg){
            //adding the new record  dynamically 
        $("table" ).append("<tr id="+msg['new_id']+">\n\
        <td id='carBrand"+msg['new_id']+"'>"+msg['new_brand']+"</td>\n\
        <td id='carModel"+msg['new_id']+"'>"+msg['new_model']+"</td>\n\
        <td id='carYear"+msg['new_id']+"'>"+msg['new_year']+"</td>\n\
        <td><button data-toggle='modal' data-target='#myModal' class='btn btn-xs btn-primary open-modal' value="+msg['new_id']+"><i class='glyphicon glyphicon-edit'></i> Edit</button></td>\n\
        <td><button class='btn btn-xs btn-danger delete' value="+msg['new_id']+"><i class='glyphicon glyphicon-trash'></i>Delete</button></td></tr>");
        });
    
        $('#myModal').modal('hide');      
        setTimeout(function(){// wait for 5 secs(2)
        location.reload(); // then reload the page.(3)
        }, 500);


});

    /*****Delete*****/
    
    
$('.delete').click(function(){
    //getting car id through delete button value attribute
        pedidos_id= $(this).val();
    //dialog box with confirm message ,along with an OK and a Cancel button
        var x = confirm("Are you sure you want to delete?");

    //OK
        if(x)
        {   
        $.ajax({
        method : 'POST' , 
        url : 'delete'+'/'+pedidos_id  , 
        data:{ _token : token}
        }).done(function(msg){
        $('#'+pedidos_id).hide();
        });
        }
});
    
    /***close**/
$('.close-modal').click(function(){
        $('#myModal').modal('hide');
        $('#myModal').find("input[type=text], input[type=number]").val("");
});


});
