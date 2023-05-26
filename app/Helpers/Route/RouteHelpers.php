<?php  

namespace App\Helpers\Route;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class RouteHelper
{
    public static function includeRouteFiles($data)
    {
        // iterate through the v1 folder //

        $dirIterator = new RecursiveDirectoryIterator($data);

        //.. @var RecursiveDirectoryIterator |  \ RecursiveIteratorIterator $it ..//

        $it = new RecursiveIteratorIterator($dirIterator);

        //.. require the file in each iterator..//

        while($it->valid()) {
          if(! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php')
           {
              require $it->key();
            }

          $it->next();
         }
    }
}