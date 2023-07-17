<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\City;
use App\Models\Color;
use App\Models\Contact;
use App\Models\Material;
use App\Models\Setting;
use App\Models\ShoeModel;
use App\Models\Size;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        // $colors      = Color::count();
        // $sizes      = About::count();
        // $contacts     = Contact::count();
        // $categories        = Category::count();
        // $cities = City::count();
        // $materials      = Material::count();
        // $sizes     = Size::count();
        // $shoe_model      = ShoeModel::count();
        // $setting      = Setting::count();
        // $unWatchedContacts = Contact::where('status', '0')->count();
        // return view('admin.home', compact('setting', 'aboutUs', 'contacts', 'blogs', 'projectImage', 'sliders', 'projects', 'borders', 'unWatchedContacts'));
        return view('admin.home');
    }
}
