$(document).ready(function () {
    
    var i,k=3,n=5;
    var g = $('#g').val();
    var x = $('#x').val();
    
    $('#btn_encrypt').click(function () {
        var Polynomial = []; // Polynomial // f(x) = 4 + 5x + 7x^2
        var FunctionValue = []; // Function Values // 
        var EncryptedCoefficient = []; // Encripted Polynomials // Encript[Polynomial]
        
        Polynomial.push($('#a0').val());
        Polynomial.push($('#a1').val());
        Polynomial.push($('#a2').val());

        for(i=0;i<=k;i++){
            FunctionValue[i]=(Polynomial[0])+(Polynomial[1]*i)+(Polynomial[2]*i*i);
        }

        for(i=0;i<k;i++){
            EncryptedCoefficient[i] = Encrypt(Polynomial[i], g, x); 
        }

        console.log(Polynomial);
        console.log(FunctionValue);
        console.log(EncryptedCoefficient);

        $.ajax({
            type : "post",
            url : "{{ route('dealer.post.encryptKey') }}",
            data : {
                _token : "{{ csrf_token() }}",
                Polynomial : Polynomial,
                FunctionValue : FunctionValue,
                EncryptedCoefficient : EncryptedCoefficient,
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

