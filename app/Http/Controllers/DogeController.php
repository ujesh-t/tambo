<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use pta2002\DogecoinECDSA\DogecoinECDSA;

class DogeController extends Controller
{
    public function create(){
        $nonce = "Ujesh";
        $dogecoinECDSA = new DogecoinECDSA();
        $notFound = true;
        while($notFound) {
        $dogecoinECDSA->generateRandomPrivateKey($nonce);
        //$dogecoinECDSA->setPrivateKey("d1069a8b21885b72876ed78ffb3593736e6b59bd84adb1d4c1febfdbe583bdbb");
        
        $data['ADDRESS'] = $dogecoinECDSA->getUncompressedAddress();
        $data['WIF'] = $dogecoinECDSA->getWif();
        $data['PUB_KEY'] = $dogecoinECDSA->getPubKey();
        $data['PRI_KEY'] = $dogecoinECDSA->getPrivateKey();   
        
        if(preg_match('/.*RJ$/', $data['ADDRESS']))    
            $notFound = false;
            
        }
        return json_encode($data);
    }
}
