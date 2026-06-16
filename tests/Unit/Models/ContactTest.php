<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use Modules\Notify\Models\Contact;
use Modules\Notify\Tests\TestCase;
use Modules\Notify\Database\Factories\ContactFactory;
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
$this->disableExceptionHandling();
});

describe('Contact', function (): void {
    test('_can_create_contact', function (): void {
        /** @var \Modules\Notify\Tests\TestCase $this */
$contact = ContactFactory::new()->createOne([
=======
use Modules\Notify\Models\Contact;
use Modules\Notify\Tests\TestCase;

class ContactTest extends TestCase
{
    // DatabaseTransactions is already used in the module TestCase

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function it_can_create_contact(): void
    {
        $contact = Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'test@example.com',
            'user_id' => '456',
            'verified_at' => now(),
            'token' => 'verification-token-123',
            'sms_sent_at' => now(),
            'sms_count' => 1,
            'mail_sent_at' => now(),
            'mail_count' => 2,
            'survey_pdf_id' => 'pdf-789',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'mobile_phone' => '+393331234567',
            'attribute_1' => 'Company',
            'attribute_2' => 'Manager',
            'attribute_3' => 'Department',
            'attribute_4' => 'Location',
            'attribute_5' => 'Notes',
            'usesleft' => '5',
            'sms_status_code' => '200',
            'sms_status_txt' => 'Delivered',
            'duplicate_count' => 0,
            'order_column' => 1,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('contacts', [
=======

        $this->assertDatabaseHas('contacts', [
>>>>>>> 929ed821d (.)
            'id' => $contact->id,
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'test@example.com',
            'user_id' => '456',
            'token' => 'verification-token-123',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'mobile_phone' => '+393331234567',
            'attribute_1' => 'Company',
            'attribute_2' => 'Manager',
            'attribute_3' => 'Department',
            'attribute_4' => 'Location',
            'attribute_5' => 'Notes',
            'usesleft' => '5',
            'sms_status_code' => '200',
            'sms_status_txt' => 'Delivered',
            'duplicate_count' => 0,
            'order_column' => 1,
        ]);

<<<<<<< HEAD
        Assert::assertInstanceOf(Contact::class, $contact);
    });

    test('_has_correct_fillable_fields', function (): void {
$contact = new Contact;
=======
        $this->assertInstanceOf(Contact::class, $contact);
    }

    /** @test */
    public function it_has_correct_fillable_fields(): void
    {
        $contact = new Contact;
>>>>>>> 929ed821d (.)

        $expectedFillable = [
            'model_id',
            'model_type',
            'contact_type',
            'value',
            'verified_at',
            'updated_at',
            'created_at',
            'updated_by',
            'created_by',
            'user_id',
            'token',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedFillable, $contact->getFillable());
    });

    test('_has_correct_casts', function (): void {
$contact = new Contact;
=======
        $this->assertEquals($expectedFillable, $contact->getFillable());
    }

    /** @test */
    public function it_has_correct_casts(): void
    {
        $contact = new Contact;
>>>>>>> 929ed821d (.)

        $expectedCasts = [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'model_id' => 'string',
            'user_id' => 'string',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedCasts, $contact->getCasts());
    });

    test('_can_store_contact_with_minimal_fields', function (): void {
$contact = ContactFactory::new()->createOne([
=======
        $this->assertEquals($expectedCasts, $contact->casts());
    }

    /** @test */
    public function it_can_store_contact_with_minimal_fields(): void
    {
        $contact = Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'phone',
            'value' => '+393331234567',
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('contacts', [
=======

        $this->assertDatabaseHas('contacts', [
>>>>>>> 929ed821d (.)
            'id' => $contact->id,
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'phone',
            'value' => '+393331234567',
        ]);

<<<<<<< HEAD
        Assert::assertInstanceOf(Contact::class, $contact);
    });

    test('_can_store_contact_with_all_attributes', function (): void {
$contact = ContactFactory::new()->createOne([
=======
        $this->assertInstanceOf(Contact::class, $contact);
    }

    /** @test */
    public function it_can_store_contact_with_all_attributes(): void
    {
        $contact = Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\Company',
            'model_id' => '789',
            'contact_type' => 'email',
            'value' => 'info@company.com',
            'user_id' => '456',
            'verified_at' => now(),
            'token' => 'verification-token-456',
            'sms_sent_at' => now(),
            'sms_count' => 3,
            'mail_sent_at' => now(),
            'mail_count' => 5,
            'survey_pdf_id' => 'pdf-456',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@company.com',
            'mobile_phone' => '+393339876543',
            'attribute_1' => 'Position',
            'attribute_2' => 'Senior Manager',
            'attribute_3' => 'IT Department',
            'attribute_4' => 'Milan Office',
            'attribute_5' => 'Technical Lead',
            'attribute_6' => 'Project A',
            'attribute_7' => 'Team B',
            'attribute_8' => 'Budget 100k',
            'attribute_9' => 'Deadline Q1',
            'attribute_10' => 'Priority High',
            'attribute_11' => 'Status Active',
            'attribute_12' => 'Category Premium',
            'attribute_13' => 'Region North',
            'attribute_14' => 'Zone Central',
            'usesleft' => '10',
            'sms_status_code' => '201',
            'sms_status_txt' => 'Queued',
            'duplicate_count' => 1,
            'order_column' => 2,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('contacts', [
=======

        $this->assertDatabaseHas('contacts', [
>>>>>>> 929ed821d (.)
            'id' => $contact->id,
            'model_type' => 'App\Models\Company',
            'model_id' => '789',
            'contact_type' => 'email',
            'value' => 'info@company.com',
            'user_id' => '456',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@company.com',
            'mobile_phone' => '+393339876543',
            'attribute_1' => 'Position',
            'attribute_2' => 'Senior Manager',
            'attribute_3' => 'IT Department',
            'attribute_4' => 'Milan Office',
            'attribute_5' => 'Technical Lead',
            'attribute_6' => 'Project A',
            'attribute_7' => 'Team B',
            'attribute_8' => 'Budget 100k',
            'attribute_9' => 'Deadline Q1',
            'attribute_10' => 'Priority High',
            'attribute_11' => 'Status Active',
            'attribute_12' => 'Category Premium',
            'attribute_13' => 'Region North',
            'attribute_14' => 'Zone Central',
            'usesleft' => '10',
            'sms_status_code' => '201',
            'sms_status_txt' => 'Queued',
            'duplicate_count' => 1,
            'order_column' => 2,
        ]);
<<<<<<< HEAD
    });

    test('_can_update_contact', function (): void {
$contact = ContactFactory::new()->createOne([
=======
    }

    /** @test */
    public function it_can_update_contact(): void
    {
        $contact = Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'old@example.com',
            'first_name' => 'Old Name',
            'last_name' => 'Old Surname',
            'email' => 'old.email@example.com',
            'mobile_phone' => '+393330000000',
        ]);

        $contact->update([
            'value' => 'new@example.com',
            'first_name' => 'New Name',
            'last_name' => 'New Surname',
            'email' => 'new.email@example.com',
            'mobile_phone' => '+393331111111',
            'verified_at' => now(),
            'token' => 'new-token-123',
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('contacts', [
=======

        $this->assertDatabaseHas('contacts', [
>>>>>>> 929ed821d (.)
            'id' => $contact->id,
            'value' => 'new@example.com',
            'first_name' => 'New Name',
            'last_name' => 'New Surname',
            'email' => 'new.email@example.com',
            'mobile_phone' => '+393331111111',
        ]);

<<<<<<< HEAD
        Assert::assertNotNull($this->freshModel($contact, Contact::class)->verified_at);
        Assert::assertEquals('new-token-123', $this->freshModel($contact, Contact::class)->token);
    });

    test('_can_find_by_model_type_and_id', function (): void {
$contact = ContactFactory::new()->createOne([
=======
        $this->assertNotNull($contact->fresh()->verified_at);
        $this->assertEquals('new-token-123', $contact->fresh()->token);
    }

    /** @test */
    public function it_can_find_by_model_type_and_id(): void
    {
        $contact = Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'test@example.com',
        ]);

        $foundContact = Contact::where('model_type', 'App\Models\User')->where('model_id', '123')->first();

<<<<<<< HEAD
        Assert::assertNotNull($foundContact);
        Assert::assertEquals($contact->id, $foundContact->id);
        Assert::assertEquals('App\Models\User', $foundContact->model_type);
        Assert::assertEquals('123', $foundContact->model_id);
    });

    test('_can_find_by_contact_type', function (): void {
ContactFactory::new()->createOne([
=======
        $this->assertNotNull($foundContact);
        $this->assertEquals($contact->id, $foundContact->id);
        $this->assertEquals('App\Models\User', $foundContact->model_type);
        $this->assertEquals('123', $foundContact->model_id);
    }

    /** @test */
    public function it_can_find_by_contact_type(): void
    {
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'email@example.com',
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '456',
            'contact_type' => 'phone',
            'value' => '+393331234567',
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\Company',
            'model_id' => '789',
            'contact_type' => 'email',
            'value' => 'company@example.com',
        ]);

        $emailContacts = Contact::where('contact_type', 'email')->get();
        $phoneContacts = Contact::where('contact_type', 'phone')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $emailContacts);
        Assert::assertCount(1, $phoneContacts);
        Assert::assertEquals('email', $this->firstModel($emailContacts, Contact::class)->contact_type);
        Assert::assertEquals('phone', $this->firstModel($phoneContacts, Contact::class)->contact_type);
    });

    test('_can_find_by_user_id', function (): void {
ContactFactory::new()->createOne([
=======
        $this->assertCount(2, $emailContacts);
        $this->assertCount(1, $phoneContacts);
        $this->assertEquals('email', $emailContacts[0]->contact_type);
        $this->assertEquals('phone', $phoneContacts[0]->contact_type);
    }

    /** @test */
    public function it_can_find_by_user_id(): void
    {
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'user1@example.com',
            'user_id' => '456',
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '789',
            'contact_type' => 'phone',
            'value' => '+393331234567',
            'user_id' => '456',
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\Company',
            'model_id' => '101',
            'contact_type' => 'email',
            'value' => 'company@example.com',
            'user_id' => '789',
        ]);

        $user456Contacts = Contact::where('user_id', '456')->get();
        $user789Contacts = Contact::where('user_id', '789')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $user456Contacts);
        Assert::assertCount(1, $user789Contacts);
        Assert::assertEquals('456', $this->firstModel($user456Contacts, Contact::class)->user_id);
        $secondUserContact = $user456Contacts->get(1);
        Assert::assertInstanceOf(Contact::class, $secondUserContact);
        Assert::assertEquals('456', $secondUserContact->user_id);
        Assert::assertEquals('789', $this->firstModel($user789Contacts, Contact::class)->user_id);
    });

    test('_can_find_by_email', function (): void {
$contact = ContactFactory::new()->createOne([
=======
        $this->assertCount(2, $user456Contacts);
        $this->assertCount(1, $user789Contacts);
        $this->assertEquals('456', $user456Contacts[0]->user_id);
        $this->assertEquals('456', $user456Contacts[1]->user_id);
        $this->assertEquals('789', $user789Contacts[0]->user_id);
    }

    /** @test */
    public function it_can_find_by_email(): void
    {
        $contact = Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'test@example.com',
            'email' => 'test@example.com',
        ]);

        $foundContact = Contact::where('email', 'test@example.com')->first();

<<<<<<< HEAD
        Assert::assertNotNull($foundContact);
        Assert::assertInstanceOf(Contact::class, $foundContact);
        Assert::assertEquals($contact->id, $foundContact->id);
        Assert::assertEquals('test@example.com', $foundContact->value);
    });

    test('_can_find_by_mobile_phone', function (): void {
$contact = ContactFactory::new()->createOne([
=======
        $this->assertNotNull($foundContact);
        $this->assertEquals($contact->id, $foundContact->id);
        $this->assertEquals('test@example.com', $foundContact->email);
    }

    /** @test */
    public function it_can_find_by_mobile_phone(): void
    {
        $contact = Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'phone',
            'value' => '+393331234567',
            'mobile_phone' => '+393331234567',
        ]);

        $foundContact = Contact::where('mobile_phone', '+393331234567')->first();

<<<<<<< HEAD
        Assert::assertNotNull($foundContact);
        Assert::assertInstanceOf(Contact::class, $foundContact);
        Assert::assertEquals($contact->id, $foundContact->id);
        Assert::assertEquals('+393331234567', $foundContact->value);
    });

    test('_can_find_by_name_pattern', function (): void {
ContactFactory::new()->createOne([
=======
        $this->assertNotNull($foundContact);
        $this->assertEquals($contact->id, $foundContact->id);
        $this->assertEquals('+393331234567', $foundContact->mobile_phone);
    }

    /** @test */
    public function it_can_find_by_name_pattern(): void
    {
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'john@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '456',
            'contact_type' => 'email',
            'value' => 'jane@example.com',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '789',
            'contact_type' => 'email',
            'value' => 'bob@example.com',
            'first_name' => 'Bob',
            'last_name' => 'Johnson',
        ]);

        $johnContacts = Contact::where('first_name', 'like', '%John%')->get();
        $doeContacts = Contact::where('last_name', 'like', '%Doe%')->get();
        $jContacts = Contact::where('first_name', 'like', 'J%')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $johnContacts);
        Assert::assertCount(1, $doeContacts);
        Assert::assertCount(2, $jContacts); // John and Jane
        Assert::assertEquals('John', $this->firstModel($johnContacts, Contact::class)->first_name);
        Assert::assertEquals('Doe', $this->firstModel($doeContacts, Contact::class)->last_name);
    });

    test('_can_find_by_token', function (): void {
$contact = ContactFactory::new()->createOne([
=======
        $this->assertCount(1, $johnContacts);
        $this->assertCount(1, $doeContacts);
        $this->assertCount(2, $jContacts); // John and Jane
        $this->assertEquals('John', $johnContacts[0]->first_name);
        $this->assertEquals('Doe', $doeContacts[0]->last_name);
    }

    /** @test */
    public function it_can_find_by_token(): void
    {
        $contact = Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'test@example.com',
            'token' => 'unique-token-123',
        ]);

        $foundContact = Contact::where('token', 'unique-token-123')->first();

<<<<<<< HEAD
        Assert::assertNotNull($foundContact);
        Assert::assertEquals($contact->id, $foundContact->id);
        Assert::assertEquals('unique-token-123', $foundContact->token);
    });

    test('_can_find_by_verification_status', function (): void {
ContactFactory::new()->createOne([
=======
        $this->assertNotNull($foundContact);
        $this->assertEquals($contact->id, $foundContact->id);
        $this->assertEquals('unique-token-123', $foundContact->token);
    }

    /** @test */
    public function it_can_find_by_verification_status(): void
    {
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'verified@example.com',
            'verified_at' => now(),
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '456',
            'contact_type' => 'email',
            'value' => 'unverified@example.com',
            'verified_at' => null,
        ]);

        $verifiedContacts = Contact::whereNotNull('verified_at')->get();
        $unverifiedContacts = Contact::whereNull('verified_at')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $verifiedContacts);
        Assert::assertCount(1, $unverifiedContacts);
        Assert::assertNotNull($this->firstModel($verifiedContacts, Contact::class)->verified_at);
        Assert::assertNull($this->firstModel($unverifiedContacts, Contact::class)->verified_at);
    });

    test('_can_find_by_sms_status', function (): void {
ContactFactory::new()->createOne([
=======
        $this->assertCount(1, $verifiedContacts);
        $this->assertCount(1, $unverifiedContacts);
        $this->assertNotNull($verifiedContacts[0]->verified_at);
        $this->assertNull($unverifiedContacts[0]->verified_at);
    }

    /** @test */
    public function it_can_find_by_sms_status(): void
    {
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'phone',
            'value' => '+393331234567',
            'sms_status_code' => '200',
            'sms_status_txt' => 'Delivered',
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '456',
            'contact_type' => 'phone',
            'value' => '+393339876543',
            'sms_status_code' => '400',
            'sms_status_txt' => 'Failed',
        ]);

        $deliveredSms = Contact::where('sms_status_code', '200')->get();
        $failedSms = Contact::where('sms_status_code', '400')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $deliveredSms);
        Assert::assertCount(1, $failedSms);
        Assert::assertEquals('200', $this->firstModel($deliveredSms, Contact::class)->sms_status_code);
        Assert::assertEquals('400', $this->firstModel($failedSms, Contact::class)->sms_status_code);
        Assert::assertEquals('Delivered', $this->firstModel($deliveredSms, Contact::class)->sms_status_txt);
        Assert::assertEquals('Failed', $this->firstModel($failedSms, Contact::class)->sms_status_txt);
    });

    test('_can_find_by_counters', function (): void {
ContactFactory::new()->createOne([
=======
        $this->assertCount(1, $deliveredSms);
        $this->assertCount(1, $failedSms);
        $this->assertEquals('200', $deliveredSms[0]->sms_status_code);
        $this->assertEquals('400', $failedSms[0]->sms_status_code);
        $this->assertEquals('Delivered', $deliveredSms[0]->sms_status_txt);
        $this->assertEquals('Failed', $failedSms[0]->sms_status_txt);
    }

    /** @test */
    public function it_can_find_by_counters(): void
    {
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'low@example.com',
            'sms_count' => 1,
            'mail_count' => 2,
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '456',
            'contact_type' => 'email',
            'value' => 'high@example.com',
            'sms_count' => 10,
            'mail_count' => 25,
        ]);

        $lowSmsContacts = Contact::where('sms_count', '<=', 5)->get();
        $highMailContacts = Contact::where('mail_count', '>=', 20)->get();

<<<<<<< HEAD
        Assert::assertCount(1, $lowSmsContacts);
        Assert::assertCount(1, $highMailContacts);
        Assert::assertEquals(1, $this->firstModel($lowSmsContacts, Contact::class)->sms_count);
        Assert::assertEquals(25, $this->firstModel($highMailContacts, Contact::class)->mail_count);
    });

    test('_can_find_by_attributes', function (): void {
ContactFactory::new()->createOne([
=======
        $this->assertCount(1, $lowSmsContacts);
        $this->assertCount(1, $highMailContacts);
        $this->assertEquals(1, $lowSmsContacts[0]->sms_count);
        $this->assertEquals(25, $highMailContacts[0]->mail_count);
    }

    /** @test */
    public function it_can_find_by_attributes(): void
    {
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'manager@example.com',
            'attribute_1' => 'Position',
            'attribute_2' => 'Manager',
            'attribute_3' => 'IT Department',
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '456',
            'contact_type' => 'email',
            'value' => 'developer@example.com',
            'attribute_1' => 'Position',
            'attribute_2' => 'Developer',
            'attribute_3' => 'IT Department',
        ]);

        $managers = Contact::where('attribute_2', 'Manager')->get();
        $itDepartment = Contact::where('attribute_3', 'IT Department')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $managers);
        Assert::assertCount(2, $itDepartment);
        Assert::assertEquals('Manager', $this->firstModel($managers, Contact::class)->attribute_2);
        Assert::assertEquals('IT Department', $this->firstModel($itDepartment, Contact::class)->attribute_3);
        $secondItContact = $itDepartment->get(1);
        Assert::assertInstanceOf(Contact::class, $secondItContact);
        Assert::assertEquals('IT Department', $secondItContact->attribute_3);
    });

    test('_can_find_by_multiple_criteria', function (): void {
ContactFactory::new()->createOne([
=======
        $this->assertCount(1, $managers);
        $this->assertCount(2, $itDepartment);
        $this->assertEquals('Manager', $managers[0]->attribute_2);
        $this->assertEquals('IT Department', $itDepartment[0]->attribute_3);
        $this->assertEquals('IT Department', $itDepartment[1]->attribute_3);
    }

    /** @test */
    public function it_can_find_by_multiple_criteria(): void
    {
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'verified@example.com',
            'verified_at' => now(),
            'sms_count' => 5,
            'attribute_1' => 'Manager',
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '456',
            'contact_type' => 'email',
            'value' => 'unverified@example.com',
            'verified_at' => null,
            'sms_count' => 2,
            'attribute_1' => 'Developer',
        ]);

        $verifiedManagers = Contact::whereNotNull('verified_at')
            ->where('attribute_1', 'Manager')
            ->where('sms_count', '>=', 3)
            ->get();

<<<<<<< HEAD
        Assert::assertCount(1, $verifiedManagers);
        $verifiedManager = $this->firstModel($verifiedManagers, Contact::class);
        Assert::assertEquals('verified@example.com', $verifiedManager->value);
        Assert::assertEquals('Manager', $verifiedManager->attribute_1);
        Assert::assertEquals(5, $verifiedManager->sms_count);
    });

    test('_can_handle_null_values', function (): void {
$contact = ContactFactory::new()->createOne([
=======
        $this->assertCount(1, $verifiedManagers);
        $this->assertEquals('verified@example.com', $verifiedManagers[0]->value);
        $this->assertEquals('Manager', $verifiedManagers[0]->attribute_1);
        $this->assertEquals(5, $verifiedManagers[0]->sms_count);
    }

    /** @test */
    public function it_can_handle_null_values(): void
    {
        $contact = Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'test@example.com',
            'first_name' => null,
            'last_name' => null,
            'email' => null,
            'mobile_phone' => null,
            'verified_at' => null,
            'token' => null,
        ]);

<<<<<<< HEAD
        Assert::assertNull($contact->first_name);
        Assert::assertNull($contact->last_name);
        Assert::assertNull($contact->verified_at);
        Assert::assertNull($contact->token);
    });

    test('_can_order_by_order_column', function (): void {
ContactFactory::new()->createOne([
=======
        $this->assertNull($contact->first_name);
        $this->assertNull($contact->last_name);
        $this->assertNull($contact->email);
        $this->assertNull($contact->mobile_phone);
        $this->assertNull($contact->verified_at);
        $this->assertNull($contact->token);
    }

    /** @test */
    public function it_can_order_by_order_column(): void
    {
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '123',
            'contact_type' => 'email',
            'value' => 'third@example.com',
            'order_column' => 3,
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '456',
            'contact_type' => 'email',
            'value' => 'first@example.com',
            'order_column' => 1,
        ]);

<<<<<<< HEAD
        ContactFactory::new()->createOne([
=======
        Contact::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => '789',
            'contact_type' => 'email',
            'value' => 'second@example.com',
            'order_column' => 2,
        ]);

        $orderedContacts = Contact::orderBy('order_column')->get();

<<<<<<< HEAD
        Assert::assertCount(3, $orderedContacts);
        Assert::assertEquals('first@example.com', $this->firstModel($orderedContacts, Contact::class)->value);
        Assert::assertEquals('second@example.com', $orderedContacts->get(1)?->value);
        Assert::assertEquals('third@example.com', $orderedContacts->get(2)?->value);
        Assert::assertEquals(1, $this->firstModel($orderedContacts, Contact::class)->order_column);
        Assert::assertEquals(2, $orderedContacts->get(1)?->order_column);
        Assert::assertEquals(3, $orderedContacts->get(2)?->order_column);
    });
});
=======
        $this->assertCount(3, $orderedContacts);
        $this->assertEquals('first@example.com', $orderedContacts[0]->value);
        $this->assertEquals('second@example.com', $orderedContacts[1]->value);
        $this->assertEquals('third@example.com', $orderedContacts[2]->value);
        $this->assertEquals(1, $orderedContacts[0]->order_column);
        $this->assertEquals(2, $orderedContacts[1]->order_column);
        $this->assertEquals(3, $orderedContacts[2]->order_column);
    }
}
>>>>>>> 929ed821d (.)
