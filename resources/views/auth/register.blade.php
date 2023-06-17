@include("layouts.auth-header")
<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="#"><img src="{{ asset('assets/images/jarvis-logo.png') }}" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
										<form method="POST" id="paymentForm" action="{{ route('register') }}">
            								@csrf
                                            <div class="mb-3" style="text-align: center;">
                                                <b>Member's Benefit</b>
                                                <ul>
                                                    <li>
                                                        Access to unlimited device registration
                                                    </li>
                                                    <li>
                                                        Unlimited access to manage registered device
                                                    </li>
                                                    <li>
                                                        Unlimited access to <i>Advance Search</i>
                                                    </li>
                                                    <li>
                                                        Missing device update notifications.
                                                    </li>
                                                </ul>
                                            </div>
            								@error('name')
                                                <div class="col-12 alert alert-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                            @error('email')
                                                <div class="col-12 alert alert-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                            @error('password')
                                                <div class="col-12 alert alert-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Name</strong></label>
                                                <input type="text" class="form-control" placeholder="Full Name" name="name" id="name" value="{{ old('name') }}" autofocus autocomplete="email" required>
                                            </div>
	                                        <div class="mb-3">
	                                            <label class="mb-1"><strong>Email</strong></label>
	                                            <input type="email" name="email" id="email" class="form-control" placeholder="hello@example.com" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >
	                                        </div>
	                                        <div class="mb-3">
	                                            <label class="mb-1"><strong>Password</strong></label>
	                                            <input type="password" name="password" class="form-control form-control-user  @error('password') is-invalid @enderror" id="password" placeholder="**********" required>
	                                        </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Confirm Password</strong></label>
                                                <input type="password" name="password_confirmation" class="form-control form-control-user  @error('password') is-invalid @enderror" id="password_confirmation" placeholder="**********" required>
                                            </div>
                                            <input type="hidden" name="amount" id="amount" value="1000">
                                            <input type="hidden" name="reference" id="reference" value="{{ date('Y').date('m').date('d').rand(0000, 9999).rand(0000, 9999) }}">
                                            <div class="mb-3">
                                                You are required to make a one time payment of &#8358;1,000.00 to register
                                            </div>
	                                        <div class="text-center mt-4">
	                                            <button type="submit" class="btn btn-primary btn-block" onclick="payWithPaystack()">Pay &#8358;1,000.00</button>
	                                        </div>
                                    </form>
                                    <div class="cnew-account col-12 mt-3">
                                    <div class="row">
									<div class=" col-6"><a href="{{ url('/') }}">Back to Basic Search</a></div>
                                    <div class="col-6" style="text-align: right;">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
                                    </div>
                                </div>
                                </div>
                                <script src="https://js.paystack.co/v1/inline.js"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    

    var paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener('submit', payWithPaystack, false);
    function payWithPaystack(event) {
        //alert("ok");
    event.preventDefault();
    var validRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var password_confirmation = document.getElementById('password_confirmation').value;

    //check if email address is already taken
    $.ajax({
        type: 'GET',
        url: 'checkemailexist/'+email,
        success: function(data){

            //if(data.message == "error"){

                globalThis.emailstatus = data.message;
                //alert(emailstatus)
            //}
        }
    });

    if(name == "" || email == "" || password == "" || password_confirmation == ""){

        Swal.fire("Error!", "Name, Email, Password and Confirm Password fields are required.", "error");

    }else if(password != password_confirmation){

        Swal.fire("Error!", "Password and Confirm Password do not match.", "error");

    }else if(password != password_confirmation){

        Swal.fire("Error!", "Password and Confirm Password do not match.", "error");

    }else if(emailstatus == "error"){
        
        Swal.fire("Error!", "Email Address Provided is Already in Use", "error");

    }else if(email.match(validRegex)){

        var handler = PaystackPop.setup({
        key: 'pk_test_f09e61af9e343b811368ee7c9b332e0558227ea8', // Replace with your public key
        email: document.getElementById('email').value,
        amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
        currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
        ref: document.getElementById('reference').value, // Replace with a reference you generated
        callback: function(response) {
          //this happens after the payment is completed successfully
          var reference = response.reference;
          Swal.fire("Success", "Payment completed successfully! Reference: " + reference, "success");

          //submit form
          document.getElementById("paymentForm").submit();

          // Make an AJAX call to your server with the reference to verify the transaction
        },
        onClose: function() {
          Swal.fire("Error!", "Transaction was not completed, please try again or use a different method.", "error");
        },
      });
      handler.openIframe();

    }else{

        Swal.fire("Error!", "Invalid email provided", "error");

    }
}
</script>
@include("layouts.auth-footer")