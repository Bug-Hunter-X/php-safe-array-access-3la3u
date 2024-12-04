```php
function processData(array $data): array {
  // Check if the array is empty
  if (empty($data)) {
    return []; // Return an empty array if input is empty
  }

  $result = [];
  foreach ($data as $item) {
    //Check for existence of keys
    if (!isset($item['id']) || !isset($item['value'])){
        throw new InvalidArgumentException('Invalid data item: Missing id or value key. Item: ' . json_encode($item));
    }
    $result[$item['id']] = $item['value'];
  }

  return $result;
}

$data = [
  ['id' => 1, 'value' => 'one'],
  ['id' => 2, 'value' => 'two'],
  ['id' => 3],
  ['id' => 4, 'value' => 'four'],
];

try{
  $processedData = processData($data);
  print_r($processedData);
} catch (InvalidArgumentException $e){
  echo "Error: " . $e->getMessage();
}
```