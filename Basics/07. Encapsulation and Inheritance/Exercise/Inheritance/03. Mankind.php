<?php

class Human
{
    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * Human constructor.
     * @param string $firstName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    public function setFirstName(string $firstName): void
    {
        if (ctype_lower($firstName[0]) || is_numeric($firstName[0])) {
            throw new Exception("Expected upper case letter!Argument: firstName");
        }
        if (strlen($firstName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    public function setLastName(string $lastName): void
    {
        if (ctype_lower($lastName[0]) || is_numeric($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return "First Name: $this->firstName\nLast Name: $this->lastName\n";
    }
}

class Student extends Human
{
    /**
     * @var string
     */
    private $facultyNumber;

    public function __construct(string $firstName, string $lastName, string $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    /**
     * @return string
     */
    public function getFacultyNumber(): string
    {
        return $this->facultyNumber;
    }

    /**
     * @param string $facultyNumber
     * @throws Exception
     */
    public function setFacultyNumber(string $facultyNumber): void
    {
        if (strlen($facultyNumber) < 5 || strlen($facultyNumber) > 10) {
            throw new Exception("Invalid faculty number!");
        }
        foreach (str_split( $facultyNumber) as $el) {
            if (!is_numeric($el)) {
                throw new Exception('Invalid faculty number!');
            }
        }
        $this->facultyNumber = $facultyNumber;
    }

    public function __toString()
    {
        $output = parent::__toString();
        $output .= "Faculty number: $this->facultyNumber\n";
        return $output;
    }
}

class Worker extends Human
{
    /**
     * @var float
     */
    private $weeklySalary;

    /**
     * @var float
     */
    private $hoursPerDay;

    public function __construct(string $firstName, string $lastName, float $weeklySalary, float $hoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setLastName($lastName);
        $this->setWeeklySalary($weeklySalary);
        $this->setHoursPerDay($hoursPerDay);
    }

    public function setLastName(string $lastName): void
    {
        if (ctype_lower($lastName[0]) || is_numeric($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) <= 3) {
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    /**
     * @return float
     */
    private function hourlySalary() : float
    {
        return $this->getWeeklySalary() / ($this->getHoursPerDay() * 7);
    }

    /**
     * @return float
     */
    public function getWeeklySalary(): float
    {
        return $this->weeklySalary;
    }


    /**
     * @param float $weeklySalary
     * @throws Exception
     */
    public function setWeeklySalary(float $weeklySalary): void
    {
        if ($weeklySalary <= 10) {
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weeklySalary = $weeklySalary;
    }

    /**
     * @return float
     */
    public function getHoursPerDay(): float
    {
        return $this->hoursPerDay;
    }

    /**
     * @param float $hoursPerDay
     * @throws Exception
     */
    public function setHoursPerDay(float $hoursPerDay): void
    {
        if ($hoursPerDay < 1 || $hoursPerDay > 12) {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->hoursPerDay = $hoursPerDay;
    }


    public function __toString()
    {
        $salaryPerHour = number_format($this->hourlySalary(), 2, '.', '');
        $weekly = number_format($this->weeklySalary, 2, '.', '');
        $hours = number_format($this->hoursPerDay, 2, '.', '');
        return "First Name: $this->firstName\nLast Name: $this->lastName\nWeek Salary: $weekly\nHours per day: $hours\nSalary per hour: $salaryPerHour\n";
    }
}

[$fnStudent, $lnStudent, $facultyNumber] = explode(' ', readline());
[$fnWorker, $lnWorker, $salary, $hours] = explode(' ', readline());

try {
    $student = new Student($fnStudent, $lnStudent, $facultyNumber);
    $worker = new Worker($fnWorker, $lnWorker, floatval($salary), floatval($hours));
    echo $student.PHP_EOL;
    echo $worker;
} catch (Exception $e) {
    echo $e->getMessage().PHP_EOL;
}