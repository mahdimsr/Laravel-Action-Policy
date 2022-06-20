<?php

use Msr\ActionPolicy\Tests\assets\TestModel;
use Msr\ActionPolicy\Tests\assets\TestPolicy;

it('return ActionPolicyBuilder instance from builder method', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder();

    $this->assertInstanceOf(\Msr\ActionPolicy\ActionPolicyBuilder::class, $actionPolicyBuilderInstance);
});

it('return ActionPolicy instance from build method of builder', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder();

    $this->assertInstanceOf(\Msr\ActionPolicy\ActionPolicy::class, $actionPolicyBuilderInstance->build());
});

it('set model of ActionPolicy model attribute', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder()->model(new TestModel());

    $this->assertInstanceOf(TestModel::class, $actionPolicyBuilderInstance->build()->getModel());
});

it('set policy instance of ActionPolicy policy attribute', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder()->policy(new TestPolicy());

    $this->assertInstanceOf(TestPolicy::class, $actionPolicyBuilderInstance->build()->getpolicy());
});

it('set policy string class of ActionPolicy policy attribute', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder()->policy(TestPolicy::class);

    $this->assertEquals(TestPolicy::class, $actionPolicyBuilderInstance->build()->getpolicy());
});
