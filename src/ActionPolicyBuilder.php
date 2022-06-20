<?php

namespace Msr\ActionPolicy;

use Illuminate\Database\Eloquent\Model;

class ActionPolicyBuilder
{
    private ActionPolicy $actionPolicy;

    public function __construct(ActionPolicy $actionPolicy)
    {
        $this->actionPolicy = $actionPolicy;
    }

    public function build(): ActionPolicy
    {
        return $this->actionPolicy;
    }

    public function model(Model $model): self
    {
        $this->actionPolicy->model = $model;

        return $this;
    }
}
