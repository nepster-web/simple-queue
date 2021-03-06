<?php

declare(strict_types=1);

namespace Simple\QueueTest\Serializer;

use PHPUnit\Framework\TestCase;
use Simple\Queue\Serializer\BaseSerializer;
use Symfony\Component\Serializer\Serializer;
use Simple\Queue\Serializer\SymfonySerializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

/**
 * Class SerializerTest
 * @package Simple\QueueTest\Serializer
 */
class SerializerTest extends TestCase
{
    public function testBaseSerializer(): void
    {
        $baseSerializer = new BaseSerializer();

        $serialize = $baseSerializer->serialize(['my_data']);
        $deserialize = $baseSerializer->deserialize($serialize);

        self::assertEquals(serialize(['my_data']), $serialize);
        self::assertEquals(['my_data'], $deserialize);
    }

    public function testSymfonySerializer(): void
    {
        $serializer = new Serializer(
            [
            ],
            [
                new JsonEncoder(),
            ]
        );

        $symfonySerializer = new SymfonySerializer();

        $serialize = $symfonySerializer->serialize(['my_data']);
        $deserialize = $symfonySerializer->deserialize($serialize);

        self::assertEquals($serializer->serialize(['my_data'], JsonEncoder::FORMAT), $serialize);
        self::assertEquals(['my_data'], $deserialize);
    }
}
