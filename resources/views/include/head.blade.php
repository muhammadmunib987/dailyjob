<!DOCTYPE html>
<html class="" lang="en">
<head>
<meta name="author" content="DailyJobs">
    
    <!-- Dynamic Meta Tags with Fallback Values -->
    <meta name="title" content="{{ $metaData['meta_title'] ?? 'DailyJobs - Find Latest Jobs in Pakistan' }}">
    <meta name="description" content="{{ $metaData['meta_description'] ?? 'Find the latest job opportunities in Pakistan and apply today.' }}">
    <meta name="keywords" content="{{ $metaData['meta_keywords'] ?? 'jobs, careers, employment' }}">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
    {{-- layouts/partials/header.blade.php --}}
        <meta property="og:title" content="{{ $meta_title ?? 'DailyJobs - Find Latest Jobs in Pakistan' }}">
        <meta property="og:description" content="{{ $meta_description ?? 'Find the latest job opportunities in Pakistan and apply today.' }}">
        <meta property="og:image" content="https://dailyjobs.com.pk/public/assets/img/logo.png">
        <meta property="og:url" content="{{ $meta_url ?? url()->current() }}">
        <meta property="og:type" content="website">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $meta_title ?? 'DailyJobs - Find Latest Jobs in Pakistan' }}">
        <meta name="twitter:description" content="{{ $meta_description ?? 'Find the latest job opportunities in Pakistan and apply today.' }}">
        <meta name="twitter:image" content="https://dailyjobs.com.pk/public/assets/img/logo.png">

        
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/assets')}}/img/favicon.png" />
    <meta name="google-site-verification" content="U_-hmlJ9Xvkl8oAHHT-caqmZp8xPhlBJbgBkulyk8FY" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/bootstrap/css/bootstrap-select.min.css">
    <link href="{{asset('public/assets')}}/plugins/icons/css/icons.css" rel="stylesheet">
    <link href="{{asset('public/assets')}}/plugins/animate/animate.css" rel="stylesheet">
    <link href="{{asset('public/assets')}}/plugins/bootstrap/css/bootsnav.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/nice-select/css/nice-select.css">
    <link href="{{asset('public/assets')}}/plugins/aos-master/aos.css" rel="stylesheet">
    <link href="{{asset('public/assets')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('public/assets')}}/css/custom.css" rel="stylesheet">
    <link href="{{asset('public/assets')}}/css/responsive.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&amp;display=swap" rel="stylesheet">
</head>
<body class="utf_skin_area">
