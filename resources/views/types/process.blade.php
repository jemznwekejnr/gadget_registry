<script>

$("#submittype").on('submit', function(event){
  event.preventDefault();
  
  $.ajax({
    type: 'POST',
    url: '/type/store',
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

      Swal.fire('Success!', 'Device Category Successfully Created.', 'success');
    
    	$("#results").html(data);
    }
      
      
    }
  });
});





$(".edittype").click(function(event){
	event.preventDefault();

	var type = $(this).attr('id');
	var typeid = $(this).attr('href');

	$("#type").val(type);
	$("#typeid").val(typeid);
	
});



$(".deletetype").click(function(event){

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
	        url: '/type/destroy/'+id,
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