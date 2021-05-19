<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Palette;

class PaletteController extends Controller
{
    public function index()
    {
        $palettes = auth()->user()->palettes()->paginate();
        return view('palette.index', ['palettes' => $palettes]);
    }

    public function create()
    {   
        return view('palette.create');
    }

    public function store(Request $request)
    {   
        $arr = $request->input();
        $user = auth()->user();

        if($arr["name"] == null) {
            $arr["name"] = "DEFAULT";
        }

        $colors = array();
        
        for ($i=1; $i<(count($arr)-1); ++$i){
            array_push($colors, $arr['color'.$i]);
        }

        $colors_json = json_encode($colors);

        $user->palettes()->create([   
            'name' => $arr['name'],
            'colors' => $colors_json
        ]);

        return redirect()->route('palette.index');
    }

    public function show(Palette $palette)
    {
        $colors = json_decode($palette->colors);
        return view('palette.show', ['palette' => $palette, 'colors' => $colors]);
    }

    public function edit(Palette $palette)
    {
        $colors = json_decode($palette->colors);
        return view('palette.edit', ['palette' => $palette, 'colors' => $colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Palette $palette)
    {
        $arr = $request->input();

        $colors = array();

        for ($i=1; $i<(count($arr)-1); ++$i){
            array_push($colors, $arr['color'.$i]);
        }

        $colors_json = json_encode($colors);

        $palette->name = $arr['name'];
        $palette->colors = $colors_json;
        $palette->save();

        return back();
    }

    public function destroy(Palette $palette)
    {
        $palette->delete();
        return redirect()->route('palette.index');
    }
}
