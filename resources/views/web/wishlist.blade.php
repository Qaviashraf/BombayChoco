@extends('web.master')
@section('content')
    <section class="wishlist account">

        <div class="row">
            <div class="col-lg-6">
                <h3>CUSTOMER LOGIN</h3>
                <h4>REGISTERED CUSTOMERS</h4>
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{route('web.login')}}" method="POST">
                    @csrf
                    <label for="uname"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit" class="theme-btn login-but">Login</button>
                    {{-- <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label> --}}
                    <div>
                        {{-- <button type="submit" class="theme-btn cancel-but">Cancel</button> --}}
                        {{-- <span class="psw">Forgot <a href="#">password?</a></span> --}}
                    </div>
                </form>
            </div>
            <div class="col-lg-6 new-inn">
                <h3>New Customers</h3>
                <div class="new-customers">
                    <p>Creating an account has many benefits: check out faster, keep more than one address, track orders and
                        more.</p>
                    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign
                        Up</button>
                    
                    <div id="id01" class="modal great">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close"
                            title="Close Modal">&times;</span>
                        <form action="{{ route('custom.register') }}" method="POST" class="modal-content">
                            @csrf
                                <h1>Sign Up</h1>
                                <p>Please fill in this form to create an account.</p>
                                <hr>
                                <label for="email"><b>Name</b></label>
                                <input type="text" placeholder="Enter Name" name="name" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="email"><b>Email</b></label>
                                <input type="text" placeholder="Enter Email" name="email" required>

                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" min="8" name="password" required>

                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms
                                        & Privacy</a>.</p>

                                <div class="clearfix">
                                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                                        class="cancelbtn">Cancel</button>
                                    <button type="submit" class="signupbtn theme-btn">Sign Up</button>
                                </div>
                        </form>
                    </div>

                    <script>
                        // Get the modal
                        var modal = document.getElementById('id01');

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                        }
                    </script>

                </div>
            </div>


        </div>
    </section>
@endsection
@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection