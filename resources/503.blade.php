<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <title>503</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{config('app.url')}}/public/CV/css/bootstrap.min.css" />
    <script src="{{config('app.url')}}/public/CV/js/core/jquery.3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js"></script>
    <style>
        /* Variables */
        :root {
            --main-color: rgb(32,36,255);       /* cobal blue */
            --secondary-color: rgb(85,186,255); /* light blue */
            --accent-color: rgb(255,204,0);     /* yellow */
            --text-color: rgb(255,255,255);     /* white */
            --max-width: 1400px;                /* set on body for big screens */
        }

        /* Resets */
        * {box-sizing: border-box;}

        html, body, div, h1, h2, p, span, main, button {margin: 0; padding: 0;}

        h1 {color: var(--main-color); font-size: 28vw; line-height: 1; text-shadow: -2px .05em 0 rgba(0,0,0,.5);}
        h2 {font-size: 1.4em;font-weight: normal;}

        a, a:visited, a:active, a:hover {color: inherit; text-decoration: none;}

        button {
            color:var(--text-color);
            font-family:inherit;
            font-size:inherit;
            text-transform: uppercase;
            background-color:var(--main-color);
            box-shadow:none;
            border:none;
            outline:none;
            -webkit-appearance:none;
            -moz-appearance:none;
            appearance:none;
            padding:.6em .8em;
            margin-top: 1em;
            cursor: pointer;
        }

        /* Layout and Styling */
        html, body {
            width: 100%; height: 100%;
        }

        html {
            /* Background Pattern by Nicholas Gallagher - http://lea.verou.me/css3patterns/ */
            background-color: var(--main-color);
            background-size: 58px 58px;
            background-position: 0px 2px, 4px 35px, 29px 31px, 33px 6px, 0px 36px, 4px 2px, 29px 6px, 33px 30px;
            background-image:
                linear-gradient(335deg, var(--text-color) 23px, transparent 23px),
                linear-gradient(155deg, var(--text-color) 23px, transparent 23px),
                linear-gradient(335deg, var(--text-color) 23px, transparent 23px),
                linear-gradient(155deg, var(--text-color) 23px, transparent 23px),

                linear-gradient(335deg, var(--text-color) 10px, transparent 10px),
                linear-gradient(155deg, var(--text-color) 10px, transparent 10px),
                linear-gradient(335deg, var(--text-color) 10px, transparent 10px),
                linear-gradient(155deg, var(--text-color) 10px, transparent 10px);
        }

        body {
            max-width: var(--max-width); margin: 0 auto;
            font-size: 120%;
            font-family: 'Anonymous Pro', monospace;
            font-weight: 400;
            text-align: center;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--main-color);
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .top-bar {
            position: fixed;
            max-width: var(--max-width);
            margin: auto;
            top: 0; left: 0; right:0;
            padding: .5em 1em;
            display: flex;
            flex-flow: row wrap;
            align-items: center;
            justify-content: space-between;
            z-index: 100;
        }

        .page {
            display: block;
            position: relative;
            width: 100%; height: 100%;
            overflow-x: hidden;
        }

        .flex-container {
            display: flex;
            flex-flow: row wrap;
            align-items: flex-end;
            justify-content: center;
            height: 100%;
        }

        .underlined, .action-btn {
            padding: .2em 0;
            border-bottom: 2px solid var(--secondary-color);
        }

        .action-btn_primary {
            text-transform: uppercase;
        }

        .action-btn:hover {
            color: var(--secondary-color);
            cursor: pointer;
        }

        .modal {
            position: fixed;
            top: 50%; left: 50%;
            transform: translateX(-50%) translateY(-50%);
            max-width: 30em;
            padding: 2em 3em;
            background-color: #fff;
            color: var(--main-color);
            z-index: 100;
        }

        .modal > button {
            width: 100%;
            color: #fff;
        }

        .shrink {
            animation: shrink 600ms ease-in-out forwards;
        }
        @keyframes shrink {
            0% {
                transform: translateX(-50%) translateY(-50%) scale(1);
            }
            20% {
                transform: translateX(-50%) translateY(-50%) scale(1.2);
            }
            100% {
                transform: translateX(-50%) translateY(-50%) scale(0);
            }
        }

        .fade-in {
            animation: fadeIn 400ms ease-in-out forwards;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        main {
            padding: 2.5em 1.4em;
        }

        p {
            max-width: 48em;
            margin: 1.2em auto;
        }

        /* Game */
        .game-counter-panel {
            font-size: .9em;
            padding: .2em .8em;
            border: 1px solid var(--secondary-color);
        }

        .game-counter {
            font-size: 1.2em;
            display: inline-block;
            transform: translateY(1px);
            width: 1.4em;
            text-align: center;
        }

        #game-canvas {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            cursor: grab;
            overflow: hidden;
        }

        .bug {
            display: block;
            height: 30px;
            position: absolute;
            top: 50%; left: 50%;
            transform: rotate(0deg);
            transform-origin: center center;
            z-index: 0;
        }

        /* Crawling animation */
        #bug-legs {
            transform-origin: center center;
            animation: crawlcrawlcrawl 80ms infinite ease-in-out both;
        }
        @keyframes crawlcrawlcrawl {
            from {
                transform: translateX(0) translateY(0) rotate(20deg);
            }
            to {
                transform: translateX(0) translateY(0) rotate(-15deg);
            }
        }
    </style>
