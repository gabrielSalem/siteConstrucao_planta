/*jslint browser: true */
var CircleDrawer = function (view, undoManager) {
    "use strict";

    var CANVAS_WIDTH = document.getElementById(view).width,
        CANVAS_HEIGHT = document.getElementById(view).height,
        MIN_CIRCLE_RADIUS = 10,
        MAX_CIRCLE_RADIUS = 40,
        drawingContext,
        circles = [],
        circleId = 0,
        drawingCanvas = window.document.getElementById(view),
        dragging = false,
        dragStartLocation,
        snapshot,
        q = 0,
        letra = ['','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

    if (drawingCanvas.getContext === undefined) {
        return;
    }

    drawingContext = drawingCanvas.getContext('2d');

    drawingCanvas.addEventListener('mousedown', dragStart, false);
    drawingCanvas.addEventListener('mousemove', drag, false);
    drawingCanvas.addEventListener('mouseup', dragStop, false);

    function getCanvasCoordinates(event) {
        var x = event.clientX - drawingCanvas.getBoundingClientRect().left,
            y = event.clientY - drawingCanvas.getBoundingClientRect().top;
        return {x: x, y: y};
    }

    function takeSnapshot() {
        snapshot = drawingContext.getImageData(0, 0, drawingCanvas.width, drawingCanvas.height);
    }

    function restoreSnapshot() {
        drawingContext.putImageData(snapshot, 0, 0);
    }


    function dragStart(event) {
        dragging = true;
        dragStartLocation = getCanvasCoordinates(event);
        takeSnapshot();
        q++;
    }

    function drag(event) {
        var position;
        if (dragging === true) {
            restoreSnapshot();
            position = getCanvasCoordinates(event);
        }

    }
    function dragStop(event) {
        dragging = false;
        restoreSnapshot();
        var position = getCanvasCoordinates(event);
    }
    /********************************/

    function clear() {
        drawingContext.clearRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
    }

    function drawLine(x, y, color, posX,posY, qq,cor) {
        if(letra[qq]!=undefined){
            drawingContext.beginPath();
            drawingContext.shadowBlur = "#e3e3e3";
            drawingContext.shadowColor = "black";
            drawingContext.lineCap = "round";    
            drawingContext.fillStyle = cor;    
            drawingContext.strokeStyle = cor;    
            drawingContext.lineWidth = "3";
            drawingContext.lineHeight = "3";
            drawingContext.font = "20px arial";
            drawingContext.fillText(letra[qq], x-6, y-9);
            drawingContext.moveTo(posX,posY);
            drawingContext.lineTo(x, y);
            drawingContext.arc(x-4,y-2,4, 0, Math.PI*2,true);
            drawingContext.arc(posX-4,posY-2,4, 0, Math.PI*2,true);
            
            drawingContext.stroke();
            drawingContext.fill();
        }else{
            alert("Está limitado a 26 retas");
        }
    }

    function draw() {
        clear();
        var i,
            circle;
        for (i = 0; i < circles.length; i = i + 1) {
            circle = circles[i];
            drawLine(circle.x, circle.y, circle.color, circle.xF,circle.yF,circle.leg, circle.cor);
            console.log("ID: "+circle.id);
            console.log("LETRA: "+circle.leg);
            console.log("COR: "+circle.cor);
            console.log("X: "+circle.x);
            console.log("Y: "+circle.y);
            console.log("X2: "+circle.xF);
            console.log("Y2: "+circle.yF);
        }
    }

    function removeCircle(id) {
        var i = 0, index = -1;
        for (i = 0; i < circles.length; i += 1) {
            if (circles[i].id === id) {
                index = i;
            }
        }
        if (index !== -1) {
            circles.splice(index, 1);
        }
        draw();
    }

    function createCircle(attrs) {
        circles.push(attrs);
        draw();
        undoManager.add({
            undo: function () {
                removeCircle(attrs.id);                
            },
            redo: function () {
                createCircle(attrs);
            }
        });
    }

    if(q <= 26){
        drawingCanvas.addEventListener("click", function (e) {

            var mouseX = 0,
                mouseY = 0,
                cor,
                id = circleId;

            var color = document.getElementById("cor").value;
            id = id + 1;

            var mouseX = 0,
                mouseY = 0;

                if (!e) {
                    e = window.event;
                }
                if (e.pageX || e.pageY) {
                    mouseX = e.pageX;
                    mouseY = e.pageY;
                } else if (e.clientX || e.clientY) {
                    mouseX = e.clientX + document.body.scrollLeft
                        + document.documentElement.scrollLeft;
                    mouseY = e.clientY + document.body.scrollTop
                        + document.documentElement.scrollTop;
                }
                mouseX -= drawingCanvas.offsetLeft;
                mouseY -= drawingCanvas.offsetTop;

                if(q <= 26){
                    var ref = ['','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
                    var form = document.getElementById("divForm");
                    var input = document.createElement("INPUT");
                    var div = document.createElement("div");
                    
                    input.setAttribute("type", "text");
                    input.setAttribute("id", "ref" + q);
                    input.setAttribute("name", "lsRef"+q);
                    input.setAttribute("placeholder", ref[q]);

                    div.setAttribute("id", "lsRef" + q);
                    div.setAttribute("name", "lsRef" + q);

                    form.appendChild(input);
                }
            createCircle({
                id: id,
                x: dragStartLocation.x,
                y: dragStartLocation.y,
                xF: mouseX,
                yF: mouseY,
                cor: color,
                leg: q
            });
        }, false);
    }
};

//PEga os valores e coloca na última função
