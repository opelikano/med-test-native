<?php

// function isValidDate($dateString) {
            // $pattern = '/^\d{4}-\d{2}-\d{2}$/';
            // return
        // }
		
		
        // if (isValidDate($date)) {
            // echo "Це коректна дата.";
        // } else {
            // echo "Це не коректна дата.";
        // }

        $date = "2014-12-12 v";
	   $pattern = '/^\d{4}-\d{2}-\d{2}$/';
	   if ( preg_match($pattern, trim($date))) {
		   
		            echo "Це коректна дата.";
        } else {
            echo "Це не коректна дата.";
           
	   }


        
        if (isset($_SERVER['HTTP_REFERER']) && strlen(pathinfo($_SERVER['HTTP_REFERER'],PATHINFO_FILENAME)) > 0) {
            $data['returnUrl'] = pathinfo($_SERVER['HTTP_REFERER'], PATHINFO_FILENAME);
        } else {
            $data['returnUrl'] = '/index.php';
        }
		
		var_dump( $data['returnUrl']);
        setView('purchases/edit', $data);
    }

''