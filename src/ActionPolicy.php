<?php

namespace Msr\ActionPolicy;

use Illuminate\Auth\Access\Response;
use Msr\ActionPolicy\Decorator\BaseActionPolicy;
use Msr\ActionPolicy\Decorator\BaseActionPolicyBuilder;

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
        if ($this->runPolicy()->allowed() and $this->getModelMethod() !== null) {
            $this->runModel();
        }

        return $this->runPolicy();
    }
}
