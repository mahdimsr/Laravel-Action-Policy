<?php

namespace Msr\ActionPolicy\Decorator\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface ModelAction
{
    /**
     * set model class
     *
     * @param Model|string $model
     * @return void
     */
    public function setModel(Model|string $model): void;

    /**
     * get model class
     *
     * @return Model
     */
    public function getModel(): Model;

    /**
     * set model method and arguments
     *
     * @param string $method
     * @param        ...$arguments
     * @return void
     */
    public function setModelMethod(string $method, ...$arguments): void;

    /**
     * @return ?string
     */
    public function getModelMethod(): ?string;

    public function getModelArguments(): array;

    public function runModel(): mixed;
}
