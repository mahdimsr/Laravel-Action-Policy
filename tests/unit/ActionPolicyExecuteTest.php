<?php

use Msr\ActionPolicy\ActionPolicy;
use Msr\ActionPolicy\Tests\assets\TestModel;
use Msr\ActionPolicy\Tests\assets\TestPolicy;

it('get Response policy function', function () {
    $response = ActionPolicy::builder()->policy(TestPolicy::class)->policyMethod('canSetName')->build()->runPolicy();

    $this->assertInstanceOf(\Illuminate\Auth\Access\Response::class, $response);
});

it('run model function', function () {
    $response = ActionPolicy::builder()->model(TestModel::class)->modelMethod('setName')->build()->runModel();

    $this->assertEquals(null, $response);
});
