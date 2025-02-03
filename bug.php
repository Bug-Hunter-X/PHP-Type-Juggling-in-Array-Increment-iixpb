```php
function incrementArrayValue(array &$arr, string $key): void {
  if (!array_key_exists($key, $arr)) {
    $arr[$key] = 0; // Initialize if key doesn't exist
  }
  $arr[$key]++;
}

$myArray = ['a' => 1, 'b' => 2];
incrementArrayValue($myArray, 'c');
echo json_encode($myArray); // Output: {"a":1,"b":2,"c":1}

//This is a common scenario where we try to increase a value in an array by 1.  If the key does not exist, we initialize it to 0 before incrementing.

incrementArrayValue($myArray, 'a');
echo json_encode($myArray); //Output: {"a":2,"b":2,"c":1}

//However, a subtle bug might arise if you are not careful with how you handle the initial value.  Consider this:
$myArray = ['a' => '1', 'b' => 2]; // 'a' is a string
incrementArrayValue($myArray, 'a');
echo json_encode($myArray); //Output: {"a":"11","b":2,"c":1} 
//The value of 'a' becomes a string '11' instead of an integer 2. This is because PHP will perform string concatenation instead of integer addition if the initial value is a string.

// Another edge case is if the key is an integer, it is treated differently than if it were a string.
$myArray = [1 => 1, 2 => 2];
incrementArrayValue($myArray, 1);
echo json_encode($myArray);
//Output: {"1":2,"2":2}

// Notice that, while it incremented correctly, the key is treated as a string "1" rather than the integer 1.
```