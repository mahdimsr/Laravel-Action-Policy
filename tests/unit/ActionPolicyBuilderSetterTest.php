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

it('set model instance of ActionPolicy model attribute', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder()->model(new TestModel());

    $this->assertInstanceOf(TestModel::class, $actionPolicyBuilderInstance->build()->getModel());
});

it('set model string class of ActionPolicy model attribute', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder()->model(TestModel::class);

    $this->assertInstanceOf(TestModel::class, $actionPolicyBuilderInstance->build()->getModel());
});

it('set policy instance of ActionPolicy policy attribute', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder()->policy(new TestPolicy());

    $this->assertInstanceOf(TestPolicy::class, $actionPolicyBuilderInstance->build()->getpolicy());
});

it('set policy string class of ActionPolicy policy attribute', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder()->policy(TestPolicy::class);

    $this->assertInstanceOf(TestPolicy::class, $actionPolicyBuilderInstance->build()->getpolicy());
});

it('set policy method of ActionPolicy policyMethod attribute', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder()->policyMethod('canSetName');

    $this->assertEquals('canSetName', $actionPolicyBuilderInstance->build()->getpolicyMethod());
});

it('set model method of ActionPolicy model modelMethod attribute', function () {
    $actionPolicyBuilderInstance = \Msr\ActionPolicy\ActionPolicy::builder()->modelMethod('setName');

    $this->assertEquals('setName', $actionPolicyBuilderInstance->build()->getmodelMethod());
});
