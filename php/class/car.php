<?PHP

//Google AI overview
// 1. Declare the blueprint  using the class keyword
class Car{
	// Properties (with public visibility)
	public $band;
	public $color;
	
	// Constructor: A special method that triggers atuomatically on 'new'
	public function __construct($brand, $color){
		$this->brand = $brand; // $this refers to the current object instance
		$this->color = $color;
	}
		
		// Method (Behavior)
		public function drive(){
			return "The " . $this->color . " " . $this->brand . " is driving!";
		}
}


// 2. Instantiate objects from the class blueprint
$car1 = new Car("Toyota", "red");
$car2 = new Car("Honda", "blue");

// 3. Access methods and properties using the arrot operator (->)
echo $car1->drive(); /// Output: The red Toyota is driving!
echo "\r\n";
echo $car2->brand; // Output: Honda

?>
