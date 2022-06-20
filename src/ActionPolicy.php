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
    public ?string $modelMethod = null;
    public array  $modelArguments;

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

    public function getModelMethod(): ?string
    {
        return $this->modelMethod;
    }

    public function getPolicyArguments(): array
    {
        return $this->policyArguments;
    }

    public function getModelArgument(): array
    {
        return $this->modelArguments;
    }

    public function runPolicy(): Response
    {
        return call_user_func_array([$this->getPolicy(),$this->getPolicyMethod()], $this->getPolicyArguments());
    }

    public function runModel(): mixed
    {
        return call_user_func_array([$this->getModel(),$this->getModelMethod()], $this->getModelArgument());
    }

    public function run(): Response
    {
        if ($this->runPolicy()->allowed() and $this->getModelMethod() !== null) {
            $this->runModel();
        }

        return $this->runPolicy();
    }
}
