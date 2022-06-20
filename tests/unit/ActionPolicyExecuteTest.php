<?php

use Msr\ActionPolicy\ActionPolicy;
use Msr\ActionPolicy\Tests\assets\TestPolicy;

it('get Response policy function', function () {
    $response = ActionPolicy::builder()->policy(TestPolicy::class)->policyMethod('canSetName')->build()->runPolicy();

    $this->assertInstanceOf(\Illuminate\Auth\Access\Response::class, $response);
});