</head>
<body>
<main class="page fade-in">
    <div id="top-bar" class="top-bar">
        <span class="action-btn action-btn_primary"><a href="#">&larr; back home</a></span>
        <span class="game-counter-panel"><span id="game-counter" class="game-counter">99</span> little bugs in the code</span>
    </div>
    <div class="flex-container" id="error-message">
        <div>
            <h1>503</h1>
            <h2>Site Bakımda.</h2>
        </div>
    </div>
    <div id="game-canvas">
        <svg id="slipper" height="250px" viewbox="0 0 120 273" style="position: absolute; bottom: 30px; right:30px; z-index:1;">
            <path id="slipper-shadow" style="fill:#000000;fill-opacity:0.4" d="m42.86 133.8c0.35-12.8-0.25-25.7-3.9-38.08-4.34-19.92-9.96-40.6-6.07-61.05 3.68-14.48 11.83-30.83 27.77-34.21 17.38-2.998 33.08 9.108 43.54 21.71 12.3 15.34 13.9 36.1 14.3 55.03 0.4 18.63-4.2 36.8-5.7 55.3-2.1 17.8-3.6 35.7-4.5 53.5-1.5 12.9-2.1 28.3-13.79 36.4-13.17 9.4-32.24 6.7-44.68-2.6-10.95-11.3-9.23-28.4-8.4-42.9 0.59-14.3 1.38-28.7 1.43-43.1z" />
            <g id="slipper-body">
                <path style="fill:#ffcc00;fill-opacity:1;" d="m11.3 178c0.35-12.8-0.25-25.7-3.902-38-4.337-20-9.961-40.64-6.066-61.1 3.682-14.47 11.83-30.83 27.77-34.2 17.38-3 33.08 9.1 43.57 21.7 12.3 15.35 13.88 36.1 14.32 55 0.33 18.7-4.23 36.9-5.72 55.4-2.17 17.8-3.65 35.6-4.58 53.5-1.43 12.8-2.09 28.2-13.74 36.3-13.17 9.5-32.24 6.7-44.68-2.6-10.95-11.3-9.229-28.4-8.403-42.8 0.593-14.4 1.383-28.8 1.433-43.2z"/>
                <path style="fill:#000000;fill-opacity:0.4" d="m35.97 86.76c-0.44-0.01-0.95 0.14-1.52 0.47-2.37 3.77 7.53 10.75 2.99 13.97-8.41 7.4-13.69 18.2-19.11 28.3-3.25 6.4-6.69 13-8.702 20 1.662 9.4 1.932 19 1.672 28.5 0 2-0.03 3.9-0.06 5.9 1.61 8.7 4.72 17.4 12.45 20.1 5.8 1.5 2.6-8.1 1.18-11.2-2.57-6.1-7.28-11.8-9.49-15.1-2.82-4-2.51-9.8-0.16-14.1 3.49-8.2 7.98-15.9 11.98-23.8 4.19-7.7 7.99-15.7 12.53-23.1 3.66-4.6 7.73 0.1 10.37 3.2 7.94 8.4 18.97 15.7 24.9 26.1 3.32 6.5 8.43 13.7 3.79 20.3-5.69 9.2-11.28 18.9-14.17 29.7-0.71 2.8-0.73 9.2 3.16 8.4 5.59-4.2 9.58-10.7 12.35-17.6 0.36-3.3 0.73-6.7 1.14-10 0.78-9.8 2.42-19.4 3.74-29.1-0.64-3.7-1.74-7.2-3.08-10.9-5.32-12.1-17.35-21.2-26.38-29.8-3.66-3.5-10.19-8.23-14.72-9.99-1.49-2.72-1.75-10.22-4.86-10.25z" />
                <path style="fill:#e50b0b;fill-opacity:1;" d="m66.93 208.9c7.93-5.3 12.97-14.1 15.98-22.9 2.37-7.9 4.07-16.1 3.41-24.3 1.28-8.7 0.94-18-2.74-26.1-6.93-12.8-16.45-24.3-27.76-33.5-4.59-3.7-9.98-6.37-15.56-8.23-2.19-3.29-2.66-13.2-8.13-10.36-2.74 3.99 6.84 9.09 1.45 12.5-9.92 7.79-15.92 19.29-22.11 29.99-5.886 10.8-12.37 22.2-11.37 34.9 1.793 6.7 3.706 13.4 4.332 20.4 2.176 10 8.548 20.3 18.86 23.4 7.1 1.6 2.85-8.5 0.99-11.8-3.35-6.5-9.01-11.2-14.51-15.8-3.578-4.2-3.423-10.4-0.746-15 3.916-8.7 9.076-16.8 13.63-25.2 4.8-8.1 9.1-16.6 14.32-24.5 4.27-4.8 9.4 0.2 12.73 3.4 9.97 8.9 19.88 18.1 27.48 29.2 4.29 6.8 7.02 16.5 1.64 23.6-6.55 9.8-12.97 20-16.05 31.4-0.75 3-0.52 9.8 4.16 8.9z" />
            </g>
        </svg>
    </div>
