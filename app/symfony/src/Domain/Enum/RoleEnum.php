<?php

declare(strict_types=1);

namespace App\Domain\Enum;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

enum RoleEnum: string implements TranslatableInterface
{
    case ROLE_USER = 'ROLE_USER';
    case ROLE_ADMIN = 'ROLE_ADMIN';
    case ROLE_AUDITOR = 'ROLE_AUDITOR';
    case ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';

    public function trans(TranslatorInterface $translator, ?string $locale = null): string
    {
        return $translator->trans($this->name, locale: $locale);
    }
}
