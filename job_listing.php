<?php require_once ("header.php") ?>
<?php require_once ("navbar.php") ?>


<?php
require_once ("db/connection.php");

// Get Category from tablename "job_category"
$category_query = "SELECT * FROM job_category";
$category_result = mysqli_query($connection, $category_query);

// Get Category from tablename "job"
$job_query = "SELECT * FROM job";
$job_result = mysqli_query($connection, $job_query);
// print_r(mysqli_fetch_assoc($job_result));

// $a = mysqli_fetch_assoc($job_result);

// foreach ($a as $key => $value) {

//     echo "$key => $value <br>";
//     // echo $value['job_shift'];
// }


// echo "<pre>";
// print_r(mysqli_fetch_assoc($job_result));


?>


<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Get your job</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- Job List Area Start -->
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <!-- Left content -->
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                            d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                    </svg>
                                </div>
                                <h4>Filter Jobs</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Job Category Listing start -->
                    <div class="job-category-listing mb-50">
                        <!-- single one -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Job Category</h4>
                            </div>
                            <!-- Select job items start -->
                            <div class="select-job-items2">
                                <form action="job_listing.php" method="post">
                                    <select name="fetchval" class="catName" id="fetchval">
                                        <option selected value="All Category">All Category</option>
                                        <?php while ($category_data = mysqli_fetch_assoc($category_result)) { ?>
                                            <option value="<?php echo $category_data['category_name'] ?>">
                                                <?php echo $category_data['category_name'] ?>
                                            </option>
                                            <!-- <opt+ion value="">Category 1</opt+ion>
                                        <option value="">Category 2</option>
                                        <option value="">Category 3</option>
                                        <option value="">Category 4</option> -->
                                        <?php } ?>
                                    </select>
                                </form>
                            </div>
                            <!--  Select job items End-->
                            <!-- select-Categories start -->
                            <div class="select-Categories pt-80 pb-50">
                                <div class="small-section-tittle2">
                                    <h4>Job Type</h4>
                                </div>

                                <label class="container">Full Time
                                    <input type="checkbox" name="filter[]" value="full-time">
                                    <span class="checkmark"></span>
                                </label>

                                <label class="container">Part Time
                                    <input type="checkbox" name="filter[]" value="part-time" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <!--
                                <label class="container">Remote
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Freelance
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label> -->
                            </div>
                            <!-- select-Categories End -->
                        </div>
                        <!-- single two -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Job Location</h4>
                            </div>
                            <!-- Select job items start -->
                            <div class="select-job-items2">
                                <select class="selectLocData">
                                    <option value="Any Where">Anywhere</option>
                                    <?php while ($job_data = mysqli_fetch_assoc($job_result)) { ?>
                                        <option value="<?php echo $job_data['location'] ?>">
                                            <?php echo $job_data['location'] ?>
                                        </option>
                                    <?php } ?>
                                    <!-- <option value="">Category 2</option>
                                    <option value="">Category 3</option>
                                    <option value="">Category 4</option> -->
                                </select>
                            </div>
                            <!--  Select job items End-->
                            <!-- select-Categories start -->
                            <div class="select-Categories pt-80 pb-50">
                                <div class="small-section-tittle2">
                                    <h4>Experience</h4>
                                </div>
                                <label class="container">1-2 Years
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">2-3 Years
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">3-6 Years
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">6-more..
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <!-- select-Categories End -->
                        </div>
                        <!-- single three -->
                        <div class="single-listing">
                            <!-- select-Categories start -->
                            <div class="select-Categories pb-50">
                                <div class="small-section-tittle2">
                                    <h4>Posted Within</h4>
                                </div>
                                <label class="container">Any
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Today
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Last 2 days
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Last 3 days
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Last 5 days
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Last 10 days
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <!-- select-Categories End -->
                        </div>
                        <div class="single-listing">
                            <!-- Range Slider Start -->
                            <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                                <div class="small-section-tittle2">
                                    <h4>Filter Jobs</h4>
                                </div>
                                <div class="widgets_inner">
                                    <div class="range_item">
                                        <!-- <div id="slider-range"></div> -->
                                        <input type="text" class="js-range-slider" value="" />
                                        <div class="d-flex align-items-center">
                                            <div class="price_text">
                                                <p>Price :</p>
                                            </div>
                                            <div class="price_value d-flex justify-content-center">
                                                <input type="text" class="js-input-from" id="amount" readonly />
                                                <span>to</span>
                                                <input type="text" class="js-input-to" id="amount" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <!-- Range Slider End -->
                        </div>
                    </div>
                    <!-- Job Category Listing End -->
                </div>
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="error-box" id="message" style="display:none; border: 4px solid red;">

                            <h1> No recods found</h1>
                        </div>
                        <div class="container filtered_data" id="users" class="user1">
                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span>39, 782 Jobs found</span>
                                        <!-- Select job items start -->
                                        <div class="select-job-items">
                                            <span>Sort by</span>
                                            <select name="select">
                                                <option value="">None</option>
                                                <option value="">job list</option>
                                                <option value="">job list</option>
                                                <option value="">job list</option>
                                            </select>
                                        </div>
                                        <!--  Select job items End-->
                                    </div>
                                </div>
                            </div>
                            <!-- Count of Job list End -->
                            <!-- single-job-content -->
                            <?php while ($AllJob = mysqli_fetch_assoc($job_result)) { ?>
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <!-- <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a> -->
                                            <a href="#"><img src="<?php echo 'uploads/' . $AllJob['company_logo'] ?>"" alt=""></a>
                                        </div>
                                        <div class=" job-tittle job-tittle2">
                                                <a href="#">
                                                    <!-- <h4>Digital Marketer</h4> -->
                                                    <h4>
                                                        <?php echo $AllJob['job_category'] ?>
                                                    </h4>
                                                </a>
                                                <ul>
                                                    <li>Creative Agency</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>
                                                        <?php echo $AllJob['location'] ?>
                                                    </li>
                                                    <li>
                                                        <?php echo $AllJob['salary'] ?>
                                                    </li>
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="job_details.html">
                                            <?php echo $AllJob['job_shift'] ?>
                                        </a>
                                        <span>
                                            <?php echo $AllJob['created_date'] ?>
                                        </span>
                                    </div>
                                </div>
                                <?php
                            } ?>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list2.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list3.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list4.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list3.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list4.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->
    <!--Pagination Start  -->
    <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="ti-angle-right"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Pagination End  -->

