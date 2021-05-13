<?php

namespace App\Http\Controllers;

use App\Jobs\ImportProcess;
use Illuminate\Http\Request;
use App\Services\ImportFromFileService as IFFS;
use Illuminate\Support\Facades\Bus;

class ImportController extends Controller
{
    public function index()
    {
        return view('import');
    }

    public function store(Request $request)
    {
        $validData = $request->validate(['data_file' => 'required|file']);
        if ($_FILES['data_file']['type'] == 'application/json') {
            //if file type == json then do below
            $preparedData = new IFFS($validData['data_file'], $_FILES['data_file']['type']);
            $batch = Bus::batch([])->dispatch();
            foreach ($preparedData->chunks as $chunk) {
                $batch->add(new ImportProcess($chunk));
            }
            return redirect('/user_area/batch?id=' . $batch->id);
        } else {
            // if file type is not json do below
            return back()->withErrors(['badFile' => 'Please upload JSON file']);
        }

    }

    public function batch()
    {
        $batchId = request('id');
        $result = Bus::findBatch($batchId);
        if ($result->totalJobs === $result->processedJobs() + $result->failedJobs) {
        } else {
            header("refresh:1; /user_area/batch?id=" . $batchId);
        }
        return view('result', ['batchResult' => $result->progress()]);

    }
}
