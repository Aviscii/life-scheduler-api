<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DeadlineTaskRepository")
 */
class DeadlineTask {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
	 *
	 * @var integer
     */
    private $id;

    /**
	 * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
	 * 
	 * @var string|null
     */
    private $name;

    /**
	 * @Assert\GreaterThan(0)
     * @ORM\Column(type="integer")
	 *
	 * @var integer
     */
    private $duration;

	/**
	 * @Assert\GreaterThanOrEqual("+1 hours")
	 * @ORM\Column(type="datetime")
	 *
	 * @var \DateTime|null
	 */
	private $deadline;

    /**
     * @ORM\Column(type="text", nullable=true)
	 *
	 * @var string|null
     */
    private $description;

	/**
	 * @ORM\Column(type="boolean")
	 *
	 * @var bool
	 */
    private $done;

	/**
	 * @return int
	 */
	public function getId(): ?int {
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId(int $id): void {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void {
		$this->name = $name;
	}

	/**
	 * @return \DateTime
	 */
	public function getDeadline(): ?\DateTime {
		return $this->deadline;
	}

	/**
	 * @param \DateTime $deadline
	 */
	public function setDeadline(\DateTime $deadline): void {
		$this->deadline = $deadline;
	}

	/**
	 * @return int
	 */
	public function getDuration(): ?int {
		return $this->duration;
	}

	/**
	 * @param int $duration
	 */
	public function setDuration(int $duration): void {
		$this->duration = $duration;
	}

	/**
	 * @return string
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description): void {
		$this->description = $description;
	}

	/**
	 * @return bool
	 */
	public function isDone(): ?bool {
		return $this->done;
	}

	/**
	 * @param bool $done
	 */
	public function setDone(bool $done): void {
		$this->done = $done;
	}
}
