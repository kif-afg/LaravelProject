<?php

namespace App\Http\Controllers;

use App\Rating;
use function foo\func;
use Illuminate\Http\Request;
use App\Movie;
use app\Genres_list;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$movie=  Movie::all();
       // Movie::orderby('Year', 'DESC')->get();
        //return view('Movie.Index')->with ('Movie',$movie);
       $query = DB::table('movies')
           ->select('movies.moviesid','title','trailer','poster','year','actors.FirstName','actors.LastName','genres.genre',DB::raw('avg(ratings.rating) as rating'))
           ->join('ratings','movies.MoviesId','=','ratings.MoviesId')

           ->groupBy('Movies.moviesid')
           ->join('casts','movies.moviesid','=','casts.moviesid')
           ->join ('actors',function($j)
           {
               $j->on('actors.actorid','=','casts.actorsid')
                   ->on('actors.actorid','=','casts.actorsid');
           })
           ->join('genres_lists','genres_lists.moviesid','=','movies.moviesid')
           ->join('genres',function($g){
               $g->on('genres.genreid','=','genres_lists.genreid');
           })
           ->orderBy('rating','DESC')
           ->get();
            return $query;
            //return response()->json($query);
            //return $query->toJson();
         //   $result = json_encode($query);;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    private $movieid ;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //Movie::create($request->all());
        $movie = new Movie;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',


        ]);

        if ($validator->fails()) {
            return "Title Required";
        }
        $movie->title = $request->title;
        $movie->trailer = $request->trailer;
        $movie->poster = $request->poster;
        $movie->year = $request->year;
        //$id = Movie::find(moviesid);
        $movie->save();

      $this->movieid =  ($movie->MoviesId);


    }


    public function getMoviesId()
    {
        $last_row=DB::table('movies')->orderBy('MoviesId', 'DESC')->first();
        return $last_row->MoviesId;

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // return Movie::find($id);
        //Movie::find($id);
        $query = DB::table('movies')
            ->select('title','trailer','poster','year','actors.FirstName','actors.LastName','genres.genre',DB::raw('avg(ratings.rating) as rating'))
            ->join('ratings','movies.MoviesId','=','ratings.MoviesId')

            ->groupBy('Movies.moviesid')
            ->join('casts','movies.moviesid','=','casts.moviesid')
            ->join ('actors',function($j)
            {
                $j->on('actors.actorid','=','casts.actorsid')
                    ->on('actors.actorid','=','casts.actorsid');
            })
            ->join('genres_lists','genres_lists.moviesid','=','movies.moviesid')
            ->join('genres',function($g){
                $g->on('genres.genreid','=','genres_lists.genreid');
            })
            ->orderBy('rating','DESC')
            ->where(function ($idf) use ($id)
            {
                $idf -> where ('movies.moviesid','=',$id);
            })
            ->get();
        return $query;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$movie = Movie::find($id);
        //$movie->title = $request->title;
        //$movie->trailer = $request->trailer;
        //$movie->poster = $request->poster;
       // $movie->year = $request->year;
       // $movie->save();
        $movie = Movie::find($id);
        $movie->update($request->all());
        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
    }

    public function getMovieId()
    {



    }





public function addrating($id)
{
    $movies = Movie::all();
    foreach ($movies as $m)
    {
        if ($m->MoviesId == $id)
        {
            return $m;
        }
    }
}


}
