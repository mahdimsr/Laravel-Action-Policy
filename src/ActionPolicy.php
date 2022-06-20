<?php

namespace Msr\ActionPolicy;

use Illuminate\Database\Eloquent\Model;

class ActionPolicy
{
    public Model $model;

    public function __construct()
    {
    }

    public static function builder(): ActionPolicyBuilder
    {
        return (new ActionPolicyBuilder(new self()));
    }

    public function getModel(): Model
    {
        return $this->model;
    }
}
