<?php

use Illuminate\Support\Facades\File;


if ( !function_exists('dashboardDirection') )
{
    function dashboardDirection()
    {
        if ( session('lang') == 'ar' )
        {
            return 'rtl';
        }

        return 'ltr';
    }
}





if ( !function_exists('getNamesFromDir') )
{
    /**
     * Extract names from given directrory ( just inside app direcory )
     * @param string $dir
     * @return array
     */

     function getNamesFromDir($dir)
     {
        $models      = File::allFiles(app_path($dir));

        $final_array =[];
        
        foreach ( $models as $model )
        {
            $name = basename(strtolower($model),'.php');

            array_push($final_array,$name);
        }

        return $final_array;
     }
}




if ( !function_exists('authAdmin') )
{
    /**
     * Get current admin auth
     * 
     * @return object
     */

     function authAdmin()
     {
        return auth('admin')->user();
     }
}



if ( !function_exists('authUser') )
{
    /**
     * Get current admin auth
     * 
     * @return object
     */

     function authUser()
     {
        return auth()->user();
     }
}


