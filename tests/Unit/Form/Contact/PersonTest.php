<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Form\Contact;

use DreadLabs\VantomasWebsite\Form\Contact\Person;

class PersonTest extends \PHPUnit_Framework_TestCase
{

    public function testFirstNameAccessors()
    {
        $firstName = 'John';
        $sut = new Person();
        $sut->setFirstName($firstName);

        $this->assertSame($firstName, $sut->getFirstName());
    }

    public function testLastNameAccessors()
    {
        $lastName = 'Doe';
        $sut = new Person();
        $sut->setLastName($lastName);

        $this->assertSame($lastName, $sut->getLastName());
    }

    public function testEmailAccessors()
    {
        $email = 'john.doe@example.org';
        $sut = new Person();
        $sut->setEmail($email);

        $this->assertSame($email, $sut->getEmail());
    }

    public function testCityAccessors()
    {
        $city = 'Urville';
        $sut = new Person();
        $sut->setCity($city);

        $this->assertSame($city, $sut->getCity());

    }
}