</main>


<?php require_once ("footer.php") ?>
<script>
    $(document).ready(function () {

        // ------------------Category Filtered Data--Start---------------------------------------------------------

        $(".catName").change(function () {
            var name = $(this).val();
            // alert(name)

            $.ajax({
                // type: "POST",
                type: "GET",
                url: 'admin/get_category_jobs.php?category_name=' + name,
                success: function (result) {
                    // console.log($.parseJSON(result));
                    let data = $.parseJSON(result);
                    // $(".row .single-job-items").html($.parseJSON(result));
                    let str = "";
                    let data1 = data.forEach(element => {
                        // console.log(element);
                        str += ` <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                <a href="#"><img src="${'admin/uploads/' + element.company_logo}" width=85px height="85px" alt=""></a>
                         
                                     </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>
                                            ${element.job_category}
                                            </h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i> ${element.location}</li>
                                            <li> $${element.salary}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">${element.job_shift}</a>
                                    <span>${element.created_date}</span>
                                </div>
                            </div>`;


                    });

                    let d = document.getElementById("users").innerHTML = str;
                    var message = document.getElementById("message");
                    if (d == "") {
                        message.style.display = "block";
                    } else {
                        message.style.display = "none";

                    }

                }
            })
        })
    })
    // --------------------Category Filtered Data--End-------------------------------------------------------

    // ------------------------Location Filtered data--Start-------------------------------------------------
    function showloc() {
        $(".selectLocData").change(function () {
            var name1 = $(this).val();
            // alert(name1);
            $.ajax({
                type: "GET",
                url: 'admin/get_location_jobs.php?location_name=' + name1,
                success: function (res) {
                    // console.log($.parseJSON(res));
                    let loc_data = $.parseJSON(res);
                    let str1 = "";
                    loc_data.forEach(items => {
                        // console.log(items)
                        str1 += `<div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                <a href="#"><img src="${'admin/uploads/' + items.company_logo}" width=85px height="85px" alt=""></a>
                         
                                     </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>
                                            ${items.job_category}
                                            </h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i> ${items.location}</li>
                                            <li> $${items.salary}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">${items.job_shift}</a>
                                    <span>${items.created_date}</span>
                                </div>
                            </div>`;
                    });
                    let d = document.getElementById("users").innerHTML = str1;
                    var message = document.getElementById("message");
                    if (d = "") {
                        message.style.display = "block";
                    } else {
                        message.style.display = "none";
                    }
                }
            })

        })
    }
    showloc();
    // ------------------------Location Filtered data--End-------------------------------------------------

    // ------------------------Job_shift Filtered data--Start-------------------------------------------------


    function checkboxFiltered() {
        $('input[type="checkbox"]').click(function () {
            var filters = [];
            $('input[type="checkbox"]:checked').each(function () {
                filters.push($(this).val());
                // console.log(filters);
                // alert(filters);
            });

            $.ajax({
                url: "filter_job_shift.php",
                type: 'POST',
                data: { filters: filters },
                success: function (response) {
                    console.log($.parseJSON(response));
                }
            })
        })
    }
    checkboxFiltered();




    // ------------------------Job_shift Filtered data--End-------------------------------------------------




</script>



<script>


</script>
<script>



    // window.onload = function () {

    // };


    // function checkempty() {
    //     var blogdata = document.getElementById("users").innerHTML;
    //     var message = document.getElementById("message");
    //     if (blogdata === "") {
    //         message.style.display = "block";
    //     } else {
    //         message.style.display = "none";

    //     }
    // }



    // checkempty();




</script>




<!-- <script>
    $(document).ready(function () {
        $("#fetchval").on('change', function () {
            var value = $(this).val();
            // alert(value);
            $.ajax({
                url: "get_category_jobs.php",
                type: "POST",
                data: 'request=' + value,
                beforeSend:function(){
                    $(".row").html('<span>Working....</span>');
                },
                success:function(data){
                    $(".row").html(data);
                }


            })
        });
    });
</script> -->