<?php

namespace Msr\ActionPolicy\Decorator;

use Illuminate\Database\Eloquent\Model;
use Msr\ActionPolicy\Decorator\Interfaces\ModelAction;

abstract class BaseActionPolicy implements ModelAction
{
    private Model  $model;
    private ?string $modelMethod = null;
    public array $modelArguments;

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
}
