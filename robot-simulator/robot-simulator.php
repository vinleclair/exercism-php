<?php

class Robot
{
    const DIRECTION_NORTH = 0;
    const DIRECTION_EAST = 1;
    const DIRECTION_SOUTH = 2;
    const DIRECTION_WEST = 3;

    const DIRECTION = [
        Robot::DIRECTION_NORTH,
        Robot::DIRECTION_EAST,
        Robot::DIRECTION_SOUTH,
        Robot::DIRECTION_WEST,
    ];

    const ADVANCE = [
        Robot::DIRECTION_NORTH => [0, 1],
        Robot::DIRECTION_EAST => [1, 0],
        Robot::DIRECTION_SOUTH => [0, -1],
        Robot::DIRECTION_WEST => [-1, 0],
    ];

    public $position;
    public $direction;

    public function __construct(array $position, $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    public function turnRight(): Robot
    {
        return self::changeDirection(1);
    }

    public function turnLeft(): Robot
    {
        return self::changeDirection(-1);
    }

    private function changeDirection(int $turn) : Robot
    {
        $this->direction = Robot::DIRECTION[(4 + ($this->direction + $turn) % 4) % 4];

        return $this;
    }

    public function advance() : Robot
    {
        $advance = Robot::ADVANCE[$this->direction];
        $this->position = [
            $this->position[0] + $advance[0],
            $this->position[1] + $advance[1],
        ];

        return $this;
    }

    public function instructions(string $input)
    {
        $instructions = str_split($input);

        foreach ($instructions as $instruction) {
            switch ($instruction) {
                case 'A':
                    self::advance();
                    break;
                case 'R':
                    self::turnRight();
                    break;
                case 'L':
                    self::turnLeft();
                    break;
                default:
                    throw new InvalidArgumentException('Malformed Instructions');
            }
        }
    }

}
