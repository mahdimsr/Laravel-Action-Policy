<?php

namespace Msr\ActionPolicy\Tests\assets;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    public function setName(?string $name = null): ?string
    {
        return $name;
    }
}
