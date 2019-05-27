<?php

namespace App\Mutation;

use App\Entity\Grade;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;
use App\Entity\Astronaut;

final class AstronautMutation implements MutationInterface, AliasedInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function resolve(string $pseudo, int $grade_id)
    {
        $astronaut = new Astronaut();
        $astronaut->setPseudo($pseudo);
        $grade = $this->em->getRepository(Grade::class)->find($grade_id);
        $astronaut->setGrade($grade);

        $this->em->persist($astronaut);
        $this->em->flush();

        return ['content' => 'ok'];
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'NewAstronaut',
        ];
    }
}