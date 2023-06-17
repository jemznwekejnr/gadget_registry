<script>

$("#submitmanufacturer").on('submit', function(event){
  event.preventDefault();
  
  $.ajax({
    type: 'POST',
    url: '/manufacturer/store',
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
            $("#button").hide();
            $("#processing").show();
        },
    success: function(data){
    if(data.message == 'error'){
      $("#button").show();
      $("#processing").hide();
      
    	Swal.fire('Error!', data.info, 'error');
    }else{
      $("#button").show();
      $("#processing").hide();

      Swal.fire('Success!', 'Device Manufacturer Successfully Created.', 'success');
    
    	$("#results").html(data);
    }
      
      
    }
  });
});





$(".editmanufacturer").click(function(event){
	event.preventDefault();

	var type = $(this).attr('id');
	var manufacturer = $(this).attr('title');
	var manufacturerid = $(this).attr('href');

	$("#type").val(type);
	$("#manufacturer").val(manufacturer);
	$("#manufacturerid").val(manufacturerid);
	
});



$(".deletemanufacturer").click(function(event){

		event.preventDefault();
		
		var id = $(this).attr("href");

		Swal.fire({
		  title: 'Are you sure?',
		  text: "Are you sure you want to delete this category? this action can not be reversed!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.isConfirmed) {

		  	$.ajax({
	        type: 'GET',
	        url: '/manufacturer/destroy/'+id,
	        beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
	        success: function(data){

	        if(data.message == 'error'){

	        	Swal.fire("Error!", data.info, "error");
	        	
	        }else{
	        	
	        	$("#button").show();
			      $("#processing").hide();

			      Swal.fire('Success!', 'Device Category Successfully Deleted.', 'success');
			    
			    	$("#results").html(data);
	        }
	          
              $("#button").show();
              $("#processing").hide();
	        }
	      });
		  }
		})

	});



</script>