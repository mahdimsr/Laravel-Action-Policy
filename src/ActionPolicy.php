<?php

namespace Msr\ActionPolicy;

use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;
use Msr\ActionPolicy\Decorator\BaseActionPolicy;

class ActionPolicy extends BaseActionPolicy
{
    public object $policy;
    public string $policyMethod;
    public array  $policyArguments;

    public function __construct()
    {
    }

    public static function builder(): ActionPolicyBuilder
    {
        return (new ActionPolicyBuilder(new self()));
    }

    public function getPolicy(): object
    {
        return $this->policy;
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

    public function runModel(): mixed
    {
        return call_user_func_array([$this->getModel(),$this->getModelMethod()], $this->getModelArguments());
    }

    public function run(): Response
    {
        if ($this->runPolicy()->allowed() and $this->getModelMethod() !== null) {
            $this->runModel();
        }

        return $this->runPolicy();
    }
}
