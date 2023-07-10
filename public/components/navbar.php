
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="check-btn">
        <i class="fas fa-bars"></i>
    </label>
        <span id="logo" onclick="home()">Quiska</span>
    <ul>
        <li><a class="active fcka" id="home" href="<?php echo $path_home ?>">Home <i class="fas fa-home"></i></a></li>
        <li><a class="test fcka" id="quiz" href="<?php echo $path_sayit ?>">SayIt</a></li>
        <li><a class="test fcka" id="about" href="<?php echo $path_quiz ?>">Quiz</a></li>
        <li><a class="test fcka" id="contact" href="<?php echo $path_contact ?>">Contact</a></li>
        <li>
        <?php 
            if ($join == 0) {
                echo '<button onclick="window.location=\'./backend/logout.php\'" class="signup-login-button">
                        <span>Log out</span>
                      </button>';
            } else if ($join == 1){
                echo '<button onclick="window.location=\'./user/login.php\'" class="signup-login-button">
                        <span>Join</span>
                      </button>';
            }
            else{
                
            }
        ?>

        </li>
    </ul>
</nav>