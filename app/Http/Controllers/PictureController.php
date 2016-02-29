<?php namespace App\Http\Controllers;
use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Log;
class UploadController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'file' => 'required|image|mimes:jpeg,png'
        ]);
        if($validator->fails()){
            return response($validator->messages(),400);
        }
        $pictureHashedName = md5($request->file('file')->getClientOriginalName().Course::now().env('PICTURE_HASH_KEY'));
        $extensionType = $request->file('file')->getClientOriginalExtension();
        Storage::put(
            'upload/pics/'
            .$pictureHashedName.'.'.$extensionType,
            file_get_contents($request->file('file')->getRealPath())
        );
        return response('upload/pics/'.$pictureHashedName.'.'.$extensionType,200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($hash)
    {
        return response(Storage::get('upload/pics/'.$hash));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}