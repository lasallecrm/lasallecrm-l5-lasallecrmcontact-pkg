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

        <div class="col-md-2"></div>

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

@if ($single_contact_display_contact_form)

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 ">


                {{-- START CONTACT FORM --}}

                {{-- THIS IS THE FORM ITSELF! --}}

                <div class="alert alert-info"><h2>Contact {!! $people->first_name !!} {!! $people->middle_name !!} {!! $people->surname !!}</h2></div>


                {!! Form::open(['route' => 'contact-processing.step-two', 'class' => 'form form-inline' ]) !!}


                <div style="margin-bottom: 25px; margin-left: 25px; margin-top: 25px;" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control" type="text" name="name" required placeholder=" name" style="font-size:150%">


                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                </div>
                <br />




                <div style="margin-bottom: 25px; margin-left: 25px;" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input class="form-control" type="email" name="email" required placeholder=" email" style="font-size:150%">
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
                <br />


                <div style="margin-bottom: 25px; margin-left: 25px;" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                    {!! Form::textarea('comment', null, ['size' => '30x3', 'class' => 'form-control', 'style' => 'font-size: 150%', 'required' => 'required', 'placeholder' => 'message']) !!}
                    {!! $errors->first('comment', '<span class="help-block">:message</span>') !!}
                </div>
                <br />


                {!! Form::hidden('to_email', $email) !!}
                {!! Form::hidden('to_name', $people->first_name.' '.$people->middle_name.' '.$people->surname) !!}


                <div style="margin-bottom: 25px; margin-left: 25px;" >
                    {!! Form::submit('Contact '.$people->first_name.' '.$people->middle_name.' '.$people->surname.'!', ['class' => 'btn btn-outline-dark'] ) !!}
                </div>
                <br /><br />

                {!! Form::close() !!}


                {{-- END: CONTACT FORM --}}


            </div>
            <div class="col-md-2">
        </div>
    </div>

@endif