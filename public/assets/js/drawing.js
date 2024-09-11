// resources/js/drawing.js
document.addEventListener('DOMContentLoaded', function () {
    // Create a new Fabric.js canvas instance
    var canvas = new fabric.Canvas('canvas');

    // Add event listeners for drawing
    canvas.on('mouse:down', function (options) {
        var pointer = canvas.getPointer(options.e);
        var x = pointer.x;
        var y = pointer.y;
        var circle = new fabric.Circle({
            radius: 10,
            fill: 'red',
            left: x,
            top: y
        });
        canvas.add(circle);
    });
});
