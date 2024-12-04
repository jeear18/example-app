<?php

namespace App\Http\Controllers;
use App\Models\Name;
use App\Models\User;

use Illuminate\Http\Request;

class CountDataController extends Controller
{
     // function for counting the users
     public function getUserCount()
     {
         $userCount = User::count();
         return response()->json(['count' => $userCount]);
     }

 // function for counting the names in the database
     public function getNameCount()
     {
         $nameCount = Name::count();
         return response()->json(['name_count' => $nameCount]);
     }
}
