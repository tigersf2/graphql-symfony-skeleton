<?php

namespace App\Social;

interface ShareContentInterface
{
    public function postContent(string $message): void;
    public function support(string $media): bool;
}