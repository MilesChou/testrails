<?php

namespace App\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

/**
 * @link https://www.gurock.com/testrail/docs/api/reference/suites/
 */
class Suite extends Command
{
    protected $signature = 'suite {id}';

    protected $description = 'Returns an existing test suite.';

    public function handle(): int
    {
        $host = config('testrail.host');

        $response = Http::withBasicAuth(config('testrail.username'), config('testrail.password'))
            ->get($host . "/index.php?/api/v2/get_suite/{$this->argument('id')}");

        dump($response->json());

        return 0;
    }
}
