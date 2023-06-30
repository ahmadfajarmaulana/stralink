<?php

namespace App\Http\Controllers;

use File;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        return view('artist.index');
    }

    public function read()
    {
        $artists = Artist::all();

        return view('artist.modal.read')->with([
            "data"  => $artists
        ]);
    }

    public function show($id)
    {
        $artist = Artist::find($id);

        return view('artist.modal.edit')->with([
            "data"  => $artist
        ]);
    }

    public function create()
    {
        return view('artist.modal.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'artist_name' => 'required|min:5|max:20',
            'package_name' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'release_date' => 'nullable',
            'sample_url' => 'required',
            'price' => 'required|numeric',
        ]);

        $img = $request->file('image_url');
        $filename = time().'.'.$img->getClientOriginalExtension();
        $request->image_url->move(public_path('image_url'), $filename);

        $artist = new Artist();
        $artist->ArtistName = $request->artist_name;
        $artist->PackageName = $request->package_name;
        $artist->ImageURL = $filename;
        $artist->ReleaseDate = $request->release_date;
        $artist->SampleURL = $request->sample_url;
        $artist->Price = $request->price;
        $artist->save();
    }

    public function edit($id)
    {
        $artist = Artist::find($id);
        return view('artist.modal.edit')->with([
            "data"  => $artist
        ]);
    }

    public function update(Request $request, $id)
    {   
        $this->validate($request,[
            'artist_name' => 'required|min:5|max:20',
            'package_name' => 'required',
            // 'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'release_date' => 'required',
            'sample_url' => 'required',
            'price' => 'required|numeric',
        ]);

        $artist = Artist::find($id);

        if ($image = $request->file('image_url')) {
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('image_url'), $filename);

            //hapus file lama
            if ($artist->ImageURL) {
                File::delete(public_path('image_url').'/'. $artist->ImageURL);
            }
        }else{
            $filename = $artist->ImageURL;
        }

        $artist->ArtistName = $request->artist_name;
        $artist->PackageName = $request->package_name;
        $artist->ImageURL = $filename;
        $artist->ReleaseDate = $request->release_date;
        $artist->SampleURL = $request->sample_url;
        $artist->Price = $request->price;
        $artist->save();
    }

    public function destroy($id)
    {
        $artist = Artist::find($id);
        $artist->delete();
    }
}
