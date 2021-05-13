<?php

namespace App\Jobs;

use App\Models\Customers;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $chunk;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($chunk)
    {
        $this->chunk = $chunk;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach ($this->chunk as $record) {
            if ($this->checkJobConditions($record)) {
                Customers::insertOrIgnore([
                    'name' => $record->name,
                    'address' => $record->address,
                    'checked' => $record->checked,
                    'description' => "$record->description",
                    'interest' => $record->interest,
                    'date_of_birth' => date("Y-m-d H:i:s", strtotime($record->date_of_birth)),
                    'email' => $record->email,
                    'account' => $record->account,
                    'credit_card' => json_encode($record->credit_card)
                ]);
            }
        }
    }

    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }

    //This function calculate the age of customers and return it
    public function age($record): int
    {
        $dateOfBirth = date("Y-m-d", strtotime($record->date_of_birth));
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return $diff->format('%y');
    }

    //This function check all condition before inserting data
    public function checkJobConditions($record): bool
    {
        $returnValue = true;
        //add conditions here
        if (!($this->age($record) >= 18 && $this->age($record) <= 65)) {
            $returnValue = false;
        }

        return $returnValue;
    }
}
