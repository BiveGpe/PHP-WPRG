<html>
<body>
    <form method="GET">
        <label for="birthdate">Podaj datę urodzenia:</label>
        <input type="date" id="birthdate" name="birthdate">
        <button type="submit">Wyślij</button>
    </form>

    <?php
    class Birthday {
        private $birthdate;

        public function __construct($birthdate) {
            $this->birthdate = strtotime($birthdate);
        }

        public function getDayOfWeek() {
            return date('l', $this->birthdate);
        }

        public function getAge() {
            return date('Y') - date('Y', $this->birthdate);
        }

        public function getDaysUntilNextBirthday() {
            $next_birthday = date('Y') . '-' . date('m-d', $this->birthdate);
            if ($next_birthday < date('Y-m-d')) {
                $next_birthday = (date('Y') + 1) . '-' . date('m-d', $this->birthdate);
            }

            return ceil((strtotime($next_birthday) - strtotime(date('Y-m-d'))) / (60 * 60 * 24));
        }
    }

    if(isset($_GET['birthdate'])) {
        $birthday = new Birthday($_GET['birthdate']);
        echo "<p>Urodziłeś się w dniu: " . $birthday->getDayOfWeek() . "</p>";
        echo "<p>Masz obecnie " . $birthday->getAge() . " lat/a</p>";
        echo "<p>Do Twoich kolejnych urodzin pozostało " . $birthday->getDaysUntilNextBirthday() . " dni</p>";
    }
    ?>
</body>
</html>
