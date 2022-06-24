<?php

namespace Msr\ActionPolicy\Decorator\Interfaces;

use Illuminate\Auth\Access\Response;

interface PolicyAction
{
    public function setPolicy(object|string $policyClass): void;

    public function getPolicy(): object;

    public function setPolicyMethod(string $method, ...$arguments): void;

    public function getPolicyMethod(): string;

    public function getPolicyArguments(): array;

    public function runPolicy(): Response;
}
