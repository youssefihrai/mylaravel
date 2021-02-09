<?php
namespace App\Http\ViewComposer;

use App\Post;
use App\Entreprise;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ActivityComposer
{

        public function compose(View $view){
            $mostcomented=Cache::remember('mostcomented', now()->addSeconds(1), function () {
                return Post::most()->take(5)->get();
            });
            $mostusers=Cache::remember('mostusers', now()->addSeconds(1), function () {
                return Entreprise::userpost()->take(5)->get();
            });
            $mostusersinmonth=Cache::remember('mostusersinmonth', now()->addSeconds(1), function () {
                return Entreprise::userlastmonth()->take(5)->get();
            });
        $view->with([
            'mostcomented'=>$mostcomented
            ,'mostusers'=>$mostusers,
            'mostusersinmonth'=>$mostusersinmonth,
            'tab'=>"list"
            ]);
        }
}
