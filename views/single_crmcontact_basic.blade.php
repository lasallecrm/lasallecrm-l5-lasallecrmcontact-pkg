<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">

   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">

    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<div class="container">

    {{-- http://bootsnipp.com/iframe/d0jrk --}}

    <div class="row">

        <div class="col-md-2 col-md-push-2">

        </div>

        <div class="col-md-8 ">

            <div><br /><br /></div>

            <!-- div class="alert alert-info"></div -->

            <img
                    class="img-responsive img-circle"
                    src="{{{ Config::get('app.url') }}}/{{{ Config::get('lasallecmsfrontend.images_folder_uploaded') }}}/{!! $people->featured_image !!}"
                    alt="{!! $people->first_name !!} {!! $people->middle_name !!} {!! $people->surname !!}"
                    width="492"
                    height="325"
                    style="display: block; margin-left: auto; margin-right: auto"
            >

            <div><br /><br /></div>

            <div style="text-align: center;">{!! $people->first_name !!} {!! $people->middle_name !!} {!! $people->surname !!}</div>

            <div style="text-align: center;">{!! $people->position !!}</div>

            <div><br /><br /></div>

            <div>{!! $people->profile !!}</div>

            <hr />

            <div><i class="fa fa-envelope-o"></i> {!! $email !!}</div>

            <hr />

            <div><i class="fa fa-phone"></i> {!! $telephone !!}</div>

            <hr />

            <div><br /><br /></div>

        </div>


        <div class="col-md-2">

        </div>

    </div>


</div>
