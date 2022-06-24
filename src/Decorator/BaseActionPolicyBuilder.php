<?php

namespace Msr\ActionPolicy\Decorator;

use Illuminate\Database\Eloquent\Model;
use Msr\ActionPolicy\Decorator\Interfaces\RunAction;

abstract class BaseActionPolicyBuilder
{
    protected BaseActionPolicy $actionPolicy;

    abstract public function __construct(BaseActionPolicy $actionPolicy);

    public function build(): RunAction
    {
        return $this->actionPolicy;
    }

    public function model(Model|string $model): self
    {
        $this->actionPolicy->setModel($model);

        return $this;
    }

    public function modelMethod(string $method, ...$arguments): self
    {
        $this->actionPolicy->setModelMethod($method, ...$arguments);

        return $this;
    }

    public function policy(object|string $policy): self
    {
        $this->actionPolicy->setPolicy($policy);

        return $this;
    }

    public function policyMethod(string $method, ...$arguments): self
    {
        $this->actionPolicy->setPolicyMethod($method, ...$arguments);

        return $this;
    }
}
