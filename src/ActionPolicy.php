<?php

namespace Msr\ActionPolicy;

use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class ActionPolicy
{
    public Model  $model;
    public object $policy;
    public string $policyMethod;
    public array  $policyArguments;
    public string $modelMethod;

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

    public function getPolicy(): object
    {
        return $this->policy;
    }

    public function getPolicyMethod(): string
    {
        return $this->policyMethod;
    }

    public function getModelMethod(): string
    {
        return $this->modelMethod;
    }

    public function getPolicyArguments(): array
    {
        return $this->policyArguments;
    }

    public function runPolicy(): Response
    {
        return call_user_func_array([$this->getPolicy(),$this->getPolicyMethod()], $this->getPolicyArguments());
    }

    public function runModel(): mixed
    {
        return $this->model->{$this->getModelMethod()}();
    }
}
