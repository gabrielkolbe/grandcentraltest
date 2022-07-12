
	

        
        <style>
            .slide img {
                width: 100%;
            }
            .height {
                height: 10px;
            }
            
            /* Image-container design */
            .image-container {
                /*max-width: 800px;*/
                position: relative;
                margin: auto;
            }
            
            .next {
                right: 0;
            }
            
            /* Next and previous icon design */
            .previous,
            .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                padding: 10px;
                margin-top: -25px;
            }
            
            /* caption decorate */
            .captionText {
                color: #000000;
                font-size: 14px;
                position: absolute;
                padding: 12px 12px;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }
            
            /* Slider image number */
            .slideNumber {
                background-color: #8ED4CC;
                color: white;
                border-radius: 25px;
                right: 0;
                opacity: .5;
                margin: 5px;
                width: 30px;
                height: 30px;
                text-align: center;
                font-weight: bold;
                font-size: 24px;
                position: absolute;
            }
            .fa {
                font-size: 32px;
            }
            
            .slivernav, i.fa:hover {
                transform: rotate(360deg);
                transition: 1s;
                color: #8ED4CC;
            }
            
            .footerdot {
                cursor: pointer;
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbbbbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.5s ease;
            }
            
            .footerdot.active,
            .footerdot:hover {
                background-color: #8ED4CC;
            }

        </style>
    

            <div style="text-align:center; padding-top:10px;">
                <span class="footerdot"
                    onclick="activeSlide(1)">
                </span>
                <span class="footerdot"
                    onclick="activeSlide(2)">
                </span>
                <span class="footerdot"
                    onclick="activeSlide(3)">
                </span>
                <span class="footerdot"
                onclick="activeSlide(4)">
            </span>


            </div>
        <!-- Image container of the image slider -->
        <div class="image-container">
            <div class="slide">
                <div class="slideNumber">1</div>
                <img src="/images/audri/carterton1a.jpg">
            </div>
            <div class="slide">
                <div class="slideNumber">2</div>
                <img src="/images/audri/carterton2.jpg">
            </div>
            <div class="slide">
                <div class="slideNumber">3</div>
                <img src="/images/audri/carterton3.jpg">
            </div>
            <div class="slide">
                <div class="slideNumber">4</div>
                <img src="/images/audri/carterton4.jpg">
            </div>

                        <!-- Next and Previous icon to change images -->
            <a class="previous slidernav" onclick="moveSlides(-1)">
                <i class="fa fa-chevron-circle-left"></i>
            </a>
            <a class="next slivernav" onclick="moveSlides(1)">
                <i class="fa fa-chevron-circle-right"></i>
            </a>
        </div>
        <br>
    




        
        <script>
            var slideIndex = 1;
            displaySlide(slideIndex);
    
            function moveSlides(n) {
                displaySlide(slideIndex += n);
            }
    
            function activeSlide(n) {
                displaySlide(slideIndex = n);
            }
    
            /* Main function */
            function displaySlide(n) {
                var i;
                var totalslides =
                    document.getElementsByClassName("slide");
                
                var totaldots =
                    document.getElementsByClassName("footerdot");
                
                if (n > totalslides.length) {
                    slideIndex = 1;
                }
                if (n < 1) {
                    slideIndex = totalslides.length;
                }
                for (i = 0; i < totalslides.length; i++) {
                    totalslides[i].style.display = "none";
                }
                for (i = 0; i < totaldots.length; i++) {
                    totaldots[i].className =
                    totaldots[i].className.replace(" active", "");
                }
                totalslides[slideIndex - 1].style.display = "block";
                totaldots[slideIndex - 1].className += " active";
            }
        </script>
    
    
    