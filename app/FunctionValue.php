<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EncryptedCoefficient;

class FunctionValue extends Model
{

	public static function verify($id)
	{		
    	$functionValue = FunctionValue::find($id)->first();
    	$x = $functionValue->x;
    	$fx = $functionValue->fx;
    	$base = $functionValue->base;
    	$modulus = $functionValue->modulus;

		$val1 = FunctionValue::EncryptFunctionValue($x, $modulus); //E(a0) * (E(a1)^i) * (E(a2)^(i*i))
		$val2 = FunctionValue::Encrypt($fx, $base, $modulus); //E(f(x))
		if($val1==$val2)
			return true;
		else
			return false;
	}
	

	public static function EncryptFunctionValue($x, $modulus)
	{
		$encryptedCoefficients = EncryptedCoefficient::all();
		$Ea=array();

		$i = 0;
		foreach ($encryptedCoefficients as $encryptedCoefficient) {
			$Ea[$i++] = $encryptedCoefficient->Ea;
		}
		$val =($Ea[0] * (pow($Ea[1],$x)) * (pow($Ea[2],$x*$x))) % $modulus;
		return $val;
	}


    public static function Encrypt($exponent, $base, $modulus) {
        $result = 1;
        while ($exponent > 0) {
            if ($exponent % 2 == 1)
                $result = ($result * $base) % $modulus;
            $exponent = $exponent >> 1;
            $base = ($base * $base) % $modulus;
        };
        return $result;
    }


    public static function decrypt($x0Id, $x1Id, $x2Id)
	{		
    	$x0 = FunctionValue::find($x0Id);
    	$x1 = FunctionValue::find($x1Id);
    	$x2 = FunctionValue::find($x2Id);

    	$lagr=array();


    	$lagr[0]=(($x1->x)*($x2->x))/((($x0->x)-($x1->x))*(($x0->x)-($x2->x)));
    	$lagr[1]=(($x0->x)*($x2->x))/((($x1->x)-($x0->x))*(($x1->x)-($x2->x)));
    	$lagr[2]=(($x0->x)*($x1->x))/((($x2->x)-($x0->x))*(($x2->x)-($x1->x)));

		$val = ($lagr[0]*($x0->fx))+($lagr[1]*($x1->fx))+($lagr[2]*($x2->fx));
		return $val;
	}

}