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

    <style type="text/css">
        /* Content */
        .content {
            padding-top: 30px;
        }

        /* Testimonials */
        .testimonials blockquote {
            background: #f8f8f8 none repeat scroll 0 0;
            border: medium none;
            color: #666;
            display: block;
            font-size: 14px;
            line-height: 20px;
            padding: 15px;
            position: relative;
        }
        .testimonials blockquote::before {
            width: 0;
            height: 0;
            right: 0;
            bottom: 0;
            content: " ";
            display: block;
            position: absolute;
            border-bottom: 20px solid #fff;
            border-right: 0 solid transparent;
            border-left: 15px solid transparent;
            border-left-style: inset; /*FF fixes*/
            border-bottom-style: inset; /*FF fixes*/
        }
        .testimonials blockquote::after {
            width: 0;
            height: 0;
            right: 0;
            bottom: 0;
            content: " ";
            display: block;
            position: absolute;
            border-style: solid;
            border-width: 20px 20px 0 0;
            border-color: #e63f0c transparent transparent transparent;
        }
        .testimonials .carousel-info img {
            border: 1px solid #f5f5f5;
            border-radius: 150px !important;
            height: 75px;
            padding: 3px;
            width: 75px;
        }
        .testimonials .carousel-info {
            overflow: hidden;
        }
        .testimonials .carousel-info img {
            margin-right: 15px;
        }
        .testimonials .carousel-info span {
            display: block;
        }
        .testimonials span.testimonials-name {
            color: #e6400c;
            font-size: 16px;
            font-weight: 300;
            margin: 23px 0 7px;
        }
        .testimonials span.testimonials-post {
            color: #656565;
            font-size: 12px;
        }
    </style>


</head>



{{-- http://bootsnipp.com/snippets/featured/responsive-simple-testimonials --}}
@foreach ($contacts as $contact)
<div class="container content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="testimonials">
                <div class="active item">

                    <div class="carousel-info">

                        <img
                                class="img-responsive img-circle pull-left"
                                src="{{{ Config::get('app.url') }}}/{{{ Config::get('lasallecmsfrontend.images_folder_uploaded') }}}/{!! $contact['featured_image'] !!}"
                                alt="{!! $contact['first_name'] !!} {!! $contact['middle_name'] !!} {!! $contact['surname'] !!}"
                                width="492"
                                height="325"
                                style="display: block; margin-left: auto; margin-right: auto"
                        >

                        <div class="pull-left">
                            <span class="testimonials-name">
                                <a href="{{{ Config::get('app.url') }}}/index.php/lasallecrmcontact/{!! $contact['link'] !!}">
                                    {!! $contact['first_name'] !!} {!! $contact['middle_name'] !!} {!! $contact['surname'] !!}</span>
                                </a>
                            <span class="testimonials-post">{!! $contact['position'] !!}</span>
                            <span class="testimonials-post">{!! $contact['email'] !!}</span>
                            <span class="testimonials-post">{!! $contact['telephone'] !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<br /><br />