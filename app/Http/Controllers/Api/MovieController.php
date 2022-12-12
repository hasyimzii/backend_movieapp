<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Throwable;

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
                    'id' => $item->id,
                    'title' => $item->title,
                    'director' => $item->director,
                    'year' => $item->year,
                    'rating' => $item->rating,
                    'runtime' => $item->runtime,
                    'age' => $item->age,
                    'genre' => $item->genre,
                    'description' => $item->description,
                    'url' => $item->url,
                    'image' => $item->getFirstMedia('image')->getUrl(),
                ];
            }
            return response()->json([
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    /**
     * Search listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $url = env('APP_URL');
        $movie = Movie::where('title', 'LIKE', "%{$request->title}%")->orderBy('created_at', 'desc')->get();

        // check if not empty
        if (!$movie->isEmpty()) {
            $data = [];
            foreach ($movie as $item) {
                $data[] = [
                    'id' => $item->id,
                    'title' => $item->title,
                    'director' => $item->director,
                    'year' => $item->year,
                    'rating' => $item->rating,
                    'runtime' => $item->runtime,
                    'age' => $item->age,
                    'genre' => $item->genre,
                    'description' => $item->description,
                    'url' => $item->url,
                    'image' => $item->getFirstMedia('image')->getUrl(),
                ];
            }
            return response()->json([
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
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
        $dataCreate = [
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'rating' => (float) $request->rating,
            'runtime' => $request->runtime,
            'age' => $request->age,
            'genre' => $request->genre,
            'description' => $request->description,
            'url' => $request->url,
        ];
        try {
            $movie = Movie::create($dataCreate);
            $movie->addMediaFromRequest('image')->toMediaCollection('image');

            return response()->json([
                'message' => 'Berhasil menambah data film',
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Gagal menambah data film',
            ], 500);
        }
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        if ($movie != null) {
            $dataUpdate = [
                'title' => $request->title,
                'director' => $request->director,
                'year' => $request->year,
                'rating' => (float) $request->rating,
                'runtime' => $request->runtime,
                'age' => $request->age,
                'genre' => $request->genre,
                'description' => $request->description,
                'url' => $request->url,
            ];

            $movie->update($dataUpdate);
            if ($request->hasFile('image')) {
                $movie->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return response()->json([
                'message' => 'Berhasil mengubah data film',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Gagal mengubah data film',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $movie = Movie::findOrFail($id);
        if ($movie->get()->isEmpty()) {
            return response()->json([
                'message' => 'Gagal mengubah data film',
            ], 500);
        }
        $movie->delete();
        return response()->json([
            'message' => 'Berhasil mengubah data film',
        ], 200);
    }
}
