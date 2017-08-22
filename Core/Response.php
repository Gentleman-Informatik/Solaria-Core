<?php
/**
*
* Response wrapper class
*
* @author Flavio Kleiber <flaverkleiber@yahoo.de>
* @copyright 2016-2017 Flavio Kleiber
*/

namespace Solaria\Framework\Core;

use Solaria\Framework\Core\DiClass;

class Response extends DiClass{
    /**
    * Redirect to a url
    *
    * @param url string
    * @param statusCode int default is 303
    * @return void
    */
     public function redirect($url, $statusCode = 303) {
         header('Location: '.$this->di->get('Url')->url.'/'. $url, true, $statusCode);
         die();
     }
}
