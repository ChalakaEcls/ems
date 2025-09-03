<?php
// app/Console/Commands/DeleteCompletedClasses.php

namespace App\Console\Commands;

use App\Models\ClassModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteCompletedClasses extends Command
{
    protected $signature = 'classes:delete-completed';
    protected $description = 'Delete classes that have already been completed';

    public function handle()
    {
        $now = now();
        $deletedCount = ClassModel::where('end_date', '<', $now)->delete();
        
        $this->info("Deleted $deletedCount completed classes.");
        Log::info("Deleted $deletedCount completed classes.");
        
        return 0;
    }
}