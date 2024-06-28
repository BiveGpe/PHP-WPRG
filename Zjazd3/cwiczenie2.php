<!DOCTYPE html>
<html>
<body>
    <form method="GET">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number">
        <button type="submit">Submit</button>
    </form>

    <?php
    function calculateFactorialRecursively($number) {
        return ($number <= 1) ? 1 : $number * calculateFactorialRecursively($number - 1);
    }

    function calculateFactorialIteratively($number) {
        $result = 1;
        for ($i = 2; $i <= $number; $i++) {
            $result *= $i;
        }
        return $result;
    }

    if(isset($_GET['number'])) {
        $number = $_GET['number'];

        $startTimeRec = microtime(true);
        $resultRec = calculateFactorialRecursively($number);
        $endTimeRec = microtime(true);
        $executionTimeRec = ($endTimeRec - $startTimeRec) * 1000;

        $startTimeIter = microtime(true);
        $resultIter = calculateFactorialIteratively($number);
        $endTimeIter = microtime(true);
        $executionTimeIter = ($endTimeIter - $startTimeIter) * 1000;

        $timeDifference = abs($executionTimeRec - $executionTimeIter);
        $fasterMethod = ($executionTimeRec < $executionTimeIter) ? 'Recursive' : 'Iterative';

        echo "<p>Factorial of $number is $resultRec. Execution time (recursive): $executionTimeRec seconds.</p>
        <p>Execution time (iterative): $executionTimeIter seconds.</p>
        <p>The $fasterMethod method is faster by $timeDifference seconds.</p>";
    }
    ?>
</body>
</html>
