var Draw = {
    obj : document.getElementById('canvas'),
    contexto : document.getElementById('canvas').getContext("2d"),
    _init:function(){
        Draw.obj.onmousemove = Draw._over;
        Draw.obj.onmousedown = Draw._ativa;
        Draw.obj.onmouseup = Draw._inativa;
        Draw.obj.onclick = Draw._fim;
        Draw.obj.onselectstart = function () { return false; };
    },
    _over:function(e){
        if(!Draw.ativo) return;
        Draw.contexto.beginPath();
        Draw.contexto.lineTo(Draw.a,Draw.b);
        Draw.contexto.lineTo(Draw.c,Draw.d);
        Draw.contexto.stroke();
        Draw.contexto.closePath();
        Draw.x = e.layerX;
        Draw.y = e.layerY;
    },
    _ativa:function(e){
        Draw.x = e.layerX;
        Draw.y = e.layerY;
        Draw.contexto.font = "25px Arial";
        Draw.contexto.fillStyle = "black";
        Draw.contexto.fillText("•", Draw.x-4, Draw.y+8);
        Draw.contexto.font = "25px Arial";
        Draw.contexto.fillStyle = "black";
        // Draw.contexto.fillText("*", Draw.x+8, Draw.y-7);
        Draw.contexto.lineWidth = 2;
        Draw.a = Draw.x;
        Draw.b = Draw.y;
    },
    _inativa:function(){
        Draw.ativo = false;
        Draw.c = Draw.x-2;
        Draw.d = Draw.y-2;
    },
    _fim:function(){   
        Draw.contexto.font = "25px Arial";
        Draw.contexto.fillStyle = "black";
        Draw.contexto.fillText("•", Draw.x-4, Draw.y+8);
    }
}
Draw._init();

