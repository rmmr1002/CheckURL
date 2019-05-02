<?php

        if (isDomainAvailible('https://dbknews.com/') && isDomainAvailible('http://wp.dbknews.com/'))
       {
               print  " <h1>Everything's up and running!</h1>" ;
       }
       else if (isDomainAvailible('https://dbknews.com/') && !isDomainAvailible('http://wp.dbknews.com/'))
       {
               print "<h1> Wordpress not working </h1>";
       }
       else if (!isDomainAvailible('https://dbknews.com/') && isDomainAvailible('http://wp.dbknews.com/'))
       {
               print "<h1> DBK not working </h1>";
       }
       else 
       {
                echo "<h1> Both URL's down </h1>";
       }
       //returns true, if domain is availible, false if not
       function isDomainAvailible($domain)
       {
               //check, if a valid url is provided
               if(!filter_var($domain, FILTER_VALIDATE_URL))
               {
                       return false;
               }

               //initialize curl
               $curlInit = curl_init($domain);
               curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);    
               curl_setopt($curlInit,CURLOPT_HEADER,true);
               curl_setopt($curlInit,CURLOPT_NOBODY,true);
               curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

               //get answer
               $response = curl_exec($curlInit);

               curl_close($curlInit);

               if ($response) return true;

               return false;
       }
?>