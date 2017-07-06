<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\News;
use Storage;

class DataController extends Controller {

    public function show() {
        return view('layouts.add_news');
    }

    public function insert_news(Request $request) {
        $image = $request->file('image');  //add_news <input type="file" name="image">
        $filename = $image->getClientOriginalName();
        Storage::put('public/upload/images/' . $filename, file_get_contents($request->file('image')->getRealPath()));

        $News = new News;
        $News->title = $request->title;
        $News->content = $request->editor1;
        $News->image = $filename;
        $News->save();

        return view('layouts.add_news');
    }

    public function show_news() {
        $News = DB::table('news')->get();
        return view('pages.news', compact('News'));
    }

    public function show_guitars() {
        $Guitars = DB::table('Guitars')
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
                ->paginate(2);
        return view('pages.guitars', compact('Guitars'));
    }

    public function show_details($id) {
        $Guitars = DB::table('Guitars')
                ->where('Guitars.id', '=', $id)
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
        return view('pages.details', compact('Guitars'));
    }

    public function search(Request $request) {
        $Search = $request->search;
        $Guitars = DB::table('Guitars')
                ->where('Guitars.Title', 'like', "%$Search%")
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
                ->paginate(2);

        return view('pages.guitars', compact('Guitars'));
    }

}
