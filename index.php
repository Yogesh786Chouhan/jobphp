<?php require_once ('header.php'); ?>
<?php require_once ('navbar.php'); ?>

<?php
require_once ("db/connection.php");

// $query = "SELECT * FROM job_category";
$job_category_query = mysqli_query($connection, "SELECT * FROM job_category LIMIT 4");
// $result = mysqli_fetch_assoc($query);
// echo "<pre>";
// print_r($result);

$job_details = mysqli_query($connection, "SELECT * FROM job LIMIT 4");
// echo "<pre>";
// print_r($job_details);








?>




<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center"
                data-background="assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>Find the most exciting startup jobs</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- form -->
                            <form action="#" class="search-box">
                                <div class="input-form">
                                    <input type="text" placeholder="Job Tittle or keyword">
                                </div>
                                <div class="select-form">
                                    <div class="select-itms">
                                        <select name="select" id="select1">
                                            <option value="">Location BD</option>
                                            <option value="">Location PK</option>
                                            <option value="">Location US</option>
                                            <option value="">Location UK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-form">
                                    <a href="#">Find job</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Our Services Start -->
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>FEATURED TOURS Packages</span>
                        <h2>Browse Top Categories </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <?php

                while ($result = mysqli_fetch_assoc($job_category_query)) {
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-cms"></span>
                            </div>
                            <div class="services-cap">
                                <h5><a href="job_listing.php">
                                        <?php echo $result['category_name'] ?>
                                    </a></h5>
                                <!-- <h5><a href="#">Design & Development</a></h5> -->
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-app"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="job_listing.html">Mobile Application</a></h5>
                            <span>(658)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-high-tech"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="job_listing.html">Information Technology</a></h5>
                            <span>(658)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-content"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="job_listing.html">Content Writer</a></h5>
                            <span>(658)</span>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- More Btn -->
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="job_listing.html" class="border-btn2">Browse All Sectors</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services End -->
    <!-- Featured_job_start -->
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Recent Job</span>
                        <h2>Featured Jobs</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <?php while ($jobs = mysqli_fetch_assoc($job_details)) { ?>
                        <!-- single-job-content -->
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="job_details.php">
                                        <img width=70%, class="rounded-circle" height="80rem" ,
                                            style="max-width:500px; max-height:500px;"
                                            src="<?php echo 'admin/uploads/' . $jobs['company_logo'] ?>" alt="">


                                        <!-- <img width=70%, height="80rem;" style="max-width:500px; max-height:500px;" ,
                                            aspect-ratio="3/2" , object-fit="contain" ,
                                            src="<?php echo 'admin/uploads/' . $jobs['company_logo'] ?>" alt=""> -->
                                    </a>
                                </div>
                                <div class="job-tittle">
                                    <a href="job_details.php">
                                        <h4>
                                            <?php echo $jobs['job_title'] ?>
                                        </h4>
                                    </a>
                                    <ul>
                                        <li>
                                            <?php echo $jobs['company_name'] ?>
                                        </li>
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            <?php echo $jobs['location'] ?>
                                        </li>
                                        <li>
                                            $
                                            <?php echo $jobs['salary'] ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link f-right">
                                <a href="job_details.php">
                                    <?php echo $jobs['job_shift'] ?>
                                </a>
                                <span>
                                    <?php echo $jobs['created_date'] ?>
                                </span>
                            </div>
                        </div>
                    <?php } ?>


                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="job_details.html"><img src="assets/img/icon/job-list2.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="job_details.html">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="job_details.html">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="job_details.html"><img src="assets/img/icon/job-list3.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="job_details.html">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="job_details.html">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="job_details.html"><img src="assets/img/icon/job-list4.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="job_details.html">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="job_details.html">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured_job_end -->
    <!-- How  Apply Process Start-->
    <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        <span>Apply process</span>
                        <h2> How it works</h2>
                    </div>
                </div>
            </div>
            <!-- Apply Process Caption -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                        <div class="process-cap">
                            <h5>1. Search a job</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-curriculum-vitae"></span>
                        </div>
                        <div class="process-cap">
                            <h5>2. Apply for job</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="process-cap">
                            <h5>3. Get your job</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How  Apply Process End-->
</main>

<?php require_once ('footer.php'); ?>