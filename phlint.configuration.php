<?php

return function ($phlint) {

  // Autoload composer dependencies.
  $phlint[] = new \phlint\autoload\Composer(__dir__ . '/composer.json');

  // Include a path to be analyzed.
  $phlint->addPath(__dir__ . '/action');

};
