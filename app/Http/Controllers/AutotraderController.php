<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class AutotraderController extends Controller
{
    
    public function ytn(){
        $trading_api_url = "https://api.crex24.com/CryptoExchangeService/BotTrade/";
        $api_key = "bd63a2bc-3d46-4744-b648-4296dae567d8";
        $private_api_key = "v+IGTIzmasTKBq9CPgIAJIQtcqqF2PXlCg90jEQlq4ryyVH1FfVu4dag18cxLsQN6W9n4wKYR3pXQIttQF17uA==";
        $currentNonce = 0;

        $btcBalance = 0;
        $btcInOrder = 0;
        $ytnBalance = 0;
        $ytnInOrder = 0;

        $sellPrice = 0.00000209;
        $buyPrice  = 0.00000186;

        $requestParams = array(
            "Names" => array("BTC","YTN"),
            "NeedNull" => true,
        );

        $result = sendRequest("ReturnBalances", $requestParams);
        echo ("ReturnBalances result: ");

        print_r($result['Balances']);
        echo "<br/>";

        foreach($result['Balances'] as $coind) {
            if($coind['Name'] == 'BTC') {
               $btcBalance = $coind['AvailableBalances']; 
               $btcInOrder = $coind['InOrderBalances'];
            } else if ($coind['Name'] == 'YTN'){
               $ytnBalance = $coind['AvailableBalances']; 
               $ytnInOrder = $coind['InOrderBalances'];
            }
        }

        $requestParams = array(
            "Pairs" => array("BTC_LTC", "BTC_YTN"),
        );
        $result = sendRequest("ReturnOpenOrders", $requestParams);

        // No Existing Order
        if(count($result['Orders']) == 0) {
            if($ytnBalance > 15) {
                //SELL
                $requestParams = array(
                    "Pair" => "BTC_YTN",
                    "Course" => $sellPrice,
                    "Volume" => $ytnBalance
                );
                $result = sendRequest("Sell", $requestParams);
            } else {
                // BUY
                $requestParams = array(
                    "Pair" => "BTC_YTN",
                    "Course" => $buyPrice,
                    "Volume" => 32.60
                );
            }
        }
    }
    
    // for windows systems you probably need to uncomment php_openssl.dll extension line in php.ini
// for unix systems check is openssl installed
//
// this function returns associative array or null
function sendRequest($apiMethod, $requestParams)
{
    global $trading_api_url;
    global $api_key;

    $requestParams["Nonce"] = getCurrentNonce();

    // don't change params after this line
    $requestPayloadStr = json_encode($requestParams);
    // generate sign for
    $sign = createSign($requestPayloadStr);

    $reqOptions = array(
        "http" => array(
            "header" => "Content-Type: application/json\r\n" .
            "Sign:" . $sign . "\r\n" .
            "UserKey:" . $api_key . "\r\n",
            "method" => "POST",
            "content" => $requestPayloadStr,
        ),
    );

    $context = stream_context_create($reqOptions);
    $result = file_get_contents($trading_api_url . $apiMethod, false, $context);

    if ($result === false) {
        return null;
    }
    return json_decode($result, true);
}

function createSign($message)
{
    global $private_api_key;

    $decodedPk = base64_decode($private_api_key);
    $rawHash = hash_hmac("sha512", $message, $decodedPk, true); // set param raw_output for hash_hmac function always TRUE
    $base64EncodedHash = base64_encode($rawHash);

    return $base64EncodedHash;
}

function getCurrentNonce()
{
    global $currentNonce;

    $newNonce = round(microtime(true) * 1000);
    if ($newNonce > $currentNonce) {
        $currentNonce = $newNonce;
    } else {
        $currentNonce += 1;
    }
    return $currentNonce;
}
}
