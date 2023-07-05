
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="check-btn">
        <i class="fas fa-bars"></i>
    </label>
        <span id="logo" onclick="home()">Quiska</span>
    <ul>
        <li><a class="active fcka" id="home" href="<?php echo $path_home ?>">Home <i class="fas fa-home"></i></a></li>
        <li><a class="test fcka" id="quiz" href="#quiz321">Quizs</a></li>
        <li><a class="test fcka" id="about" href="#about312">About</a></li>
        <li><a class="test fcka" id="contact" href="#contact423">Contact</a></li>
        <li>
        <?php 
            if ($join == 0) {
            } else {
                echo '<button onclick="window.location=\'./static/login.php\'" class="signup-login-button">
                        <span>Join</span>
                      </button>';
            }
        ?>

        </li>
    </ul>
</nav>