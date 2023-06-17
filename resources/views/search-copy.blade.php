<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
    	#advancesearch{
    		cursor: pointer;
    	}
    </style>
  </head>
  <body>
  	@include("layouts.app-title")
<!--**********************************
   Content body start
***********************************-->
<div class="content-body" style="margin-top: 0px; margin-left: 0px; background-image: url('assets/images/bgimages.jpeg'); background-size: cover; background-repeat: no-repeat;">
   <!-- row -->	
<div class="page-titles" style="padding-top: 10px;">
	<ol class="breadcrumb">
		<li><h5 class="bc-title"><img src="{{ asset('assets/images/jarvis-logo.png') }}" width="150px"></h5></li>
	</ol>
	<a href="{{ url('login') }}" class="btn btn-sm btn-secondary float-right">Login</a>
</div>
    <div class="s008">
      <form action="submitsearch" method="post" id="submitsearch">
      	@csrf
        <div class="inner-form">
          <div class="basic-search">
            <div class="input-field">
    				<h3 class="advance-search" style="color: #fff; padding: 20px;">Before you buy that device, search here for the status.</h3><br />
              <input id="search" type="text" placeholder="Serial No, IMEI, etc." />
              <div class="icon-wrap">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                  
                </svg>
              </div>
            </div>
          </div>
          <div class="advance-search">
            <span class="desc" id="advancesearch">Advanced Search</span>
            <div id="showadvance" style="display: none;">
            <div class="row">
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="choices-single-defaul" id="types">
                    <option placeholder="" value="">Category</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select" id="manudiv">
                  <select data-trigger="" name="choices-single-defaul" id="manufacturers">
                    <option placeholder="" value="">Manufacturer</option>
                    @include('gadgets.manufacturers')
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="choices-single-defaul">
                    <option placeholder="" value="">Year of Manufacture</option>
                    @for($i=date('Y')+1; $i >= 1990; $i--)
      							<option>{{ $i }}</option>
      							@endfor
                  </select>
                </div>
              </div>
            </div>
            <div class="row second">
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="choices-single-defaul">
                    <option placeholder="" value="">Device Status</option>
                    <option>THIS WEEK</option>
                    <option>SUBJECT B</option>
                    <option>SUBJECT C</option>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="choices-single-defaul">
                    <option placeholder="" value="">Device Status</option>
                    <option>THIS WEEK</option>
                    <option>SUBJECT B</option>
                    <option>SUBJECT C</option>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="choices-single-defaul">
                    <option placeholder="" value="">Registration Year</option>
                    <option>TYPE</option>
                    <option>SUBJECT B</option>
                    <option>SUBJECT C</option>
                  </select>
                </div>
              </div>
            </div>
         	</div>
            <div class="row third">
              <div class="input-field">
                <div class="result-count">
                  <span>0 </span>results</div>
                <div class="group-btn">
                  <button class="btn-delete" id="delete"></button>
                  <button class="btn-search">Search</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
 </div>
    <script src="{{ asset('assets/js/extention/choices.js') }}"></script>
    <script>
      const customSelects = document.querySelectorAll("select");
      const deleteBtn = document.getElementById('delete')
      const choices = new Choices('select',
      {
        searchEnabled: false,
        removeItemButton: true,
        itemSelectText: '',
      });
      for (let i = 0; i < customSelects.length; i++)
      {
        customSelects[i].addEventListener('addItem', function(event)
        {
          if (event.detail.value)
          {
            let parent = this.parentNode.parentNode
            parent.classList.add('valid')
            parent.classList.remove('invalid')
          }
          else
          {
            let parent = this.parentNode.parentNode
            parent.classList.add('invalid')
            parent.classList.remove('valid')
          }
        }, false);
      }
      deleteBtn.addEventListener("click", function(e)
      {
        e.preventDefault()
        const deleteAll = document.querySelectorAll('.choices__button')
        for (let i = 0; i < deleteAll.length; i++)
        {
          deleteAll[i].click();
        }
      });

      $("#advancesearch").click(function(){
      	$("#showadvance").toggle();
      });



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

    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>





