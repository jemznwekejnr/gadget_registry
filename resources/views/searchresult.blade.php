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
    <div class="s007" style="margin-top: 0px; margin-left: 0px; background-image: url('assets/images/bgimages.jpeg'); background-size: cover; background-repeat: no-repeat; background-color: #000;">

      <div class="row">
        <!--Start-->
        <div class="col-xl-12 col-lg-12">
          <div class="card alert alert-info">
            <div class="card-header">
              <div class="col-xl-12">
              <div class="row">
                <div class="col-xl-10">
                  <h4 class="card-title" style="font-size: 24;">Retrieved Results</h4>
                </div>
                <div class="col-xl-2" style="text-align: right;">
                  <a href="{{ url('/') }}" class="btn btn-sm btn-secondary">New Search</a>
                </div>
              </div>
            </div>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="width: 1200px;">
                <table class="table-stripped table" id="example">
                  <thead>
                <tr>
                  <th>SN</th>
                  <th>Category</th>
                  <th>Manufacturer</th>
                  <th>Model</th>
                  <th>Year</th>
                  <th>IMEI 1</th>
                  <th>IMEI 2</th>
                  <th>Serial No</th>
                  <th>Purchase Date</th>
                  <th>Owner</th>
                  <th>Owner Email</th>
                  <th>Status</th>
                  <th>Created At</th>
                </tr>
              </thead>
              <tbody>
                @isset($gadgets)
                @php $x=1 @endphp
                @for($i=0; $i < count($gadgets); $i++)
                @foreach($gadgets[$i] as $gadget)
                <tr>
                  <td style="color: #000">{{ $x++ }}</td>
                  <td style="color: #000">{{ app\Http\Controllers\Controller::typename($gadget->type) }}</td>
                  <td style="color: #000">{{ app\Http\Controllers\Controller::manufacturername($gadget->manufacturer) }}</td>
                  <td style="color: #000">{{ $gadget->model }}</td>
                  <td style="color: #000">{{ $gadget->year }}</td>
                  <td style="color: #000">{{ $gadget->imei1 }}</td>
                  <td style="color: #000">{{ $gadget->imei2 }}</td>
                  <td style="color: #000">{{ $gadget->serialno }}</td>
                  <td style="color: #000">{{ $gadget->purchasedate }}</td>
                  <td style="color: #000">{{ app\Http\Controllers\Controller::username($gadget->owner) }}</td>
                  <td style="color: #000">{{ app\Http\Controllers\Controller::useremail($gadget->owner) }}</td>
                  <td>@if($gadget->status == 'In Use')
                          <button type="button" class="btn btn-success btn-round btn-sm" style="margin-top: 20px;">{{ $gadget->status }}</button>
                          @elseif($gadget->status == 'Sold')
                          <button type="button" class="btn btn-info btn-round btn-sm" style="margin-top: 20px;">{{ $gadget->status }}</button>
                          @elseif($gadget->status == 'Damaged')
                          <button type="button" class="btn btn-warning btn-round btn-sm" style="margin-top: 20px;">{{ $gadget->status }}</button>
                          @else
                          <button type="button" class="btn btn-danger btn-round btn-sm" style="margin-top: 20px;">{{ $gadget->status }}</button>
                          @endif
                  </td>
                  <td style="color: #000">{{ $gadget->created_at }}</td>
                </tr>
                @endforeach
                @endfor
                @endisset
              </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--End-->
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
     

      

    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
