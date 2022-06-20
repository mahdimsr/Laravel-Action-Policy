<?php

namespace Msr\ActionPolicy;

use Illuminate\Database\Eloquent\Model;

class ActionPolicy
{
    public Model|string $model;
    public string|object $policy;

    public function __construct()
    {
    }

    public static function builder(): ActionPolicyBuilder
    {
        return (new ActionPolicyBuilder(new self()));
    }

    public function getModel(): Model|string
    {
        return $this->model;
    }

    public function getPolicy(): string|object
    {
        return $this->policy;
    }
}
