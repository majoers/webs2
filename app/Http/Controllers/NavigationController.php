<?php

namespace App\Http\Controllers;

use App\navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavigationController extends Controller
{

   static function display_children($parent, $level) {

        $menuItems = DB::table('navigations As a')->select(DB::raw('a.id, a.label, a.link, Deriv1.Count' ))
            ->leftJoin(DB::raw("(SELECT parent, COUNT(*) AS Count 
						FROM `navigations` 
						GROUP BY parent)Deriv1"),function($join)
            {
            $join->on("a.id","=","Deriv1.parent");
            })->where("a.parent","=",$parent)->get();




        foreach ($menuItems as $item) {
            if ($item->Count > 0) {
                echo "<li><a class=\"nav-link\" href='" . $item->link . "'>" . $item->label . "</a>";
                echo  "<ul>";
                display_children($item->id, $level + 1);
                echo "</ul>";
                echo "</li>";
            } elseif ($item->Count==0) {
                echo "<li><a class=\"nav-link\" href='" . $item->link . "'>" . $item->label . "</a></li>";
            } else;
        }

    }


}
