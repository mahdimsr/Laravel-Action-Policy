<?php

namespace Msr\ActionPolicy;

use Illuminate\Auth\Access\Response;
use Msr\ActionPolicy\Decorator\BaseActionPolicy;

class ActionPolicy extends BaseActionPolicy
{
    public function __construct()
    {
    }

    public static function builder(): ActionPolicyBuilder
    {
        return (new ActionPolicyBuilder(new self()));
    }

    public function run(): Response
    {
        if ($this->authorizePolicy()->allowed() and $this->getModelMethod() !== null) {
            $this->runModel();
        }

        return $this->authorizePolicy();
    }
}
