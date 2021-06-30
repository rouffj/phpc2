<?php


class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Allow to map column names with class properties.
     *
     * @param $name
     * @param $value

    public function __set($name, $value)
    {
        $columns = [
            'first_name' => 'firstName',
            'last_name' => 'lastName',
        ];

        $this->{$columns[$name]} = $value;
    }
     */
}