<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\ Http\ Request;
use App\ Http\ Requests;
use Log;


class testController extends Controller
{

    public function crosser(Request $request)

    {

    	//api limits no deja usar
    	//$url = 'https://www.zipcodeapi.com/rest/KQS71mjIPQHvNzoqjK5WPYq8KcgzB6ElWxtXTNGIDndrWBRgmXcbWDkGQBfrHUND/radius.json/85716/600/km';

    	//$data = file_get_contents($url);


    	// json format
    	$clist = '[ { "name": "Michael", "zipcode": 85273 }, { "name": "James", "zipcode": 85750 }, { "name": "Brian", "zipcode": 85751 }, { "name": "Nicholas", "zipcode": 85383 }, { "name": "Jennifer", "zipcode": 85716 }, { "name": "Christopher", "zipcode": 85014 }, { "name": "Michael", "zipcode": 85751 }, { "name": "Patricia", "zipcode": 95032 }, { "name": "Beth", "zipcode": 94556 }, { "name": "Cathy", "zipcode": 92260 }, { "name": "Harold", "zipcode": 92120 }, { "name": "Robin", "zipcode": 94062 }, { "name": "James", "zipcode": 90503 }, { "name": "Douglas", "zipcode": 32159 }, { "name": "Donald", "zipcode": 32404 }, { "name": "Ilene", "zipcode": 33140 }, { "name": "William", "zipcode": 33417 }, { "name": "Lynn", "zipcode": 32789 }, { "name": "Leonie", "zipcode": 33417 }, { "name": "Katherine", "zipcode": 32034 }, { "name": "Melissa", "zipcode": 30516 }, { "name": "Kimberly", "zipcode": 30345 }, { "name": "Richard", "zipcode": 30606 }, { "name": "Richard", "zipcode": 30312 }, { "name": "Ayn", "zipcode": 31901 }, { "name": "Bruce", "zipcode": 31410 }, { "name": "Fred", "zipcode": 89451 }, { "name": "Robert", "zipcode": 89110 }, { "name": "David", "zipcode": 89042 }, { "name": "Maureen", "zipcode": 89074 }, { "name": "Mary Sue", "zipcode": 89705 }, { "name": "Janet", "zipcode": 89144 }, { "name": "John", "zipcode": 89145 }, { "name": "Rand", "zipcode": 12580 }, { "name": "Kathy", "zipcode": 10604 }, { "name": "Susan", "zipcode": 13601 }, { "name": "Robin", "zipcode": 10021 }, { "name": "Peter", "zipcode": 12550 }, { "name": "Diana", "zipcode": 10603 }, { "name": "Richard", "zipcode": 12018 } ]';

    		// php array of objects
    		$clist = json_decode($clist);

    		//get post values
    	    $zip1 = $request->zip1;
    	    $zip2 = $request->zip2;
    	    
    	    //temp array zip 1 & zip 2 groups
    	    $mainarray= array();
    	    $arrayzip1=array();
    	    $arrayzip2=array();

			foreach ($clist as &$valor) {

				if ($valor->zipcode >= $zip1-9000 && $valor->zipcode <= $zip1+9000) {
					array_push($arrayzip1,$valor);
					Log::info($valor->zipcode);
				}

				if ($valor->zipcode >= $zip2-9000 && $valor->zipcode <= $zip2+9000) {
					array_push($arrayzip2,$valor);
					// Log::info($valor->zipcode);
				}

			}

			array_push($mainarray,$arrayzip1);
			array_push($mainarray,$arrayzip2);

        return \Response::json($mainarray);
    }
}