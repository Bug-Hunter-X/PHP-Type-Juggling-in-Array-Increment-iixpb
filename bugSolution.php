```php
function incrementArrayValueSafe(array &$arr, string $key): void {
  if (!array_key_exists($key, $arr)) {
    $arr[$key] = 0;
  } else {
    //Cast the value to integer first
    $arr[$key] = (int)$arr[$key] + 1;
  }
}

$myArray = ['a' => '1', 'b' => 2];
incrementArrayValueSafe($myArray, 'a');
echo json_encode($myArray); //Output: {"a":2,"b":2}

$myArray = [1 => 1, 2 => 2];
incrementArrayValueSafe($myArray, '1');
echo json_encode($myArray); //Output: {"1":2,"2":2}

//The solution handles cases where the value is a string, ensuring integer addition.
```