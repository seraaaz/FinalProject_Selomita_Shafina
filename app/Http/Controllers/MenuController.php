<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(menu::all());
        return view('menupage', ['menus' => menu::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menuform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = new menu();
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);
        $menu->image = $imageName;
        $menu->save();
        return redirect()->route('dashboard')->with('success', 'Menu has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(menu $menuform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menu $menuform)
    {
        $menu = $menuform;
        return view('menuform', ['menu' => $menuform]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, menu $menuform)
    {
        $menu = $menuform;
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $menu->image = $imageName;
        }
        $menu->save();
        return redirect()->route('menus.index')->with('success', 'Menu has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menu $menuform)
    {
        $menu = $menuform;
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu has been deleted successfully!');
    }
}
