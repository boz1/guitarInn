<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\News;

class PagesController extends Controller {

    public function welcome() {
        $Guitars = DB::table('Guitars')
                ->where('Guitars.id', '=', rand(1, 10))
                ->orWhere('Guitars.id', rand(11, 20))
                ->orWhere('Guitars.id', rand(21, 30))
                ->join('BodyShapes', 'Guitars.BodyShapeId', '=', 'BodyShapes.id')
                ->join('Brands', 'Guitars.BrandId', '=', 'Brands.id')
                ->join('Colors', 'Guitars.ColorId', '=', 'Colors.id')
                ->join('Configurations', 'Guitars.ConfigurationId', '=', 'Configurations.id')
                ->join('Countries', 'Guitars.CountryId', '=', 'Countries.id')
                ->join('NeckShapes', 'Guitars.NeckShapeId', '=', 'NeckShapes.id')
                ->join('Pickups as p1', 'Guitars.NeckPickupId', '=', 'p1.id')
                ->join('Pickups as p2', 'Guitars.MidPickupId', '=', 'p2.id')
                ->join('Pickups as p3', 'Guitars.BridgePickupId', '=', 'p3.id')
                ->join('Woods as w1', 'Guitars.BodyWoodId', '=', 'w1.id')
                ->join('Woods as w2', 'Guitars.TopWoodId', '=', 'w2.id')
                ->join('Woods as w3', 'Guitars.NeckWoodId', '=', 'w3.id')
                ->join('Woods as w4', 'Guitars.FretboardWoodId', '=', 'w4.id')
                ->select('Guitars.*', 'p1.Pickup_Type as NeckPick', 'p2.Pickup_Type as MidPick', 'p3.Pickup_Type as BridgePick', 'w1.Wood_Type as BodyWood', 'w2.Wood_Type as TopWood', 'w3.Wood_Type as NeckWood', 'w4.Wood_Type as FretWood', 'BodyShapes.BodyShape_Type', 'Brands.Brand_Name', 'Colors.Color_Type', 'Configurations.Config_Type', 'Countries.Country_Name', 'NeckShapes.NeckShape_Type')
                ->get();

        return view('pages.welcome', compact('Guitars'));
    }

       public function user_welcome() {
        $Guitars = DB::table('Guitars')
                ->where('Guitars.id', '=', rand(1, 10))
                ->orWhere('Guitars.id', rand(11, 20))
                ->orWhere('Guitars.id', rand(21, 30))
                ->join('BodyShapes', 'Guitars.BodyShapeId', '=', 'BodyShapes.id')
                ->join('Brands', 'Guitars.BrandId', '=', 'Brands.id')
                ->join('Colors', 'Guitars.ColorId', '=', 'Colors.id')
                ->join('Configurations', 'Guitars.ConfigurationId', '=', 'Configurations.id')
                ->join('Countries', 'Guitars.CountryId', '=', 'Countries.id')
                ->join('NeckShapes', 'Guitars.NeckShapeId', '=', 'NeckShapes.id')
                ->join('Pickups as p1', 'Guitars.NeckPickupId', '=', 'p1.id')
                ->join('Pickups as p2', 'Guitars.MidPickupId', '=', 'p2.id')
                ->join('Pickups as p3', 'Guitars.BridgePickupId', '=', 'p3.id')
                ->join('Woods as w1', 'Guitars.BodyWoodId', '=', 'w1.id')
                ->join('Woods as w2', 'Guitars.TopWoodId', '=', 'w2.id')
                ->join('Woods as w3', 'Guitars.NeckWoodId', '=', 'w3.id')
                ->join('Woods as w4', 'Guitars.FretboardWoodId', '=', 'w4.id')
                ->select('Guitars.*', 'p1.Pickup_Type as NeckPick', 'p2.Pickup_Type as MidPick', 'p3.Pickup_Type as BridgePick', 'w1.Wood_Type as BodyWood', 'w2.Wood_Type as TopWood', 'w3.Wood_Type as NeckWood', 'w4.Wood_Type as FretWood', 'BodyShapes.BodyShape_Type', 'Brands.Brand_Name', 'Colors.Color_Type', 'Configurations.Config_Type', 'Countries.Country_Name', 'NeckShapes.NeckShape_Type')
                ->get();

        return view('user.user_welcome', compact('Guitars'));
    }
    
    
    public function about() {
        return view('pages.about');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function projects() {
        return view('pages.projects');
    }

}
