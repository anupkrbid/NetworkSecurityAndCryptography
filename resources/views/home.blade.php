
@extends('layouts.app')

@section('content')

<div class="container">
    <header>
        <h1>Network Security <span>and Cryptography</span></h1>
		<nav class="codrops-demos">
			{{-- <span>Click <strong>"Join us"</strong> to be our Client or <strong>"Go and log in"</strong> if you are already a Client!</span> --}}
            <span>If you think <strong>technology</strong> can solve your <strong>security problems</strong>, then you don’t understand the <strong>problems</strong> and you don’t understand the <strong>technology</strong></span>
            {{-- <a href="#tologin">Log in</a>
            <a href="#toregister">Sign up</a>
            <a href="#" class="current-demo">Dealer Dashboard</a> --}}
		</nav>
    </header>
    <section>				
        <div id="container_demo" >
            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    <form action="{{ route('app.post.login') }}" autocomplete="on" method="post">
                        {{csrf_field()}}
                        <h1>Log in</h1> 
                        <p> 
                            <label for="username" class="uname" data-icon="u" > Your Email </label>
                            <input id="username" name="username" required="required" type="text" placeholder="eg. mysecuremail@mail.com"/>
                        </p>
                        <p> 
                            <label for="password" class="youpasswd" data-icon="p"> Your Password </label>
                            <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                        </p>
            {{--            <p class="keeplogin"> 
							<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
							<label for="loginkeeping">Keep me logged in</label>
						</p> --}}
                        <p class="login button"> 
                            <input type="submit" value="Login" /> 
						</p>
                      {{--   <p class="change_link">
							<strong>Not a Member Yet ?</strong>
							<a href="#toregister" class="to_register">Join us</a>
						</p> --}}
                    </form>
                </div>

             {{--    <div id="register" class="animate form">
                    <form  action="#" autocomplete="on"> 
                        <h1> Sign up </h1> 
                        <p> 
                            <label for="usernamesignup" class="uname" data-icon="u">Your Name</label>
                            <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="eg. my secure name" />
                        </p>
                        <p> 
                            <label for="emailsignup" class="youmail" data-icon="e" > Your Email</label>
                            <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="eg. mysecuremail@mail.com"/> 
                        </p>
                        <p> 
                            <label for="passwordsignup" class="youpasswd" data-icon="p">Your Password </label>
                            <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                        </p>
                        <p> 
                            <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please Confirm Your Password </label>
                            <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                        </p>
                        <p> 
                            <label for="passwordsignup" class="youpasswd" data-icon="p">Your Invite Code </label>
                            <input id="passwordsignup" name="passwordsignup" required="required" type="text" placeholder="eg. Y8fh8126"/>
                        </p>
                        <p class="signin button"> 
							<input type="submit" value="Sign up"/> 
						</p>
                        <p class="change_link">  
							<strong>Already a Member ?</strong>
							<a href="#tologin" class="to_register"> Go and log in </a>
						</p>
                    </form>
                </div> --}}
				
            </div>
        </div>  
    </section>
</div>

@endsection