<!DOCTYPE html>
<html class="" lang="en">
<head>
<meta name="author" content="DailyJobs">
    
    <!-- Dynamic Meta Tags with Fallback Values -->
    <meta name="title" content="{{ $metaData['meta_title'] ?? 'DailyJobs - Find Latest Jobs in Pakistan' }}">
    <meta name="description" content="{{ $metaData['meta_description'] ?? 'Find the latest job opportunities in Pakistan and apply today.' }}">
    <meta name="keywords" content="{{ $metaData['meta_keywords'] ?? 'jobs, careers, employment' }}">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:title" content="{{ $metaData['meta_title'] ?? 'DailyJobs - Find Latest Jobs in Pakistan' }}">
    <meta property="og:description" content="{{ $metaData['meta_description'] ?? 'Find the latest job opportunities in Pakistan and apply today.' }}">
    <meta property="og:image" content="{{ asset('assets/img/job-banner.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets')}}/img/favicon.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/bootstrap/css/bootstrap-select.min.css">
    <link href="{{asset('assets')}}/plugins/icons/css/icons.css" rel="stylesheet">
    <link href="{{asset('assets')}}/plugins/animate/animate.css" rel="stylesheet">
    <link href="{{asset('assets')}}/plugins/bootstrap/css/bootsnav.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/nice-select/css/nice-select.css">
    <link href="{{asset('assets')}}/plugins/aos-master/aos.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/responsive.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&amp;display=swap" rel="stylesheet">
</head>
<body class="utf_skin_area">
