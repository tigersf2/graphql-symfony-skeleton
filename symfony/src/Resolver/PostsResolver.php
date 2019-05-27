<?php

namespace App\Resolver;


use App\Repository\PostRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class PostsResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var $postRepository
     **/
    private $postRepository;

    /**
     * PostsResolver constructor.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return \App\Entity\Post[]
     */
    public function resolve()
    {
        return $this->postRepository->findAll();
    }

    /**
     * Returns methods aliases.
     *
     * For instance:
     * array('myMethod' => 'myAlias')
     *
     * @return array
     */
    public static function getAliases()
    {
        return [
          'resolve' => 'Posts'
        ];
    }
}