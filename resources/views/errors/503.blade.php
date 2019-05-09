<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<html>
    <head>
        <title>Be right back.</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style>
            html, body {
                height: 100%;
                background: #EAEAEA !important;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-size:25px;">Welcome to  BryanChoy.com</div>
                        <div class="panel-body">
                            <div class="title"> <span class="glyphicon glyphicon glyphicon-wrench" aria-hidden="true">  </span> Error 503</div>
                            <div class="title" style="font-size: 50px;color: #2e3436;">Sorry we're down for maintenance!<br></div>
                            <div class="title" style="font-size: 40px;color: #2e3436;">We will be back soon!<br></div>
                        </div>
                    </div>
                </div>
            </div>
			<footer style="text-align: center;color: black">
				<p>
					<a href="{{ url('http://opensource.org/licenses/MIT')}}" style="color: #BD5D38 !important;"> Website designed by Kavier Koo</a>
					<br>
					For more information, please contact developer via <a href="{{url('http://kavierkoo.com/#contact ')}}" style="color: #b1b7ba !important;">Here</a> .
				</p>
			</footer>
		</div>

    </body>
</html>