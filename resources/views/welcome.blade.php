@extends('app')

@section('content')

        <!-- Page Content -->
<div class="container">

    <div class="row">

        <h2>Welcome to Room Booking Portal</h2>

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="../images/auditorium-572776_1280.jpg" alt="First Slide">
                </div>
                <div class="item">
                    <img src="../images/conference-room_1280.jpg" alt="Second Slide">
                </div>
                <div class="item">
                    <img src="../images/classroom-1008856_1280.jpg" alt="Third Slide">
                </div>
            </div>
            <!-- Carousel controls -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>

        <div class="col-lg-12 text-center">
            <h3>CS682 Course Project</h3>
        </div>
    </div>
    <!-- /.row -->

</div>

<blockquote class="blockquote-reverse">
    <footer>
        Developed by Sanket and Abhay &copy as part of CS682:Software Engineering Course Project under guidance of <i>Prof. G. Sivakumar</i>
    </footer>
</blockquote>



@endsection