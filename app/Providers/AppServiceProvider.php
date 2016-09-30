<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
      Blade::directive('qualificationType', function($expression){
        $output = "<?php  ";
        $output .= "switch(".$expression."){";
        $output .= "case '10_th': echo  '10th Standard';break;";
        $output .= "case '12_th': echo  '12th Standard'; break;";
        $output .= "case 'graduation': echo  'Graduation'; break;";
        $output .= "case 'post_graduation': echo  'Post graduation'; break;";
        $output .= "case 'diploma': echo  'Diploma Course'; break;";
        $output .= "case 'phd': echo  'Phd'; break;";
        $output .= "case 'academic': echo  'Academic Details'; break;";
        $output .= "case 'sports': echo  'Sports'; break;";
        $output .= "case 'arts': echo  'Arts'; break;";
        $output .= "default: echo 'Other';break;";
        $output .= "}?>";
        return $output;
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
