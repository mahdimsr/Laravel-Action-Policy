<?php

namespace Msr\ActionPolicy;

use Msr\ActionPolicy\Decorator\BaseActionPolicy;
use Msr\ActionPolicy\Decorator\BaseActionPolicyBuilder;

class ActionPolicyBuilder extends BaseActionPolicyBuilder
{
    public function __construct(BaseActionPolicy $actionPolicy)
    {
        $this->actionPolicy = $actionPolicy;
    }
}
