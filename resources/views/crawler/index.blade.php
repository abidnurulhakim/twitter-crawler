<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="page-header">Form Twitter Crawler</h2>
            </div>
            <div class="col-sm-12">
                {!! Form::open(array('id' => 'form-crawler', 'class' => 'form-horizontal','route' => 'crawler.crawling'))!!}
                  <div class="form-group">
                    <label for="inputQuery">Query</label>
                    <input type="text" class="form-control" id="input-query" name="query" placeholder="Query">
                  </div>
                  <div class="form-group">
                    <label for="inputLatitude">Latitude</label>
                    <input type="number" step="any" class="form-control" id="input-latitude" name="latitude" placeholder="Latitude">
                  </div>
                  <div class="form-group">
                    <label for="inputLongitude">Longitude</label>
                    <input type="number" step="any" class="form-control" id="input-longitude" name="longitude" placeholder="Longitude">
                  </div>
                  <div class="form-group">
                    <label for="inputRange">Range</label>
                    <input type="number" step="any" class="form-control" id="input-range" name="range" placeholder="Range">
                  </div>
                  <div class="form-group">
                    <label for="inputResultTyp>">Result Type</label>
                      <select class="form-control" id="resultType">
                        <option value="recent">Recent</option>
                        <option value="popular">Popular</option>
                        <option value="mixed">Mixed</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="inputResultTyp>">Automate Crawling</label>
                    <div class="checkbox">
                      <label><input type="checkbox" id="checkAuto" value="automatic">Automatic</label>
                    </div>
                  </div>
                  <div class="col-sm-12 text-center">
                    <div id="btn-submit" class="btn btn-primary">Crawl</div>
                  </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</html>
