<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateDirectory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'directory:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate directories required by the application.';

    public function __construct()
    {
        parent::__construct();

        $this->userImage = public_path('file/images/user');
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $directories = [
            $this->userImage,
        ];

        foreach ($directories as $directory) {
            $check = File::isDirectory($directory);
            if (! $check) {
                File::makeDirectory($directory, 0777, true, true);
            }
        }

        $this->info('Required directories have been generated');
    }
}
