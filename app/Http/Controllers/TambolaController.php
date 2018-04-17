<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TambolaController extends Controller
{
    public function gamepage(){
        return view('game');
    }
    
    public function game(){

        $now = new \DateTime();

        //echo $now;
        //date_default_timezone_set('Asia/Kolkata');
        $gameFile = $now->format('YmdH');
        $gameData = $now->format('YmdH').'GD';
        $tambolaChart = null;
        $timeStamp = \DateTime::createFromFormat('YmdH', $now->format('YmdH'));
        $t = \DateTime::createFromFormat('YmdHis', $now->format('YmdHis'));
        //print_r($t);

        $numList = array();

        $winningNumbers = array();

        if(!Storage::disk('local')->exists('GameData/'.$gameData)) {
            $numList = range(1,90);
            shuffle($numList);
            //print_r($numList);

            //$objData = serialize($numList);
            //$fp = fopen($gameFile, "w");
            //fwrite($fp, $objData);
            //fclose($fp);    

            foreach($numList as $randNum){
                $tambolaChart[$timeStamp->format('YmdHis')]=$randNum;
                $timeStamp->add(\DateInterval::createFromDateString('10 seconds'));
            }

            $objData = serialize($tambolaChart);
            //$fp = fopen($gameData, "w");
            //fwrite($fp, $objData);
            //fclose($fp);    
            Storage::disk('local')->put('GameData/'.$gameData, $objData);

        } else {
            //$fp = fopen($gameFile, "r");
            $numList = Storage::disk('local')->get('GameData/'.$gameData);
            $numList = unserialize($numList);   
            $t = \DateTime::createFromFormat('YmdHis', $now->format('YmdHis'));
            $t->sub(\DateInterval::createFromDateString('50 minutes'));
            $t = $t->format('YmdHis');

            foreach($numList as $key => $value){
                if($key < $t)
                    $winningNumbers[$key] = $value;
            }


        }
        return json_encode($winningNumbers);
    }
}
