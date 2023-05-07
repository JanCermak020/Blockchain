<?php
require_once "block.php";
require_once "chain.php";
$ch = (new Chain)
    ->addBlock(new Block("Varnsdorf"))
    ->addBlock(new Block("Rumburk",1));
var_dump($ch);
echo "Chain " . ($ch->isValid() ? "is" : "is not") . " valid.\n";