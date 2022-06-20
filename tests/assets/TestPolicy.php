<?php

namespace Msr\ActionPolicy\Tests\assets;

use Illuminate\Auth\Access\Response;

class TestPolicy
{
    public function canSetName(): Response
    {
        return Response::allow();
    }

    public function canSetJohn($name): Response
    {
        return $name === 'John' ? Response::allow() : Response::deny();
    }

    public function canBeFriend($friendOne, $friendTwo, $friendThree): Response
    {
        return Response::allow();
    }
}
