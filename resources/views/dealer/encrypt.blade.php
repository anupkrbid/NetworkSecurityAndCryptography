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
            <a href="{{ route('dealer.get.dashboard') }}">Dashboard<i class="fa fa-server fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.newClient') }}">Client<i class="fa fa-user-plus fa-lg" aria-hidden="true" style="margin-left: 5px"></i></a>
            <a href="{{ route('dealer.get.encrypt') }}" class="current-demo">Encrypt<i class="fa fa-key fa-lg fa-flip-horizontal" aria-hidden="true" style="margin-left: 5px"></i></a>
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
            <div id="wrapper">
                <div id="client">
                        {{ csrf_field() }}
                        <h1> Encrypt Key </h1> 
                        <input id="max" type="hidden" data-id="{{ $maxid }}">
                        <p> 
                            <label for="passwordsignup" class="youpasswd">Your Secret Key </label>
                            <select id="a0">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option selected="selected" value="4">4</option>
                            </select> 
                        </p>
                        <p> 
                            <label for="passwordsignup" class="youpasswd" >Choose Two More Fake Keys </label>
                            <select id="a1">
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <select id="a2">
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select> 
                        </p>
                        <p> 
                            <label for="passwordsignup" class="youpasswd">Your Base Key </label>
                            <select id="g" disabled="true">
                                <option selected="selected" value="5">5</option>
                            </select> 
                        </p>
                        <p> 
                            <label for="passwordsignup" class="youpasswd">Your Modulus Key </label>
                            <select id="x">
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option selected="selected" value="17">17</option>
                            </select> 
                        </p>
                        <p class="signin button"> 
                            <input id="btn_encrypt" type="button" value="Encrypt Key"/> 
                        </p>
                </div>             
            </div>
        </div>  
    </section>
</div>

     
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function () {
    
    var i,k=3,n=5;
    var g = $('#g').val();
    var x = $('#x').val();
    var maxId = $('#max').data('id');;
    
    $('#btn_encrypt').click(function () {
        var Polynomial = []; // Polynomial // f(x) = 4 + 5x + 7x^2
        var FunctionValue = []; // Function Values // 
        var EncryptedCoefficient = []; // Encripted Polynomials // Encript[Polynomial]
        
        Polynomial.push($('#a0').val());
        Polynomial.push($('#a1').val());
        Polynomial.push($('#a2').val());

        for(i=0; i<=maxId; i++){
            FunctionValue[i]=(Polynomial[0])+(Polynomial[1]*i)+(Polynomial[2]*i*i);
        }

        for(i=0; i<k; i++){
            EncryptedCoefficient[i] = Encrypt(Polynomial[i], g, x); 
        }

        // console.log(Polynomial);
        // console.log(FunctionValue);
        // console.log(EncryptedCoefficient);
        // console.log(x);
        // console.log(g);

        $.ajax({
            type : "post",
            url : "{{ route('dealer.post.encryptKey') }}",
            data : {
                _token : "{{ csrf_token() }}",
            //    Polynomial : Polynomial,
                FunctionValue : FunctionValue,
                EncryptedCoefficient : EncryptedCoefficient,
                Modulus : x,
                Base : g,
            },
            success: function(response) {
                if (response.isMatched == true) {
                    swal('success', "Working" ,'success');
                } else {
                    swal('error', response.error ,'error');
                }
            }
        });
    });
    
    Encrypt = function (exponent, base, modulus) {
        var result = 1;
        while ((exponent > 0)) {
            if (exponent % 2 === 1)
                result = (result * base) % modulus;
            exponent = exponent >> 1;
            base = (base * base) % modulus;
        };
        return result;
    };
});


</script>



@endsection