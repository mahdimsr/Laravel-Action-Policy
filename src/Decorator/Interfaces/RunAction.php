<?php

namespace Msr\ActionPolicy\Decorator\Interfaces;

use Illuminate\Auth\Access\Response;

interface RunAction
{
    public function runModel(): mixed;

    public function runPolicy(): Response;

    public function run(): Response;
}
