<?php

require_once "Shape.php";

class Circle extends Shape
{
    const SHAPE_TYPE = 3;

    protected float $radius;
    public function __construct(float $radius)
    {
        $this->radius = $radius;
          parent::__construct($radius, $radius);
    }

    public function area(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function getFullDescription(): string
    {
        return "Circle<{$this->getId()}>: {$this->name} - {$this->radius}";
    }
}

?>