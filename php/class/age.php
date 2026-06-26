<?PHP

// Google AI Overview
class User {
	// 1. Declare properties
	public string $name;
	public int $age;
	
	// 2. Accept parameters
	public function __construct(string $name, int $age) {
		// 3. Manually assign values
		$this->name = $name;
		$this->age = $age;
	}
}

// Instantiation triggers the constructor automatically
$user = new User("Alice", 30);

echo $user->name;
echo "<br>";
echo $user->age;

?>
