<?php
/**
 * Created by PhpStorm.
 * User: Aviscii
 * Date: 2018. 10. 22.
 * Time: 0:30
 */

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

abstract class BaseRepository extends ServiceEntityRepository {

	/**
	 * It stores the class of the entity this repository handles
	 * @var string
	 */
	private $type;

	public function __construct(RegistryInterface $registry, string $entityClass) {
		$this->type = $entityClass;
		parent::__construct($registry, $entityClass);
	}

	public function save($entity) {
		if (!($entity instanceof $this->type)) {
			throw new \TypeError("The repository only manages $this->type, " . get_class($entity) . " is given.");
		}
		$this->_em->persist($entity);
		$this->_em->flush();
	}

	public function saveAll(\ArrayAccess $entities) {
		foreach($entities as $entity) {
			if (!($entity instanceof $this->type)) {
				throw new \TypeError("The repository only manages $this->type, " . get_class($entity) . " is given.");
			}
			$this->_em->persist($entity);
		}
		$this->_em->flush();
	}

	public function delete($entity) {
		if (!($entity instanceof $this->type)) {
			throw new \TypeError("The repository only manages $this->type, " . get_class($entity) . " is given.");
		}
		$this->_em->remove($entity);
		$this->_em->flush();
	}
}