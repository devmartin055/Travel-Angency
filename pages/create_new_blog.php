<html>

<head>
    <?php
    include "../includes/libraries.php"
    ?>

    <script src="../JS/blog.js"></script>
    <script src="../JS/validation.js"></script>

    <link rel="stylesheet" href="../CSS/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>
        Create New Blog
    </title>
</head>

<body>
    <form action="../PHP/insert_blog.php" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
        <div class="container bg-light dropshadow my-border w-75 mt-5 mb-5 p-3 pl-lg-5 pr-lg-5 pt-5 mx-lg-auto">

            <div class="row mb-3">
                <div class="col">
                    <h4>Create New Blog</h4>
                    <hr>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-3 text-lg-right">
                    <label for="title">Blog Title <span class="font-weight-bold text-danger">*</span></label>
                </div>
                <div class="col-12 col-lg-9">
                    <input type="text" class="form-control form-control-lg" name="title" placeholder="Enter Blog Title" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-3 text-lg-right">
                    <label for="title">Enter Author <span class="font-weight-bold text-danger">*</span></label>
                </div>
                <div class="col-12 col-lg-9">
                    <input type="text" class="form-control" name="author" placeholder="Enter Author" required>
                </div>
            </div>
            <!-- upload image -->
            <div class="row mb-3">
                <div class="col-12 col-lg-3 text-lg-right">
                    <label for="image">Upload Blog Cover <span class="text-danger font-weight-bold">*</span></label>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="input-group input-group-lg">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="image" accept="image/png, image/gif, image/jpeg" required>
                            <label id="outSelected" class="custom-file-label " for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="row mb-3">
                <div class="col-12 col-lg-3 text-lg-right">
                    <label for="image">Blog Content <span class="text-danger font-weight-bold">*</span></label>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="input-group ">
                        <textarea class="w-100 form-control" name="content" id="content" cols="30" rows="10" placeholder="Enter blog content here..." required></textarea>
                    </div>
                </div>
            </div>
            <!-- nav button -->
            <div class="row mb-3 justify-content-end">
                <div class="col-6 col-lg-3 ">
                    <a href="admin_blog.php" class="w-100 btn btn-secondary">Cancel</a>
                </div>
                <div class="col-6 col-lg-3 ">
                    <input type="submit" class="w-100 btn btn-primary" name="submit" id="submit" value="PUBLISH">
                    
                </div>
            </div>

        </div>
    </form>
</body>

</html>