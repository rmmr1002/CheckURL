<?php

        if (isDomainAvailible('https://dbknews.com/') && isDomainAvailible('http://wp.dbknews.com/'))
       {
               echo "Everything's up and running!";
       }
       else if (isDomainAvailible('https://dbknews.com/') && !isDomainAvailible('http://wp.dbknews.com/'))
       {
               echo "Wordpress not working";
       }
       else if (!isDomainAvailible('https://dbknews.com/') && isDomainAvailible('http://wp.dbknews.com/'))
       {
               echo "DBK not working";
       }
       else 
       {
                echo "Both URL's down";
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