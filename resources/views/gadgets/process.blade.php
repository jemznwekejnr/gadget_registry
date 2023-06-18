<script>

	$("#types").change(function(){
		var id = $("#types").val();
		$.ajax({
	        type: 'GET',
	        url: '/gadgets/fetchmanufacturers/'+id,
	        success: function(data){

	        	$("#manufacturers").find('option').remove().end().append('<option value="" selected disabled>Select Manufacturer</option>').append(data);
	        }
	      });
	});



	$("#submitgadget").on('submit', function(event){
	  event.preventDefault();
	  
	  $.ajax({
	    type: 'POST',
	    url: '/gadgets/store',
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

	      Swal.fire('Success!', data.info, 'success');

	      setTimeout(function() {
            location.href = '/';
        }, 3000);
	      
	    
	    }
	      
	      
	    }
	  });
	});


	$("#updategadget").on('submit', function(event){
	  event.preventDefault();
	  
	  $.ajax({
	    type: 'POST',
	    url: '/gadgets/update',
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

	      Swal.fire('Success!', data.info, 'success');
	    
	    }
	      
	      
	    }
	  });
	});



	$("#deletegadget").click(function(event){

		event.preventDefault();
		
		var id = $(this).attr("href");

		Swal.fire({
		  title: 'Are you sure?',
		  text: "Are you sure you want to delete this device? this action can not be reversed!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.isConfirmed) {

		  	$.ajax({
	        type: 'GET',
	        url: '/gadgets/destroy/'+id,
	        beforeSend:function(){
	                $("#deletegadget").hide();
	                $("#processing").show();
	            },
	        success: function(data){

	        if(data.message == 'error'){

	        	Swal.fire("Error!", data.info, "error");
	        	
	        }else{
	        	
	        	$("#deletegadget").show();
			      $("#processing").hide();

			      Swal.fire('Success!', 'Device Successfully Deleted.', 'success');
			    
			    	setTimeout(function() {
				    window.location = '/gadgets';
				}, 3000);
	        }
	          
              $("#deletegadget").show();
              $("#processing").hide();
	        }
	      });
		  }
		})

	});

	

</script>