@extends('layouts.master')

@section('content')
    <p id="power">0</p>
@stop

@section('footer')
    <!-- script src="{ { asset('js/socket.io-1.3.4.js') } }"></script -->
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
    <script>
        //var socket = io('http://localhost:8988');
        var socket = io('http://salman.local:8988');
        socket.on("test-channel:App\\Events\\EventTest", function(message){
            // increase the power everytime we load test route
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });
    </script>
@stop