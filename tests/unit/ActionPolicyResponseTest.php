<?php

use Msr\ActionPolicy\ActionPolicy;
use Msr\ActionPolicy\Tests\assets\TestModel;
use Msr\ActionPolicy\Tests\assets\TestPolicy;

it('get Response policy function', function () {
    $response = ActionPolicy::builder()->policy(TestPolicy::class)->policyMethod('canSetName')->build()->runPolicy();

    $this->assertInstanceOf(\Illuminate\Auth\Access\Response::class, $response);
});

it('get allowed Response policy function with one argument', function () {
    $response = ActionPolicy::builder()->policy(TestPolicy::class)->policyMethod('canSetJohn', 'John')->build()->runPolicy();

    $this->assertTrue($response->allowed());
});

it('get denied Response policy function with one argument', function () {
    $response = ActionPolicy::builder()->policy(TestPolicy::class)->policyMethod('canSetJohn', 'Max')->build()->runPolicy();

    $this->assertTrue($response->denied());
});

it('get denied Response policy function with some arguments', function () {
    $response = ActionPolicy::builder()->policy(TestPolicy::class)->policyMethod('canBeFriend', 'Max', 'Peter', 'Alex')->build()->runPolicy();

    $this->assertTrue($response->allowed());
});

it('run model function', function () {
    $response = ActionPolicy::builder()->model(TestModel::class)->modelMethod('setName')->build()->runModel();

    $this->assertEquals(null, $response);
});

it('run model function with one Argument', function () {
    $response = ActionPolicy::builder()->model(TestModel::class)->modelMethod('setName', 'Gwen')->build()->runModel();

    $this->assertEquals('Gwen', $response);
});

it('run model function with some Arguments', function () {
    $response = ActionPolicy::builder()->model(TestModel::class)->modelMethod('makeFriends', 'Gwen', 'Parker')->build()->runModel();

    $this->assertEquals('Gwen Parker', $response);
});
