<?php

namespace Reflection\Classes;

class JiraTicket extends Ticket
{
    private int $story_points;
    private string $priority;

    /**
     * @param string $priority
     */
    public function setPriority(string $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @param int $story_points
     */
    public function setStoryPoints(int $story_points): void
    {
        $this->story_points = $story_points;
    }

    /**
     * @return string
     */
    public function getPriority(): string
    {
        return $this->priority;
    }

    /**
     * @return int
     */
    public function getStoryPoints(): int
    {
        return $this->story_points;
    }
}