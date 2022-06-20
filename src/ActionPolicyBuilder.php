<?php

namespace Msr\ActionPolicy;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Object_;

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
        $this->actionPolicy->model = $model instanceof Model ? $model : new $model();

        return $this;
    }

    public function policy(string|object $policyClass): self
    {
        $this->actionPolicy->policy = $policyClass instanceof Object_ ? $policyClass : new $policyClass();

        return $this;
    }

    public function policyMethod(string $methodName, ...$arguments): self
    {
        $this->actionPolicy->policyMethod = $methodName;
        $this->actionPolicy->policyArguments = $arguments;

        return $this;
    }

    public function modelMethod(string $methodName): self
    {
        $this->actionPolicy->modelMethod = $methodName;

        return $this;
    }
}
