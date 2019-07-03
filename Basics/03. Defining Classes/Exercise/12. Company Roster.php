<?php

class Employee
{
public $name;
public $salary;
public $position;
public $department;
public $email;
public $age;


    public function __construct(string $name, float $salary, string $position,string $department,string $email='n/a',int $age=-1)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }

    public function __toString()
    {
        $salaryFormat=number_format($this->salary,2);
        return "$this->name $salaryFormat $this->email $this->age" .PHP_EOL;
    }
}

class Department{
    public $name;
    public $employees;

    /**
     * Department constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->employees=[];
    }

    public function addEmployee(Employee $employee){
        $this->employees[]=$employee;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getEmployee(): array
    {
        return $this->employees;
    }

    public function averageSalary(){
        $sum=0;

        foreach ($this->employees as $employee){
            $sum+=$employee->getSalary();
        }
        return $sum/count($this->employees);
    }
}

$inputs=intval(readline());
$departments=[];

while ($inputs-- >0){
    $information=explode(' ',readline());

    $employeeName=$information[0];
    $employeeSalary=floatval($information[1]);
    $employeePosition=$information[2];
    $employeeDepartment=$information[3];
    $employee=null;

    if (count($information)==4){
        $employee=new Employee($employeeName,$employeeSalary,$employeePosition,$employeeDepartment);
    }
    else if (count($information)==5){
        if (is_numeric($information[4])) {
            $employee=new Employee($employeeName,$employeeSalary,$employeePosition,$employeeDepartment,$age=$information[4]);
        }
        else {
            $employee=new Employee($employeeName,$employeeSalary,$employeePosition,$employeeDepartment,$email=$information[4]);
        }
    }
    else  {
        $employee=new Employee($employeeName,$employeeSalary,$employeePosition,$employeeDepartment,$email=$information[4],$age=$information[5]);

    }

    if (!array_key_exists($employeeDepartment,$departments)){
        $department=new Department($employeeDepartment);
        $departments[$employeeDepartment]=$department;
    }

    $departments[$employeeDepartment]->addEmployee($employee);
}

usort($departments,function (Department $d1, Department $d2){
    return $d2->averageSalary() <=> $d1->averageSalary();
});

$departmentName=$departments[0]->getName();
$firstDepartment=$departments[0]->getEmployee();

usort($firstDepartment,function (Employee $e1, Employee $e2){
 return $e2->getSalary()<=>$e1->getSalary();
});

echo "Highest Average Salary: $departmentName" .PHP_EOL;

foreach ($firstDepartment as $item) {
    echo $item;
 }