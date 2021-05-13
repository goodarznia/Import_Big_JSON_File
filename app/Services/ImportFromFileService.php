<?php


namespace App\Services;


class ImportFromFileService
{
    //this class prepare valid chunked JSON file from various file types
    private $fileType;
    public $chunks;

    public function __construct($file, $fileType)
    {
        $this->fileType = $fileType;
        if ($this->fileType === "application/json") {
            $data = json_decode(file_get_contents($file->path()));
            $this->chunks = array_chunk($data, env('chunkValue'));
            return "True";
        }
//        //This part made for extending application for import other file type such as csv
//        elseif($this->fileType === "application/csv" or $this->fileType === "text/csv" or $this->fileType === "application/vnd.ms-excel" ){
//            $data=array_map('str_getcsv', file($file->path()));
//            $header = $data[0];
//            unset($data[0]);
//            $newData=array();
//            foreach ($data as $value){
//                $newData[]=array_combine($header,$value);
//            }
//           $this->chunks=json_decode($newData);
//            return "True";
//        }
        else {
            return 'False';
        }
    }
}
