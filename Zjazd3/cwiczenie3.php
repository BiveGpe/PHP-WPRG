<!DOCTYPE html>
<html>
<body>
    <form method="POST">
        <label for="path">Path:</label>
        <input type="text" id="path" name="path" required>
        <label for="directory">Directory Name:</label>
        <input type="text" id="directory" name="directory" required>
        <label for="operation">Operation:</label>
        <select id="operation" name="operation">
            <option value="read">Read</option>
            <option value="delete">Delete</option>
            <option value="create">Create</option>
        </select>
        <button type="submit">Submit</button>
    </form>

    <?php
    function handleDirectory($path, $directory, $operation = 'read') {
        if (substr($path, -1) !== '/') {
            $path .= '/';
        }

        $fullPath = $path . $directory;

        switch ($operation) {
            case 'read':
                if (is_dir($fullPath)) {
                    $elements = scandir($fullPath);
                    return 'Directory elements: ' . implode(', ', $elements);
                } else {
                    return 'Directory does not exist.';
                }

            case 'delete':
                if (is_dir($fullPath) && !(new FilesystemIterator($fullPath))->valid()) {
                    rmdir($fullPath);
                    return 'Directory deleted.';
                } else {
                    return 'Directory does not exist or is not empty.';
                }

            case 'create':
                mkdir($fullPath);
                return 'Directory created.';

            default:
                return 'Invalid operation.';
        }
    }

    if ($_POST) {
        $message = handleDirectory($_POST['path'], $_POST['directory'], $_POST['operation']);
        echo "<p>$message</p>";
    }
    ?>
</body>
</html>
