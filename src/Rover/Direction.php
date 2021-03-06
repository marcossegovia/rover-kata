<?php

namespace Kata\Rover;

final class Direction
{
    public const NORTH = 'n';
    public const SOUTH = 's';
    public const EAST = 'e';
    public const WEST = 'w';

    public const DIRECTIONS = [
        self::NORTH => [
            'right' => self::EAST,
            'left' => self::WEST
        ],
        self::EAST => [
            'right' => self::SOUTH,
            'left' => self::NORTH
        ],
        self::SOUTH => [
            'right' => self::WEST,
            'left' => self::EAST
        ],
        self::WEST => [
            'right' => self::NORTH,
            'left' => self::SOUTH
        ]
    ];

    private $direction;

    private function __construct(string $direction)
    {
        $this->direction = $direction;
    }

    public static function north(): Direction
    {
        return new self(self::NORTH);
    }

    public static function south(): Direction
    {
        return new self(self::SOUTH);
    }

    public static function east(): Direction
    {
        return new self(self::EAST);
    }

    public static function west(): Direction
    {
        return new self(self::WEST);
    }

    public function turnRight(): Direction
    {
        return new Direction(self::DIRECTIONS[$this->direction]['right']);
    }

    public function turnLeft(): Direction
    {
        return new Direction(self::DIRECTIONS[$this->direction]['left']);
    }

    public function direction(): string
    {
        return $this->direction;
    }

    public function inverseDirection(): Direction
    {
        if ($this->equals(self::north())) {
            return self::south();
        }
        if ($this->equals(self::east())) {
            return self::west();
        }
        if ($this->equals(self::south())) {
            return self::north();
        }
        if ($this->equals(self::west())) {
            return self::east();
        }
    }

    private function equals(Direction $a_direction): bool
    {
        if ($this->direction === $a_direction->direction()) {
            return true;
        }

        return false;
    }
}
