<?php

it('return ActionPolicyBuilder instance from builder method', function () {
    $actionPolicyInstance = \Msr\ActionPolicy\ActionPolicy::builder();

    \PHPUnit\Framework\assertInstanceOf(\Msr\ActionPolicy\ActionPolicy::class, $actionPolicyInstance);
});
