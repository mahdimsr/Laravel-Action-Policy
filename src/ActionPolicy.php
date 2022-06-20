<?php

namespace Msr\ActionPolicy;

class ActionPolicy
{
    public function __construct()
    {
    }

    public static function builder(): self
    {
        return (new ActionPolicyBuilder(new self()))->build();
    }
}
