<?php ?>
<div class="previewDiv" style="display: none;">
        <div class="previewSayit_Div">
        <i onclick="closePreviewDiv()" class="fa fa-times-circle icons"></i>
            <div class="previewSayit_card">
                <div class="previewSayit_card-info">
                    <p class="previewSayit_title">Something went wrong !!</p>
                    <img class="logoPreview" src="./../../user/images/logo.png" height="50">
                </div>
            </div>
            <button id="shareImgBtn" onclick="shareImage()">Share  <span><i class="fas fa-upload"></i></span></button>
            <button id="downloadImgBtn" onclick="convertDivToImageAndDownload()">Download Image <span><i class="fas fa-download"></i></span></button>
                <div style="height: 150px;">

                </div>
            <center>
                <h2 class="previewCredits" style="font-size: 18px;">quiska.quantgam.com</h2>
                <span class="previewCredits" style="font-size: 10px;">Join to receive Anonymous Messages</span>
            </center>
    </div>
</div>