<?php

namespace spec\App;

use App\CatImage;
use PhpSpec\ObjectBehavior;

/**
 * Class CatImageSpec
 * @package spec\App
 */
class CatImageSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CatImage::class);
    }
}
