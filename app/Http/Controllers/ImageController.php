<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CsvData;
use Illuminate\Http\UploadedFile;

use Ixudra\Curl\Facades\Curl;
use JeroenG\Flickr\Flickr;

use Illuminate\Support\Str;


class ImageController extends Controller
{
    //flickr API object
    private $flickr;

    public function __construct()
    {
        $this->flickr = new Flickr(new \JeroenG\Flickr\Api(env("APP_FLICKR_KEY")));
    }

    /**
     * Display a listing of images
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image_data = CsvData::all();

        return view('index', ['image_data' => $image_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    public function show(CsvData $image)
    {
        //retrieve photo data
        $photo_data = $this->flickr->photoInfo($image->photo_id)->photo;
        $data = [
            'image'      => $image,
            'photo_data' => json_encode($photo_data),

        ];
        return view('show', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('inputFile')) {
            $file = $this->uploadFile($request);
            if (($handle = fopen(public_path() . '/storage/' . $file, 'r')) !== FALSE) {

                while (($data = fgetcsv($handle, 1000, '|')) !== FALSE) {
                    if ($data[0] != "Picture_title" && $data[0] != NULL && isset($data[1])) {

                        $title       = $data[0];
                        $url         = $data[1];
                        $description = $data[2];

                        if (strpos($url, 'staticflickr') !== false) {

                            $data = explode("/", $url);
                            $photo_id = explode('_', $data[sizeof($data) - 1])[0];

                            if (is_numeric($photo_id)) { //check if the photo id is an actual id

                                //retrieve photo data
                                $photo_data = $this->flickr->photoInfo($photo_id)->photo;

                                $content = file_get_contents($url); //get the content and write it to a filename
                                $image_name = Str::of($title)->slug('-') . ".jpg"; // make it a slug, just in case

                                $file = file_put_contents($image_name, $content); //store picture

                                Csvdata::updateOrInsert(
                                    [
                                        'title'         => $title,
                                    ],
                                    [
                                        'url'           => $url,
                                        'photo_id'      => $photo_id,
                                        'views'         => $photo_data["views"],
                                        'owner'         => $photo_data["owner"]["realname"],
                                        'location'      => $photo_data["owner"]["location"],
                                        'date_taken'    => $photo_data["dates"]["taken"],
                                        'image'         => $image_name,
                                        'description'   => $description,
                                    ]
                                );
                            }
                        }
                    }
                }
                fclose($handle);
            }
        }

        return redirect()->route('home');
    }

    protected function uploadFile(Request $request)
    {

        //if link is not working create a symbolik link: see documentation !!!
        $file = $request->file('inputFile');

        // Check if a file has been uploaded
        if ($request->has('inputFile')) {

            $name = 'upload_' . time();
            // Define folder path
            $folder = '/uploads/csv/';
            // Make a file path where file will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $file->getClientOriginalExtension();
            // Upload file
            $this->uploadOne($file, $folder, 'public', $name);
            // Set path in database to filePath
            return $filePath;
        }
        //if no image is selected use the current image
        return $file;
    }

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name . '.' . $uploadedFile->getClientOriginalExtension(), $disk);
        return $file;
    }
}
