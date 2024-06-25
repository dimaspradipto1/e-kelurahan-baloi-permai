<!doctype html>
<html lang="en">
  <head>
  	<title>Calendar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('/dashboard/calendar/css/style.css') }}">

	</head>
	<body>
  <div class="container mb-2">
    <div class="row">
      <div class="col-md-12">
        <div class="elegant-calencar d-md-flex">
          <div class="wrap-header d-flex align-items-center img" style="background-image: url('{{ asset('dashboard/calendar/images/bg-kelurahan.jpg') }}');">
            <p id="reset">Today</p>
            <div id="header" class="p-0">
              <div class="head-info">
                <div class="head-month"></div>
                  <div class="head-day"></div>
              </div>
            </div>
          </div>
          <div class="calendar-wrap">
            <div class="w-100 button-wrap">
              <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
              <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
            </div>
            <table id="calendar" class="table table-strip">
              <thead>
                  <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <t></t>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


	<script src="{{ asset('/dashboard/calendar/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/dashboard/calendar/js/popper.js') }}"></script>
  <script src="{{ asset('/dashboard/calendar/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/dashboard/calendar/js/main.js') }}"></script>

	</body>
</html>

