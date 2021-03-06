<?php

namespace App\Social;

class SocialNetworkSender implements SocialNetworkInterface
{
    private $socialNetworkSenders = [];

    public function addSocialNetworkSenders(ShareContentInterface $socialNetworkSender)
    {
        $this->socialNetworkSenders[] = $socialNetworkSender;
    }

    public function postContent(string $content, string $media)
    {
        foreach ($this->socialNetworkSenders as $socialNetworkSender) {
            /* @var ShareContentInterface $socialNetworkSender */
            if($socialNetworkSender->support($media)){
                $socialNetworkSender->postContent($content);
            }
        }
    }
}