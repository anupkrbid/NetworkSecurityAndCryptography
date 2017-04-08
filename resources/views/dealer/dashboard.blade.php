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
            <a href="{{ route('dealer.get.dashboard') }}" class="current-demo">Dashboard<i class="fa fa-server fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.newClient') }}">Client<i class="fa fa-user-plus fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.encrypt') }}">Encrypt<i class="fa fa-key fa-lg fa-flip-horizontal" aria-hidden="true" style="margin-left: 5px"></i></a>
            {{-- <a href="{{ route('app.post.logout') }}">Sign Out<i class="fa fa-sign-out fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a> --}}
            {{-- <a href="{{ route('app.post.logout') }}">Sign Out<i class="fa fa-sign-out fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a> --}}

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
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    <h1>Dealer Dashboard</h1> 
                    <p style="text-align: center;">
                        <strong style="font-size: 20px">Client Details</strong>
                    </p>

                    <table>
                        <thead>
                            <tr>
                                <th style="margin-left: 2px"><i><b>Name</b></i></th>
                                <th style="margin-left: 2px"><i><b>Email</b></i></th>
                                <th style="margin-left: 1px"><i><b>isValid Key</b></i></th>
                                <th style="margin-left: 2px"><i><b>Actions</b></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->isVerified }}</td>
                                    <td>
                                        <form method='post' action="{{ route('dealer.delete.deleteClient', ['id' => $user->id]) }}"  style="float: left; margin-right: 5px;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-xs" style="margin-left: 5px">
                                                <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                                 Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                    
                </div>
                <div id="register" class="animate form">
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
                </div>
				
            </div>
        </div>  
    </section>
</div>
     
@endsection