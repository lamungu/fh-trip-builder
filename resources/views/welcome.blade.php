<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="card-panel row">
                <div class="col s12">
                    <form>
                        <div class="input-field col s5">
                            <select class="origins" id="origin">
                                <option>Select a country</option>
                            </select>
                            <label>From:</label>
                        </div>
                        <div class="input-field col s5">
                            <select id="destination" class="destinations">
                                <option>Select a country</option>
                            </select>
                            <label>To:</label>
                        </div>
                        <div class="input-field col s2">
                            <a class="btn addFlight">GO</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-panel trip">
                <h4 class="trip-name"></h4>
                <table>
                    <thead>
                        <tr>
                            <th>
                                Origin
                            </th>
                            <th>
                                Destination
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="flights">

                    </tbody>
                </table>
            </div>
        </div>
        <script src="js/all.js" type="text/javascript"></script>
        <script type="text/javascript">

            // Get All Airports
            $.ajax({
                url: '/api/v1/airports',
                type:'GET',
                success: function(data) {
                    for (var i = 0; i < 10; i++) {
                        $('select.origins').append($('<option>', {
                            value: data[i].id,
                            text: data[i].name + " (" + data[i].icao + ")"
                        }));
                        $('select.destinations').append($('<option>', {
                            value: data[i].id,
                            text: data[i].name + " (" + data[i].icao + ")"
                        }));
                        $('select').material_select();
                    }
                },
                error: function() {
                    console.log('error');
                }
            });

            // Get All Trips
            $.ajax({
                url: '/api/v1/trips/1',
                type:'GET',
                success: function(data) {
                    $('.trip-name').html(data.name);
                    $.each(data.flights, function(i,item) {
                        $('tbody.flights').append("<tr><td>" +
                            item.origin +
                            "</td><td>" +
                            item.destination +
                            "</td><td><button class='btn'>Remove</button></td>");
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });

            // Add Flight to Trip
            $('.addFlight').click(function () {
                var flight = {
                    "origin": $("#origin").val(),
                    "destination": $("#destination").val()
                };
                $.ajax({
                    url: '/api/v1/trips/1/flights',
                    type:'POST',
                    data: flight,
                    success: function(data) {
                        console.log(data);
                    },
                    error: function() {
                        console.log(error);
                    }
                });
            });

            $(document).ready(function() {
                $('select').material_select();
            });
        </script>
    </body>
</html>
