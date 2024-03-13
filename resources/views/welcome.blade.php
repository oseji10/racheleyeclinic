<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Drawing App</title>
</head>
<body>
    <!-- Canvas element where the drawing will appear -->
    <canvas id="canvas" width="800" height="600">jj</canvas>
<P>OOO</P>
    <!-- Include Fabric.js library -->
    <script src="{{ url('/node_modules/fabric/dist/fabric.js') }}"></script>

    <!-- Your custom JavaScript code -->
    {{-- <script src="{{ asset('public/assets/js/drawing.js') }}"></script> --}}
    <script src="{{ asset('/drawing.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script> --}}

</body>
</html>
