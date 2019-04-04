<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">

    <title>Reserve a Ferry Ticket</title>
  </head>

  <body>
    <h1>Washington State Ferries Vehicle Reservations</h1>

    <form action="process.php" method="get" name="reservationForm" onsubmit="return validateSubmission();">
      <div class="route">
        <h3>Select a route</h3>
        Departing from:
        <select value="departure" class="departure" name="departure" onchange="removeFromArrival()">
        </select>
        <br><br>
        Arriving at: <br>
        <select value="arrival" name="arrival" class="arrival">
        </select>
      </div>

      <div class="date">
        <h3>Select your travel date</h3>
        <input type="date" name="date" class="dateSelection">
      </div>

      <div class="vehicle">
        <h3>Vehicle size </h3>
        Vehicle length: 
        <select value="carLength" name="carLength" class="carLength" onchange="carSize()">
          <option value="under22">Vehicle under 22 feet</option>
          <option value="over22">Vehicle 22 feet and over</option>
          <option value="motorcycle">Motorcycle</option>
        </select>
        <div class="additionalOptions">

        </div>
      </div>
      <br>
      <input type="submit" value="Reserve Spot" class="btn">
    </form>

    <script>
      const departure = document.querySelector('.departure');
      const arrival = document.querySelector('.arrival');
      const dateSelection = document.querySelector('.dateSelection');
      const carLength = document.querySelector('.carLength');
      const additionalOptions = document.querySelector('.additionalOptions');


      // setting the earliest date choice on the calendar to be today's date
      var dtToday = new Date();
          
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
          month = '0' + month.toString();
      if(day < 10)
          day = '0' + day.toString();
      
      var minDate = year + '-' + month + '-' + day;
      dateSelection.min = minDate;


      carLength.value = '';

      var departure_options = ['Anacortes', 'Friday Harbor', 'Coupeville', 'Lopez Island', 
      'Orcas Island', 'Port Townsend', 'Shaw Island', 'Sidney B.C.'];

      for (var i = 0; i < departure_options.length; i++) {
          departure.add(new Option(departure_options[i]));
      }

      departure.value = '';
      arrival.value = '';

      function removeFromArrival() {
        for (var i = 0; i < departure_options.length - 1; i++) {
          arrival.remove(0);
        }
        var arrival_options = [];
        var selected = departure.value;
        for (var i = 0; i < departure_options.length; i++) {
          if (selected != departure_options[i]) {
            arrival.add(new Option(departure_options[i]));
          }
        }
      }

      // acts based upon car size
      function carSize() {
        console.log(carLength.value);
        // if car length under 22, just add height HTML
        if (carLength.value == 'under22') {
          var html = '<br> Vehicle Height: '
          html += '<select value="carHeight" name="carHeight" class="carHeight">' +
          '<option value="height1">Under 7\'2\" tall</option>' +
          '<option value="height2">7\'2" to 7\'6" tall</option>' +
          '<option value="height3">7\'6" to 13\' tall</option>' +
          '<option value="height4">Over 13\' tall</option></select>'
          
          additionalOptions.innerHTML = html;
        }

        // if car length is over 22 feet, add new options
        if (carLength.value == 'over22') {
          var html = '';
          html += '<br>Total Vehicle Length (feet): <input type="number" name="totalLength" class="totalLength"><br>'

          html += '<br> Vehicle Height: '
          html += '<select value="carHeight" name="carHeight" class="carHeight">' +
          '<option value="height1">Under 7\'2\" tall</option>' +
          '<option value="height2">7\'2" to 7\'6" tall</option>' +
          '<option value="height3">7\'6" to 13\' tall</option>' +
          '<option value="height4">Over 13\' tall</option></select>'
          additionalOptions.innerHTML = html;
        }

        // if car is a motorcycle, add new options
        if (carLength.value == 'motorcycle') {
          var html = '<br>';

          html += '<input type="checkbox" name="sidecar" class="sidecar" value="true"> with Sidecar or with more than 2 wheels<br>' +
          '<input type="checkbox" name="trailer" class="trailer" value="true"> with Trailer '

          additionalOptions.innerHTML = html;
        }
      }

      // form submission
      function validateSubmission() {
        if (departure.value == '' || arrival.value == '') {
          alert('Please enter departure/arrival destination');
          return false;
        } else if (dateSelection.value == '') {
          alert('Please enter valid trip date')
          return false;
        } else if (carLength.value == '') {
          alert('Please enter car size information')
          return false;
        }

        if (carLength.value == 'over22') {
          const totalLength = document.querySelector('.totalLength');

          if (totalLength.value == '') {
            alert('please enter valid total vehicle length');
            return false;
          } else if (totalLength.value < 22) {
            alert('If vehicle is less than 22 feet total length, please select different Vehicle Length option')
            return false;
          }
        }
        return true;
      }
    </script>
  </body>
</html>