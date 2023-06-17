<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    @isset(Auth::user()->id)
    <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ url('dashboards') }}" class="btn btn-sm btn-secondary float-right">Dashboard</a>
            <a class="btn btn-sm btn-danger float-right" href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>            
                <span class="ms-2">Logout </span>
            </a>
    </form>
    @else
    <a href="{{ url('login') }}" class="btn btn-sm btn-secondary float-right">Login</a>
    @endif
	</div>
    <div class="s007" style="margin-top: 0px; margin-left: 0px; background-image: url('assets/images/bgimages.jpeg'); background-size: cover; background-repeat: no-repeat;">
      <form method="POST" action="submitsearch" id="submitsearch">
        @csrf
        <div class="inner-form">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Basic Search</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Advance Search</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="basic-search">
            <div class="input-field">
              <input id="search" name="searchtextbasic" type="text" placeholder="Search by IMEI, Serial No, VIN, etc..." />
              <div class="result-count">
                <div class="icon-wrap">
                <button type="submit" style="background-color: transparent; border: none;">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                  <path d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"></path>
                </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="basic-search">
            <div class="input-field">
              <div class="icon-wrap">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                  <path d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"></path>
                </svg>
              </div>
              <input id="search" name="searchtextadvance" type="text" placeholder="Search by IMEI, Serial No, VIN, etc..." @isset(Auth::user()->id) @else readonly @endisset />
              <div class="result-count">
                <!--<span>108 </span>results</div>-->
            </div>
          </div>
        </div>
    <div class="advance-search">
            <!--<span class="desc" id="advancesearch">Advanced Search</span>-->
            @isset(Auth::user()->id)
            <div id="showadvance">
            <div class="row">
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" id="types" name="types">
                    <option placeholder="" value="">Category</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="manufacturer">
                    <option placeholder="" value="">Manufacturer</option>
                    @include('gadgets.manufacturers')
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="manufactureyear">
                    <option placeholder="" value="">Year of Manufacture</option>
                     @for($i=date('Y')+1; $i >= 2000; $i--)
                        <option>{{ $i }}</option>
                      @endfor
                  </select>
                </div>
              </div>
            </div>
            <div class="row second">
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" id="models" name="model">
                    <option placeholder="" value="">Model</option>
                    @include('gadgets.models')
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="status">
                    <option placeholder="" value="">Status</option>
                      <option>In Use</option>
                      <option>Sold</option>
                      <option>Damaged</option>
                      <option>Misplaced</option>
                      <option>Stolen</option>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="registeryear">
                    <option placeholder="" value="">Registration Year</option>
                     @for($i=date('Y')+1; $i >= 2020; $i--)
                <option>{{ $i }}</option>
                @endfor
                  </select>
                </div>
              </div>
            </div>

            <div class="row third">
              <div class="input-field">
                <button class="btn-search" type="submit">Search</button>
                <!--<button class="btn-delete" id="delete">Delete</button>-->
              </div>
            </div>
          </div>
          @else
          <h3>Login Access Required !!!</h3>
          <h5>Click <a href="{{ url('login') }}">here</a> to login</h5>
          @endisset
          </div>
  </div>
</div>
          
          
      </form>
    </div>
 	</div>
    <script src="{{ asset('assets/js/extention/choices.js') }}"></script>
    <script>
      const customSelects = document.querySelectorAll("select");
      const deleteBtn = document.getElementById('delete');
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
      /*deleteBtn.addEventListener("click", function(e)
      {
        e.preventDefault();
        const deleteAll = document.querySelectorAll('.choices__button');
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

      $("#types").change(function(){
      		var id = $("#types").val();
      		alert(id);
      		$.ajax({
      	        type: 'GET',
      	        url: '/gadgets/fetchmodel/'+id,
      	        success: function(data){
      	        	$("#models").find('option').remove().end().append('<option value="" selected disabled>Select Manufacturer</option>').append(data);
      	        }
      	      });
      	});*/


      $("#profile-tab").click(function(){
        $("#home-tab").removeClass("active");
        $("#home").removeClass("show");
        $("#home").removeClass("active");

        $("#profile-tab").addClass("active");
        $("#profile").addClass("show");
        $("#profile").addClass("active");
      });


      $("#home-tab").click(function(){
        $("#profile-tab").removeClass("active");
        $("#profile").removeClass("show");
        $("#profile").removeClass("active");

        $("#home-tab").addClass("active");
        $("#home").addClass("show");
        $("#home").addClass("active");
      });

      

    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
