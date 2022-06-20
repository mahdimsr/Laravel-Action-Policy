<?php

namespace Msr\ActionPolicy\Tests\assets;

use Illuminate\Auth\Access\Response;

class TestPolicy
{
    public function canSetName(): Response
    {
        return Response::allow();
    }
}
