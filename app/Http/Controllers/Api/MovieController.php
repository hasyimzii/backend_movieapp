<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = env('APP_URL');
        $movie = Movie::orderBy('created_at', 'desc')->get();

        // check if not empty
        if (!$movie->isEmpty()) {
            $data = [];
            foreach ($movie as $item) {
                $data[] = [
                    'title' => $item->title,
                    'director' => $item->director,
                    'year' => $item->year,
                    'rating' => $item->rating,
                    'runtime' => $item->runtime,
                    'age' => $item->age,
                    'genre' => $item->genre,
                    'cast' => $item->cast,
                    'description' => $item->description,
                    'url' => $item->url,
                    'image' => $url . $item->image,
                ];
            }
            return response()->json(['data' => $data], 200);
        } else {
            return response()->json(['data' => null], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->hasFile('image')) {
            $uploadFile = $request->file('image');
            $destinationPath = 'uploads/movie/'; // upload path
            $fileName = date('YmdHis') . '-' . Str::random(15) . "." . $uploadFile->getClientOriginalExtension();
            $uploadFile->move($destinationPath, $fileName);
            $fileName = $destinationPath . $fileName;
        }

        $dataCreate = [
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'rating' => $request->rating,
            'runtime' => $request->runtime,
            'age' => $request->age,
            'genre' => $request->genre,
            'cast' => $request->cast,
            'description' => $request->description,
            'url' => $request->url,
            'image' => $fileName,
        ];
        $movie = Movie::create($dataCreate);
        return response()->json(['message' => 'Berhasil menambah data film'], 200);
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $movie = Movie::findOrFail($request->id);

        if ($request->hasFile('image')) {
            $uploadFile = $request->file('image');
            $destinationPath = 'uploads/movie/'; // upload path
            $fileName = date('YmdHis') . '-' . Str::random(15) . "." . $uploadFile->getClientOriginalExtension();
            $uploadFile->move($destinationPath, $fileName);
            $fileName = $destinationPath . $fileName;
        }

        $dataUpdate = [
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'rating' => $request->rating,
            'runtime' => $request->runtime,
            'age' => $request->age,
            'genre' => $request->genre,
            'cast' => $request->cast,
            'description' => $request->description,
            'url' => $request->url,
            'image' => $fileName,
        ];
        $movie->update($dataUpdate);
        return response()->json(['message' => 'Berhasil mengubah data film'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $movie = Movie::findOrFail($request->id);
        if($movie->get()->isEmpty()){
            return response()->json(['message' => 'Gagal mengubah data film'], 500);
        }
        $movie->delete();
        return response()->json(['message' => 'Berhasil mengubah data film'], 200);
    }    
}
