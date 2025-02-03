# PHP Array Increment Bug
This repository demonstrates a subtle bug in PHP related to type juggling when incrementing array values.  The bug occurs when a key's initial value is a string, leading to string concatenation instead of numerical addition.  The solution offers a safer approach to handle array value incrementation, regardless of the key's initial type.

## Bug Description
The `incrementArrayValue` function intends to increase the value associated with a given key in an array.  If the key doesn't exist, it initializes it to 0.  However, if the initial value is a string, the `++` operator performs string concatenation, causing unexpected results.

## Solution
The solution introduces type casting to ensure the value is always treated as an integer before incrementation.