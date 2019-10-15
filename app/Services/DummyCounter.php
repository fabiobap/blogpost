<?php
namespace App\Services;

use App\Contracts\CounterContract;

class DummyCounter implements CounterContract
{
    public function increment(string $key, array $tags = null): int
    {
        dd('Im a dummy counter not implemented yet!');
        return 0;
    }
}
