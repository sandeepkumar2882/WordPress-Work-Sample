    
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!------ Include the above in your HEAD tag  ---------->
<body>
<section class="form-section container" id="fill-form">
            <div class="d-flex flex-wrap">
                <h2 class=" text-gray-1 text-center mw-100"><?php echo get_option('myplugin_settings_input_field'); ?></h2>
                <div class="form-template container-fluid">
                    <div class="row ">
                        <div class="col-lg-4 bg-pink text-red d-flex template-text align-items-center text-center">
                            <div class="mx-auto p-3">
                                <h4><?php echo get_option('myplugin_settings_input2_field'); ?></h4>
                                <p><?php echo get_option('myplugin_settings_input3_field'); ?></p>
                                <img src="<?php echo site_url().'/wp-content/plugins/sandeep-custom-plugin/images/undraw_fill_forms_yltj.png' ?>" class="form-img w-100 lozad" alt="form-img">
                            </div>
                        </div>
                        <div class="col-lg-7 offset-lg-1 template-inputs">
                            <form action="<?php echo site_url().'/wp-content/plugins/sandeep-custom-plugin/db/custom-plugin-crud.php' ?>" method="post"
                                enctype="multipart/form-data" class="forms">
                                <div class="form-row ">
                                    <div class="form-group col-sm-8 col-12">
                                        <label for="Name">Name*</label>
                                        <input type="text" class="form-control" required name="name" id="Name" class="name">
                                    </div>
                                    <div class="form-group col-sm-8 col-12">
                                        <label for="Phone">Phone*</label>
                                        <input type="number" class="form-control" required name="phone" data-parsley-type="number"
                                            id="Phone" class="phone">
                                    </div>
                                    <div class="form-group col-sm-8 col-12">
                                        <label for="Experience">Experience</label>
                                        <input type="number" class="form-control" data-parsley-type="number"
                                            id="Experience" name="experience" class="experience">
                                    </div>
                                    <div class="form-group col-sm-8 col-12">
                                        <label for="inputEmail4">Email*</label>
                                        <input type="email" class="form-control" required name="email"
                                            data-parsley-trigger="change" id="inputEmail4" class="email">
                                    </div>
                                    <div class="form-group col-sm-5 col-12 mr-4">
                                        <label for="CurrentSalary">Current Salary</label>
                                        <input type="number" class="form-control" step="2" data-parsley-type="number"
                                            id="CurrentSalary" name="current_salary" class="current_salary">
                                    </div>
                                    <div class="form-group col-sm-5 col-12">
                                        <label for="referredBy">Referred By</label>
                                        <input type="text" class="form-control" id="referredBy" name="referred_by" class="referred_by">
                                    </div>
                                    <div class="form-group col-sm-5 col-12 mr-4">
                                        <label for="expectedSalary">Expected Salary(Per Annum)</label>
                                        <input type="number" class="form-control" data-parsley-type="number" step="2"
                                            id="expectedSalary" name="expected_salary" class="expected_salary">
                                    </div>
                                    <div class="form-group col-sm-5 col-12">
                                        <label for="Hometown">HomeTown</label>
                                        <input type="text" class="form-control" id="Hometown" name="hometown" class="hometown" required>
                                    </div>
                                    <!-- attach resume button -->
                                    <div class="form-group col-md-8 col-12">
                                        <label class="resume" for="attachResume" name="attach-resume" id="file_name">Attach Resume</label>
                                        <div class="resume">
                                            <button type="button" id="custom-button"
                                                class="text-gray-2 bg-white mr-2">Choose File <i
                                                    class="fa fa-upload text-red px-2"></i></button>
                                            <span id="custom-text" class="text-gray-2">No file choosen</span>
                                        </div>
                                        <input type="file" class="form-control" id="attachResume" name = "attach-resume"
                                            hidden="hidden" data-parsley-max-file-size="5000"
                                               data-parsley-required-message="This resume file is required.">
                                        <span class="text-red resume" id="file_type_error" style="color: red;"></span>
                                        <p class="msg-error" role="alert" id="file_size_error" style="color: red;">
                                            </p>
                                    </div>
                                    <div class="submit-btn col-sm-10 col-12">
                                        <button type="submit" name="sumbit" class="btn-primary" value="submit" id="upload_bt1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
        <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->

        <script>
                const form = document.querySelector(".forms");
                form.addEventListener("submit", (e)=>{
                    let flag = true;
                    var file = document.getElementById('attachResume').value;
                    let file_type_error = document.getElementById('file_type_error');
                    let file_size_error = document.getElementById('file_size_error');
                    file_type_error.innerText = "";
                    file_size_error.innerText = "";
                    if(file!=''){
                    var checking = file.toLowerCase();
                    if(!checking.match(/(\.PDF|\.DOC|\.DOCX|\.pdf|\.doc|\.docx)$/)){
                        // let file_type_error = document.getElementById('file_type_error');
                        file_type_error.innerText = "** File Type should be a pdf, doc or docx";
                        flag=false;
                    }
                    var file = document.getElementById('attachResume');
                    var size = parseFloat(file.files[0].size / (1024 * 1024).toFixed(5));
                    if(size>5){                                               
                        file_size_error.innerText = "** File size should be less than 5 MB";
                        flag = false;
                    }
                    // flag=false;
                }
                console.log(flag);
                if(!flag){
                    e.preventDefault();
                } 
                })            
        </script>       
</body>
