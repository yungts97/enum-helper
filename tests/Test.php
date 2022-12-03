<?php

use PHPUnit\Framework\TestCase;
use Yungts97\EnumHelpers\Tests\Enums\Size;
use Yungts97\EnumHelpers\Tests\Enums\Status;
use Yungts97\EnumHelpers\Tests\Enums\SwitchStatus;
use Yungts97\EnumHelpers\Exceptions\ExceedMaxSizeError;
use Yungts97\EnumHelpers\Exceptions\UndefinedCaseError;

class StackTest extends TestCase
{
    public function test_it_can_get_random_enum(): void
    {
        //UnitEnum
        $this->assertCount(2, Size::random(2));
        $this->assertTrue(Size::random(1) instanceof Size);
        $this->assertTrue(Size::random() instanceof Size);

        //BackedEnum (string)
        $this->assertCount(2, Status::random(2));
        $this->assertTrue(Status::random(1) instanceof Status);
        $this->assertTrue(Status::random() instanceof Status);

        //BackedEnum (int)
        $this->assertCount(2, SwitchStatus::random(2));
        $this->assertTrue(SwitchStatus::random(1) instanceof SwitchStatus);
        $this->assertTrue(SwitchStatus::random() instanceof SwitchStatus);

        // Expected Exception on random()
        $this->expectException(ExceedMaxSizeError::class);
        Status::random(7);
    }

    public function test_it_can_invoke_enum(): void
    {
        //UnitEnum
        $this->assertEquals(Size::Small->name, Size::Small());
        $this->assertEquals(Size::Medium->name, Size::Medium());
        $this->assertEquals(Size::Large->name, Size::Large());
        $this->assertEquals(Size::ExtraLarge->name, Size::ExtraLarge());

        //BackedEnum (string)
        $this->assertEquals(Status::Draft->value, Status::Draft());
        $this->assertEquals(Status::Submitted->value, Status::Submitted());
        $this->assertEquals(Status::Pending->value, Status::Pending());
        $this->assertEquals(Status::Approved->value, Status::Approved());
        $this->assertEquals(Status::Rejected->value, Status::Rejected());

        //BackedEnum (int)
        $this->assertEquals(SwitchStatus::On->value, SwitchStatus::On());
        $this->assertEquals(SwitchStatus::Off->value, SwitchStatus::Off());

        // Expected Exception
        $this->expectException(UndefinedCaseError::class);
        Status::Refund();
    }

    public function test_it_can_check_enum_contain(): void
    {
        //UnitEnum
        $this->assertTrue(Size::contains('Small'));
        $this->assertTrue(Size::contains(Size::Small));
        $this->assertTrue(Size::contains(Size::Small()));

        // BackedEnum (string)
        $this->assertTrue(Status::contains("submitted"));
        $this->assertTrue(Status::contains(Status::Submitted));
        $this->assertTrue(Status::contains(Status::Submitted()));

        // BackedEnum (int)
        $this->assertTrue(SwitchStatus::contains(0));
        $this->assertTrue(SwitchStatus::contains(1));
        $this->assertTrue(SwitchStatus::contains(SwitchStatus::On));
        $this->assertTrue(SwitchStatus::contains(SwitchStatus::On()));
    }
}
