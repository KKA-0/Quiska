
<nav id="navbar">
        <span id="logo" <a onclick="window.location.href='<?php echo $path_home ?>';">Quiska</a></span>
    <ul class="pc_navbar_items">
        <!-- <li><input id="preference" onclick="preference()" type="checkbox"></li>   -->
        <li>
            <label class="theme">
                <input type="checkbox" id="preference" onclick="preference()" checked="checked" class="input">
                <svg class="icon icon-sun" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"><circle cx="12" cy="12" r="5"></circle><line x1="12" x2="12" y1="1" y2="3"></line><line x1="12" x2="12" y1="21" y2="23"></line><line x1="4.22" x2="5.64" y1="4.22" y2="5.64"></line><line x1="18.36" x2="19.78" y1="18.36" y2="19.78"></line><line x1="1" x2="3" y1="12" y2="12"></line><line x1="21" x2="23" y1="12" y2="12"></line><line x1="4.22" x2="5.64" y1="19.78" y2="18.36"></line><line x1="18.36" x2="19.78" y1="5.64" y2="4.22"></line></svg>
                <svg class="icon icon-moon" viewBox="0 0 24 24"><path d="m12.3 4.9c.4-.2.6-.7.5-1.1s-.6-.8-1.1-.8c-4.9.1-8.7 4.1-8.7 9 0 5 4 9 9 9 3.8 0 7.1-2.4 8.4-5.9.2-.4 0-.9-.4-1.2s-.9-.2-1.2.1c-1 .9-2.3 1.4-3.7 1.4-3.1 0-5.7-2.5-5.7-5.7 0-1.9 1.1-3.8 2.9-4.8zm2.8 12.5c.5 0 1 0 1.4-.1-1.2 1.1-2.8 1.7-4.5 1.7-3.9 0-7-3.1-7-7 0-2.5 1.4-4.8 3.5-6-.7 1.1-1 2.4-1 3.8-.1 4.2 3.4 7.6 7.6 7.6z"></path></svg>
            </label>
        </li>  
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