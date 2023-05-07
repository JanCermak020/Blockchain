<?php
require_once "IChain.php";
require_once "block.php";
class Chain implements IChain 
{
    private array $blocks;
    public function addBlock(Block $block): static{
        $this->blocks[]=$block;
        return $this;

    }
    public function getBlock(int $id): ?Block{
        return  $this->blocks[$id];
    }
    public function getLastBlock(): ?Block{
        return  end($this->blocks[]);
    }
    public function isValid(): bool{
        for ($i = 1; $i < count($this->blocks); $i++) {
            $currentBlock = $this->blocks[$i];
            $previousBlock = $this->blocks[$i-1];

            if ($currentBlock->get_hash != $currentBlock->generateHash()) {
                return false;
            }

            if ($currentBlock->previousHash != $previousBlock->get_hash) {
                return false;
            }
        }

        return true;
    }
}