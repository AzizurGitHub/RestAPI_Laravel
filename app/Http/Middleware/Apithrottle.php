<?php

namespace App\Http\Middleware;

use App\Traits\APiResponse;
use Closure;
use Illuminate\Routing\Middleware\ThrottleRequests;

class Apithrottle extends ThrottleRequests
{
    use APiResponse;
    protected function buildResponse($key, $maxAttempts)
    {


        $response = $this->showError('Too Many Attempts.', 429);

        $retryAfter = $this->limiter->availableIn($key);

        return $this->addHeaders(
            $response, $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts, $retryAfter),
            $retryAfter
        );
    }
}
