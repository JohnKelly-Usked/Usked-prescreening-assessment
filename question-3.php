// Refactor using PHP 8+ features. Prioritize conciseness, readability, and modern syntax. Eliminate outdated patterns.

<?php

class User
{
    private $name;
    private $email;
    private $age;
    private $birthday;

    public function __construct($name, $email, $age)
    {
        if (!is_string($name) || !is_string($email) || !is_int($age)) {
            throw new InvalidArgumentException('Invalid argument type');
        }

        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (!is_string($name)) {
            throw new InvalidArgumentException('Name must be a string');
        }
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email format');
        }
        $this->email = $email;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        if (!is_int($age)) {
            throw new InvalidArgumentException('Age must be an integer');
        }
        $this->age = $age;
    }

    public function toArray()
    {
        return [
            'name'  => $this->name,
            'email' => $this->email,
            'age'   => $this->age,
        ];
    }

    // Birthday can be submitted in various formats, but must be stored as a string.
    // Acceptable formats for $value are an integer unix timestamp, a string datetime, or a PHP object DateTime
    public function setBirthday($value): void
    {
        switch (true) {
            case $value instanceof DateTime:
                $date = $value->getTimestamp();
                break;
            case is_string($value):
                $date = strtotime($value);
                break;
            case is_int($value):
                $date = $value;
                break;
            default:
                throw new InvalidArgumentException('Invalid birthday format');
        }
    
        if (!$date || !is_int($date)) {
            throw new InvalidArgumentException('Unparsable birthday');
        }
    
        $this->birthday = date('Y-m-d', $date);
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }
}
