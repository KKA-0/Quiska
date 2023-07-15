
<nav id="navbar">
        <span id="logo" <a onclick="window.location.href='<?php echo $path_home ?>';">Quiska</a></span>
    <ul class="pc_navbar_items">
        <li><input id="preference" onclick="preference()" type="checkbox"></li>
        <li><a class="active fcka" id="home" href="<?php echo $path_home ?>">Home <i class="fas fa-home"></i></a></li>
        <li><a class="test fcka" id="quiz" href="<?php echo $path_sayit ?>">SayIt</a></li>
        <li><a class="test fcka" id="about" href="<?php echo $path_quiz ?>">Quiz</a></li>
        <li><a class="test fcka" id="contact" href="<?php echo $path_contact ?>">Contact</a></li>
        <li>
        <?php 
            if ($join == 0) {
                echo '<button onclick="window.location.href = \'' . $logout . '\'" class="signup-login-button">
                        <span>Log out</span>
                    </button>';
            } else if ($join == 1) {
                echo '<button onclick="window.location.href = \'./user/join.php\'" class="signup-login-button">
                        <span>Join</span>
                    </button>';
            }
            else {
            }
        ?>
        </li>
    </ul>
    <!-- <div class="hb_div"> -->
        <label class="hamburger">
        <input class="hb_checkbox" onclick="navbarForMobile()" type="checkbox">
            <svg viewBox="0 0 32 32">
                <path class="line line-top-bottom" d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22"></path>
                <path class="line" d="M7 16 27 16"></path>
            </svg>
        </label>
    <!-- </div> -->
    <div style="display: none;" id="mobile_hb_items">
    <center>
        <button class="quizBtn">
            <span class="quizBtn-content">Quiz</span>
        </button>
        <button class="quizBtn">
            <span class="quizBtn-content">SayIt</span>
        </button>
        
        <?php 
            if ($join == 0) {
                echo '<button onclick="window.location.href = \'' . $logout . '\'" class="activeBtn">
                        <span class="quizBtn-content">Log out</span>
                    </button>';
            } else if ($join == 1) {
                echo '<button onclick="window.location.href = \'./user/join.php\'" class="activeBtn">
                        <span class="quizBtn-content">Join</span>
                    </button>';
            }
            else {
            }
        ?>
    </center>
    </div>
</nav>