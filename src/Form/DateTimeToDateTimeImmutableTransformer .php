<?php

namespace App\Form;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class DateTimeToDateTimeImmutableTransformer implements DataTransformerInterface
{
    public function transform($dateTimeImmutable)
    {
        if (null === $dateTimeImmutable) {
            return;
        }

        if (!$dateTimeImmutable instanceof \DateTimeImmutable) {
            throw new TransformationFailedException('Expected a \DateTimeImmutable.');
        }

        return \DateTime::createFromFormat('U', $dateTimeImmutable->format('U'));
    }

    public function reverseTransform($dateTime)
    {
        if (null === $dateTime) {
            return;
        }

        if (!$dateTime instanceof \DateTime) {
            throw new TransformationFailedException('Expected a \DateTime.');
        }

        return \DateTimeImmutable::createFromFormat('U', $dateTime->format('U'));
    }
}
