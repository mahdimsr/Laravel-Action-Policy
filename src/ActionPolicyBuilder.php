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

    public function model(Model|string $model): self
    {
        $this->actionPolicy->model = $model;

        return $this;
    }

    public function policy(string|object $policyClass): self
    {
        $this->actionPolicy->policy = $policyClass;

        return $this;
    }

    public function policyMethod(string $methodName): self
    {
        $this->actionPolicy->policyMethod = $methodName;

        return $this;
    }

    public function modelMethod(string $methodName): self
    {
        $this->actionPolicy->modelMethod = $methodName;

        return $this;
    }
}
