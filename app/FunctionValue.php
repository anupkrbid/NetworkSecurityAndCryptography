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

		$val1 = FunctionValue::EncryptFunctionValue($x, $modulus);	  //E(a0) * (E(a1)^i) * (E(a2)^(i*i))	
		$val2 = FunctionValue::Encrypt($fx, $base, $modulus);           //E(f(x))
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

}