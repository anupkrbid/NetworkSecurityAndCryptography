@extends('layouts.app')

@section('content')

<div class="container">
    <header>
        <h1>Network Security <span>and Cryptography</span></h1>
		<nav class="codrops-demos">
			<span style="color: #7cbcd6;">
                <strong>Welcome Back, 
                    <span style="color: #0c5978;">
                        {{ Auth::user()->name }}
                    </span>
                </strong>
            </span>
            <a href="{{ route('client.get.profile') }}" class="current-demo">Profile<i class="fa fa-server fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
           {{--  <a href="{{ route('dealer.get.newClient') }}" class="current-demo">Client<i class="fa fa-user-plus fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.encrypt') }}">Encrypt<i class="fa fa-key fa-lg fa-flip-horizontal" aria-hidden="true" style="margin-left: 5px"></i></a> --}}
            <a href="{{ route('app.post.logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sign Out<i class="fa fa-sign-out fa-lg" aria-hidden="true" style="margin-left: 5px"></i>
            </a>
            <form id="logout-form" action="{{ route('app.post.logout') }}" method="POST" 
                style="display: none;">
                {{ csrf_field() }}
            </form>
		</nav>
    </header>
    <section>				
        <div id="container_demo" >
            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
            
            <div id="wrapper">
                @if ($user->isVerified == 0)   
                    <div id="verify">
                        <form  action="{{ route('client.post.verifyKey', ['id' => $user->id]) }}" method="post" autocomplete="on"> 
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            {{ method_field('patch') }}
                            <h1> Key Verification </h1> 
                            <p> 
                                <label for="passwordsignup" class="youpasswd" > Key </label>
                                <select id="x" disabled="disabled">
                                    <option value="{{ $functionValues->x }}">{{ $functionValues->x }}</option>
                                </select>
                                <label for="passwordsignup" class="youpasswd" > Value </label>
                                <select id="fx" disabled="disabled">
                                    <option value="{{ $functionValues->fx }}">{{ $functionValues->fx }}</option>
                                </select> 
                            </p>
                            <p> 
                                <label for="passwordsignup" class="youpasswd" > Available Public Keys </label>
                                
                                @foreach($encryptedCoefficients as $encryptedCoefficient)
                                    
                                    <select id="Ea{{ $encryptedCoefficient->a }}" disabled="disabled">
                                        <option value="{{ $encryptedCoefficient->Ea }}">{{ $encryptedCoefficient->Ea }}
                                        </option>
                                    </select>

                                @endforeach
                            </p>
                            <p class="signin button"> 
                                <input type="submit" value="Verify Key"/> 
                            </p>
                        </form>
                    </div>   
                @else
                    <div id="profile">
                        <form  action="{{ route('dealer.post.addClient') }}" method="post" autocomplete="on"> 
                            {{ csrf_field() }}
                            <h1> Add New Client </h1> 
                            <p> 
                                <label for="usernamesignup" class="uname" data-icon="u">Your Name</label>
                                <input id="usernamesignup" name="name" required="required" type="text" placeholder="eg. my secure name" />
                            </p>
                            <p> 
                                <label for="emailsignup" class="youmail" data-icon="e" > Your Email</label>
                                <input id="emailsignup" name="email" required="required" type="email" placeholder="eg. mysecuremail@mail.com"/> 
                            </p>
                            <p> 
                                <label for="passwordsignup" class="youpasswd" data-icon="p">Your Password </label>
                                <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                            </p>
                            <p> 
                                <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please Confirm Your Password </label>
                                <input id="passwordsignup_confirm" name="cnf_password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                            </p>
                            <p class="signin button"> 
                                <input type="submit" value="Register"/> 
                            </p>
                        </form>
                    </div> 
                @endif            
            </div>
        </div>  
    </section>
</div>
     
@endsection