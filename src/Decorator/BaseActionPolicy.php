<?php

namespace Msr\ActionPolicy\Decorator;

use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;
use Msr\ActionPolicy\Decorator\Interfaces\ModelAction;
use Msr\ActionPolicy\Decorator\Interfaces\PolicyAction;
use phpDocumentor\Reflection\Types\Object_;

abstract class BaseActionPolicy implements ModelAction, PolicyAction
{
    private Model  $model;
    private ?string $modelMethod = null;
    public array $modelArguments;

    private object $policy;
    private ?string $policyMethod;
    private array $policyArguments;

    abstract public function run(): Response;

    public function setModel(Model|string $model): void
    {
        $this->model = $model instanceof Model ? $model : new $model();
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setModelMethod(string $method, ...$arguments): void
    {
        $this->modelMethod = $method;
        $this->modelArguments = $arguments;
    }

    public function getModelMethod(): ?string
    {
        return $this->modelMethod;
    }

    public function getModelArguments(): array
    {
        return $this->modelArguments;
    }

    public function runModel(): mixed
    {
        return call_user_func_array([$this->getModel(),$this->getModelMethod()], $this->getModelArguments());
    }

    public function setPolicy(object|string $policyClass): void
    {
        $this->policy = $policyClass instanceof Object_ ? $policyClass : new $policyClass();
    }

    public function getPolicy(): object
    {
        return $this->policy;
    }

    public function setPolicyMethod(string $method, ...$arguments): void
    {
        $this->policyMethod = $method;
        $this->policyArguments = $arguments;
    }

    public function getPolicyMethod(): string
    {
        return $this->policyMethod;
    }

    public function getPolicyArguments(): array
    {
        return $this->policyArguments;
    }

    public function runPolicy(): Response
    {
        return call_user_func_array([$this->getPolicy(),$this->getPolicyMethod()], $this->getPolicyArguments());
    }
}
