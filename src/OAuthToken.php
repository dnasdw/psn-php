<?php

namespace Tustin\PlayStation;

use Carbon\Carbon;


class OAuthToken
{
    private string $token;

    private Carbon $expiration;

    public function __construct(string $token, int $expiresIn)
    {
        if (0 >= $expiresIn) {
            throw new \InvalidArgumentException('expiresIn has to be an integer > 0');
        }
        $this->token = $token;
        $this->expiration = Carbon::now()->addSeconds($expiresIn);
    }

    /**
     * Gets the OAuth token.
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Gets the OAuth token's expiration date and time.
     *
     * @return \DateTime
     */
    public function getExpiration(): \DateTime
    {
        return $this->expiration;
    }
}