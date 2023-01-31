# Condition Array

This library is only to check conditions in a array model.

For example:
``` php
$arrayCondition = [10,">",1];
```

The use is simple, you only need to require the class and call the static method _check()_.
``` php
$boolValue = ConditionArray::check([10,">",1]);
```