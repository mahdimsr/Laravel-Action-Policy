<?php

namespace Msr\ActionPolicy;

use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class ActionPolicy
{
    public Model $model;
    public object $policy;
    public string $policyMethod;
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

    public function runPolicy(): Response
    {
        return $this->getPolicy()->{$this->getPolicyMethod()}();
    }
}
