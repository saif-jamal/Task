<!doctype html>
<html lang="en">
@include('Dashboard.Head')
<body>
@include('Dashboard.Nav')


<div class="Dashboard">
    <!-- Hero Unit -->
    <section class="hero-unit">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="large-12 columns">
                    <hgroup>
                        <h1>Analytics Lab.</h1>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, repudiandae.</h3>
                    </hgroup>


                    <ul class="small-block-grid-2 medium-block-grid-3 flip-cards">

                        <li ontouchstart="this.classList.toggle('hover');">
                            <div class="large button card-front">
                                <a href="#">Users</a><span class="text-white fa-2x mx-4">{{count($users)}}</span>
                                <i class="fa fa-users card-icon"></i>
                            </div>

                            <div class="panel card-back">
                                <i class="fa fa-users card-icon"></i>
                                <div class="hub-info">
                                    <a href="#">Users</a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, quam!</p>
                                </div>
                            </div>
                        </li>

                        <li ontouchstart="this.classList.toggle('hover');">
                            <div class="large button card-front">
                                <a href="#">Patients </a><span class="text-white fa-2x mx-4">{{count($Patients)}}</span>
                                <i class="fa-solid fa-bed-pulse text-white d-block fa-2x"></i>
                            </div>
                            <div class="panel card-back">
                                <i class="fa-solid fa-bed-pulse text-white"></i>
                                <div class="hub-info">
                                    <a href="#">Patients</a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ducimus ea eum maiores nisi odit quaerat quo reiciendis. Cumque, qui?</p>
                                </div>

                            </div>
                        </li>

                        <li ontouchstart="this.classList.toggle('hover');">
                            <div class="large button card-front">
                                <a href="#">Medical Staff</a><span class="text-white fa-2x mx-4">{{count($medicalstaff)}}</span>
                                <i class="fa-solid fa-user-doctor text-white fa-2x d-block"></i>
                            </div>

                            <div class="panel card-back">
                                <i class="fa-solid fa-user-doctor text-white fa-2x"></i>
                                <div class="hub-info">
                                    <a href="#">Medical Staff</a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta facilis ipsum modi odit officiis omnis vitae voluptate. Expedita fuga, saepe.</p>
                                </div>

                            </div>
                        </li>

                        <li ontouchstart="this.classList.toggle('hover');">
                            <div class="large button card-front">
                                <a href="#">Notification</a>
                                <i class="fa fa-paper-plane-o card-icon"></i>
                            </div>

                            <div class="panel card-back">
                                <i class="fa fa-paper-plane-o card-icon"></i>
                                <div class="hub-info">
                                    <a href="#">Notification</a>
                                    <p>show All action</p>
                                </div>

                            </div>
                        </li>

                        <li ontouchstart="this.classList.toggle('hover');">
                            <div class="large button card-front">
                                <a href="#">News</a><span class="text-white fa-2x mx-4">{{count($news)}}</span>
                                <i class="fa fa-map-o card-icon"></i>
                            </div>

                            <div class="panel card-back">
                                <i class="fa fa-map-o card-icon"></i>
                                <div class="hub-info">
                                    <a href="#">News</a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam, aliquid cum id quis repellat.</p>
                                </div>

                            </div>
                        </li>

                        <li ontouchstart="this.classList.toggle('hover');">
                            <div class="large button card-front">
                                <a href="#">Language</a>
                                <i class="fa-solid fa-rss text-white fa-2x d-block"></i>
                            </div>

                            <div class="panel card-back">
                                <i class="fa-solid fa-rss text-white fa-2x"></i>
                                <div class="hub-info">
                                    <a href="#">Language</a>
                                    <p>Take your Korean from "foreign" to fluent with vocab lists and grammar guides.</p>
                                </div>
                            </div>
                        </li>



                    </ul>
                </div>



            </div>
        </div>
    </section>

</div>



@include('Dashboard.Footer')
@include('Dashboard.Bottom')
</body>
</html>
