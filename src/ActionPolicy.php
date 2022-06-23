<?php

namespace Msr\ActionPolicy;

use Illuminate\Auth\Access\Response;
use Msr\ActionPolicy\Decorator\BaseActionPolicy;

class ActionPolicy extends BaseActionPolicy
{

    public function __construct()
    {
    }

    public static function builder(): ActionPolicyBuilder
    {
        return (new ActionPolicyBuilder(new self()));
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
