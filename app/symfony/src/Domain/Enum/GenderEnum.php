<?php

declare(strict_types=1);

namespace App\Domain\Enum;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

enum GenderEnum: string implements TranslatableInterface
{
    case MAN = 'MAN';
    case WOMAN = 'WOMAN';

    /**
     * @return GenderEnum[]
     */
    public static function choices(): array
    {
        return [
            'form.gender.man' => self::MAN,
            'form.gender.woman' => self::WOMAN,
        ];
    }

    public function trans(TranslatorInterface $translator, ?string $locale = null): string
    {
        return $translator->trans($this->name, locale: $locale);
    }
}
