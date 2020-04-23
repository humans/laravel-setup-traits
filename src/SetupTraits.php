<?php

namespace Humans\SetupTraits;

trait SetupTraits
{
    protected function setUpTraits()
    {
        $this->setupAdditionalTraits(
            parent::setUpTraits()
        );
    }

    protected function setupAdditionalTraits($uses)
    {
        foreach($uses as $trait) {
            $method = 'setup' . class_basename($trait);

            if (! method_exists($this, $method)) {
                continue;
            }

            call_user_func([$this, $method]);
        }
    }
}
