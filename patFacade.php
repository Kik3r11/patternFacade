<?php
class CPU
{
    public function jump($position) {}
    public function execute() 
    {
    	echo "<br>"."Все действия выполнены!";
    }
}
class Memory
{
    const BOOT_ADDRESS = 0x0005;
    public function load($position, $data) 
    {
    	echo "<br>"."Память загружена: BOOT_ADDRESS = 0x0005";	
    }
}
class HardDrive
{
    const BOOT_SECTOR = 0x001;
    const SECTOR_SIZE = 64;
    public function read($sector, $size) 
    {
    	echo "Диск загружен!";
    }
}
class Computer
{
    protected $cpu;
    protected $memory;
    protected $hardDrive;
    public function __construct()
    {
        $this->cpu = new CPU();
        $this->memory = new Memory();
        $this->hardDrive = new HardDrive();
    }
    public function startComputer()
    {
        $cpu = $this->cpu;
        $memory = $this->memory;
        $hardDrive = $this->hardDrive;
        $memory->load($memory::BOOT_ADDRESS, $hardDrive->read($hardDrive::BOOT_SECTOR, $hardDrive::SECTOR_SIZE));
        $cpu->jump($memory::BOOT_ADDRESS);
        $cpu->execute();
    }
}
$computer = new Computer();
$computer->startComputer();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

</body>
</html>