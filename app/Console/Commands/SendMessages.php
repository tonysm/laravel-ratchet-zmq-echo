<?php

namespace App\Console\Commands;

use Faker\Factory;
use App\Events\NewMessage;
use Illuminate\Console\Command;

class SendMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:messages {--amount=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends fake messages';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $faker = Factory::create();
        $amount = $this->option('amount');
        $this->info(sprintf('Sending %d messages', $amount));

        foreach (range(1, $amount) as $i) {
            broadcast(new NewMessage(
                $faker->sentence()
            ));
        }

        $this->info('Done!');
    }
}
