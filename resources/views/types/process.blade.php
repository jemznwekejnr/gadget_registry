<script>

$("#submittype").on('submit', function(event){
  event.preventDefault();
  
  $.ajax({
    type: 'POST',
    url: 'type/store',
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

</script>