</main>
<script>
    // Silly take on this week's #CodePenChallenge - 500: Internal Server Error
    // Coded and designed with a lot of free time
    //
    //	To Do:
    //	- handle window resizing
    //	- tidy the code

    window.onload = init();

    function init() {
        // Countdown
        var counterContainer = document.getElementById("game-counter");
        var counter = 99;
        counterContainer.innerHTML = counter;

        // Max number of bugs on screen at a time
        var maxBugs = 5;
        // Store each obj here for easy Hit Check
        var bugs = [];

        // Viewport/Viewbox dimensions
        var viewBox = document.getElementById("game-canvas");
        var viewBoxWidth = viewBox.clientWidth,
            viewBoxHeight = viewBox.clientHeight;

        // THE DEADLY WEAPON
        var slipper = document.getElementById("slipper"),				// Target the whole slipper drawing (slipper + shadow)
            slipperShadow = document.getElementById("slipper-shadow"),	// Only the shadow
            slipperBody = document.getElementById("slipper-body"),		// Only the slipper
            slipperWidth = slipperBody.getBoundingClientRect().width,
            slipperHeight = slipperBody.getBoundingClientRect().height,
            slipperOffsetX = slipper.getBoundingClientRect().width - slipperWidth,		// slipper-body offsets relative to the whole svg
            slipperOffsetY = slipper.getBoundingClientRect().height - slipperHeight;

        // Track mouse to move the deadly weapon around
        viewBox.addEventListener("mousemove", mouseMoveHandler);
        // Click behaviour
        viewBox.addEventListener("mousedown", mouseDownHandler);
        viewBox.addEventListener("mouseup", mouseUpHandler);

        // Bug Constructor
        function Bug(x1, y1, x2, y2) {
            this.x1 = x1;
            this.y1 = y1;
            this.x2 = x2;
            this.y2 = y2;
            this.delay = Math.random()*4;
            this.timeoutID = undefined;
            this.deg = function() {return ((Math.atan((this.y2 - this.y1)/(this.x2 - this.x1))) + ((this.x2 - this.x1)/Math.abs(this.x2 - this.x1))*Math.PI/2) * 180/Math.PI;};
            this.t = function() {return (Math.sqrt(Math.pow(this.x2 - this.x1, 2) + Math.pow(this.y2 - this.y1, 2))/this.v);};
        }
        Bug.prototype.v = 350;			// Bug velocity
        // Bug.prototype.height = 26;	// Currently setting size via CSS
        Bug.prototype.draw = function() {
            var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
            this.svg = svg;
            svg.setAttribute("viewBox", "0 0 36 33");
            // svg.setAttribute("height", this.height + "px");	// Currently setting size via CSS
            svg.classList.add("bug");
            svg.innerHTML = "<path id='bug-shadow' style='fill:#000000;fill-opacity:.5' d='m27 17c0 10-7 16-9 16-3 0-8-6-8-16 0-9.2 2-17 8-17 7-0.24 9 7.6 9 17z'/><g id='bug-legs' style='fill:#000000;fill-opacity:.5;stroke:#fff;stroke-width:2;stroke-linecap:round;'><path id='leg1' class='leg' d='m11 13c-3.3-3.6-6.3-3.6-9.9-4'/><path id='leg2' class='leg' d='m23 13c4-3.7 7-3.7 11-4.1'/><path id='leg3' class='leg' d='m11 17c-4.8-2-6.8-1-11 0'/><path id='leg4' class='leg' d='m24 17c5-2 7-1 11 0'/><path id='leg5' class='leg' d='m12 21c-5.2 1-7.2 3-10 7'/><path id='leg6' class='leg' d='m23 21c5 1 7 3 10 7'/></g><path id='bug-body' style='fill:#fff;stroke:none;' d='m25 18c0 9-5 15-7 15-3 0-8.8-6-8.9-15 0-9.5 1.9-17 8.9-17 6 0.1 7 7.6 7 17z'/>";

            // Append to DOM
            viewBox.appendChild(svg);
            //Set starting coords and move around
            this.set();		// Note: setting coords before appending will work in Chrome but not in FF
            this.crawl();
        };
        Bug.prototype.set = function() {
            TweenLite.set(this.svg, {
                left: this.x1,
                top: this.y1,
                rotation: this.deg()
            });
        };
        Bug.prototype.crawl = function() {
            // When bug reaches its final point, reset its props
            var that = this;
            this.timeoutID = setTimeout(function(){that.update()}, 1000*(that.t() + that.delay));	// Time in ms
            // Move the bug around
            TweenLite.to(this.svg, this.t(), {	// Time in s
                left: this.x2,
                top: this.y2,
                delay: this.delay,
                ease: Power0.easeIn
            });
        };
        Bug.prototype.update = function() {
            // Meh. Can do better
            var coords = getRandomPoints();
            this.x1 = coords[0];
            this.y1 = coords[1];
            this.x2 = coords[2];
            this.y2 = coords[3];
            this.delay = Math.random()*4;
            this.set();
            this.crawl();
        };

        // Draw bugs
        for(var i=0; i < maxBugs; i++) {
            var coords = getRandomPoints();
            var bug = new Bug(coords[0], coords[1], coords[2], coords[3]);
            bugs.push(bug);
            bug.draw();
        };

        function mouseMoveHandler(e) {
            var mouseX = e.clientX - document.body.getBoundingClientRect().left,	// Calculates mouse coords in the context of game area - body element has a max-width set in CSS for big screens
                mouseY = e.clientY;

            var offset = document.getElementById("top-bar").getBoundingClientRect().height;	// Vertical offset to prevent the weapon to move over the topbar
            var newX, newY;

            // Limit x
            if(mouseX < slipperWidth/2) {
                newX = 0;
            } else if(mouseX > viewBoxWidth - slipperWidth/2) {
                newX = viewBoxWidth - slipperWidth;
            } else {
                newX = mouseX - slipperWidth/2;
            }
            // Limit y
            if(mouseY < offset + slipperHeight/2) {
                newY = offset - slipperOffsetY;
            } else if(mouseY > viewBoxHeight - slipperHeight/2 - slipperOffsetY) {
                newY = viewBoxHeight - slipperHeight - slipperOffsetY;
            } else {
                newY = mouseY - slipperHeight/2 - slipperOffsetY;
            }

            TweenLite.to(slipper, .1, {
                left: newX,
                top: newY
            });
        }

        function mouseDownHandler(e) {
            // Slipper animation: move the slipper and its shadow towards each other
            var slipperDx = Math.round(slipperOffsetX/2),
                slipperDy = Math.round(slipperOffsetY/2);
            TweenLite.to(slipperBody, .05, {
                x: slipperDx,
                y: -slipperDy,
                ease: Power2.easeIn
            });
            TweenLite.to(slipperShadow, .05, {
                x: -slipperDx,
                y: slipperDy,
                ease: Power3.easeIn
            });
            checkHit(e);
        }

        function mouseUpHandler() {
            // Restore original positions
            TweenLite.to(slipperBody, .1, {
                x: 0,
                y: 0,
                ease: Power2.easeIn
            });
            TweenLite.to(slipperShadow, .1, {
                x: 0,
                y: 0,
                ease: Power3.easeIn
            });
        }

        function checkHit(e) {
            if(bugs) {
                var slipperDy = Math.round(slipperOffsetY/2),
                    mouseX = e.clientX,
                    mouseY = e.clientY - slipperDy;	// account for slipper animation

                bugs.forEach(function(b) {
                    var bugEl = b.svg;
                    var bugX = bugEl.getBoundingClientRect().left,
                        bugY = bugEl.getBoundingClientRect().top;
                    if((bugX > mouseX - slipperWidth/2) && (bugX < mouseX + slipperWidth/2) && ((bugY > mouseY - slipperHeight/2) && (bugY < mouseY + slipperHeight/2))) {
                        clearTimeout(b.timeoutID);
                        b.update();
                        updateCounter();
                    }
                });
            } else {
                console.log("No bugs here!");
            }
        }

        function updateCounter() {
            if(counter > 0) {
                counter--;
                counterContainer.innerHTML = counter;
                animateCounter();
            }
            if(counter == 0) {
                bugs.forEach(function(b) {
                    // Stop bugs
                    clearTimeout(b.timeoutID);
                });
                showModal("Pheeew! That was exhausting! Thanks to your precious help, we got rid of some nasty bugs. We'll continue working, but in the meantime you can try a refresh!", "ok");
            }

            function animateCounter() {
                TweenLite.to(counterContainer, .2, {
                    scale: 1.5,
                    ease: Power2.easeIn
                });
                TweenLite.to(counterContainer, .2, {
                    delay: .2,
                    scale: 1,
                    ease: Power2.easeIn
                });
            }
        }

        // Helper: Returns two random points off screen to be used as parameters when animating bugs
        function getRandomPoints() {
            var coords = [];
            var bugSize = 40;	// WARNING: hardcoded! - should be at least its biggest dimension
            var xMax = viewBoxWidth + bugSize,
                yMax = viewBoxHeight + bugSize;
            // Define the possible coords in an array to choose from
            var bounds = [[Math.random()*xMax, -bugSize], [-bugSize, Math.random()*yMax], [Math.random()*xMax, yMax], [xMax, Math.random()*yMax]];

            var i = 0;
            while(i < 2) {
                var b = Math.floor(Math.random()*bounds.length);
                coords.push(bounds[b]);
                // Remove from options to avoid getting two points along the same border
                bounds.splice(b, 1);
                i++;
            }
            return coords.reduce(function(a,b) {return a.concat(b)});
        }

        function showModal(message, cta) {
            var modal = document.createElement("div");
            modal.classList.add("modal");
            modal.innerHTML = "<p>" + message + "</p><button onclick='closeModal(event)'>" + cta + "</button>";
            document.body.appendChild(modal);
        }
    }

    function closeModal(e) {
        e.preventDefault();
        var modal = e.target.parentNode;
        modal.classList.add("shrink");
        setTimeout(function() {
            modal.remove();
        }, 1000);
    }
</script>
</body>
</html>
