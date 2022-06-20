<?php

use Msr\ActionPolicy\ActionPolicy;
use Msr\ActionPolicy\Tests\assets\TestModel;
use Msr\ActionPolicy\Tests\assets\TestPolicy;

it('run model method if policy allowed', function () {
    $response = ActionPolicy::builder()->model(TestModel::class)
                                      ->modelMethod('setName')
                                      ->policy(TestPolicy::class)
                                      ->policyMethod('canSetJohn', 'John')
                                      ->build()
                                      ->run();

    $this->assertTrue($response->allowed());
});

it('denied to run model method', function () {
    $response = ActionPolicy::builder()->model(TestModel::class)
                                      ->modelMethod('setName')
                                      ->policy(TestPolicy::class)
                                      ->policyMethod('canSetJohn', 'Carl')
                                      ->build()
                                      ->run();

    $this->assertTrue($response->denied());
});

it('get allowed response from run method with out model', function () {
    $response = ActionPolicy::builder()->policy(TestPolicy::class)->policyMethod('canSetJohn', 'John')->build()->run();

    $this->assertTrue($response->allowed());
});

it('get denied response from run method with out model', function () {
    $response = ActionPolicy::builder()->policy(TestPolicy::class)->policyMethod('canSetJohn', 'Ross')->build()->run();

    $this->assertTrue($response->denied());
});
