<?php

namespace OneToMany\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class MailtoExtension extends AbstractExtension
{

    public function __construct()
    {
        if (!extension_loaded('filter')) {
            // throw new \Exception("The Date Twig extension requires the 'intl' PHP extension.");
        }
    }

    /**
     * @return list<TwigFunction>
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('mailto', [$this, 'generateMailto']),
        ];
    }

    public function generateMailto(
        string $email,
        string $subject = '',
        string $content = '',
    ): string
    {
        $email = strtolower(trim($email));

        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(sprintf('The email address "%s" is invalid.', $email));
        }

        $query = [];

        if (strlen($subject = trim($subject))) {
            $query['subject'] = $subject;
        }

        if (strlen($content = trim($content))) {
            $query['body'] = $content;
        }

        if (0 === count($query)) {
            return sprintf('mailto:%s', $email);
        }

        return sprintf('mailto:%s?%s', $email, http_build_query($query, '', null, PHP_QUERY_RFC3986));
    }

}
