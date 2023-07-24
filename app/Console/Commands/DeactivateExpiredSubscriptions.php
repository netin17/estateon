<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UserSubscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class DeactivateExpiredSubscriptions extends Command
{
    
   
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:deactivate-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate expired subscriptions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $expiredSubscriptions = UserSubscription::where('end_at', '<=', Carbon::now())->where('status', 1)->get();

    foreach ($expiredSubscriptions as $subscription) {
        // Update the subscription status to "inactive" or "expired"
        $subscription->update(['status' => 0]);

        // You can add any other logic here, e.g., send an email notification to the user.
    }

    // Log the number of subscriptions deactivated
    Log::info('Deactivated ' . count($expiredSubscriptions) . ' expired subscriptions.');
    }
}
