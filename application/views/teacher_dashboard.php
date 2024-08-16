<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tailweb</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">

	<style>
		body{margin-top:20px;
background-color:#eee;
}
.project-list-table {
    border-collapse: separate;
    border-spacing: 0 12px
}

.project-list-table tr {
    background-color: #fff
}

.table-nowrap td, .table-nowrap th {
    white-space: nowrap;
}
.table-borderless>:not(caption)>*>* {
    border-bottom-width: 0;
}
.table>:not(caption)>*>* {
    padding: 0.75rem 0.75rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}

.avatar-sm {
    height: 2rem;
    width: 2rem;
}
.rounded-circle {
    border-radius: 50%!important;
}
.me-2 {
    margin-right: 0.5rem!important;
}
img, svg {
    vertical-align: middle;
}

a {
    color: #3b76e1;
    text-decoration: none;
}

.badge-soft-danger {
    color: #f56e6e !important;
    background-color: rgba(245,110,110,.1);
}
.badge-soft-success {
    color: #63ad6f !important;
    background-color: rgba(99,173,111,.1);
}

.badge-soft-primary {
    color: #3b76e1 !important;
    background-color: rgba(59,118,225,.1);
}

.badge-soft-info {
    color: #57c9eb !important;
    background-color: rgba(87,201,235,.1);
}

.avatar-title {
    align-items: center;
    background-color: #3b76e1;
    color: #fff;
    display: flex;
    font-weight: 500;
    height: 100%;
    justify-content: center;
    width: 100%;
}
.bg-soft-primary {
    background-color: rgba(59,118,225,.25)!important;
}
@media (min-width: 992px) {
    .col-md-offset-4 {
         margin-left: 0% !important;
    }
}
	</style>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

</head>
<body>
    <div class="container">
        <h1 class="page-header text-center">Welcome to Tailweb Teacher Login Page</h1>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php
                $user = $this->session->userdata('user');
                extract($user);
                ?>
                <p>Fullname: <?php echo $name; ?></p>
                <a href="<?php echo base_url(); ?>TeacherController/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Student List <span class="text-muted fw-normal ms-2">(10)</span></h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div style="margin-right: 100px;">
                        <a href="#" data-bs-toggle="modal" data-toggle="modal" data-target="#insert" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" class="ps-4" style="width: 50px;">
                                        <div class="form-check font-size-16">
                                            <input type="checkbox" class="form-check-input" id="studentlist" />
                                            <label class="form-check-label" for="studentlist"></label>
                                        </div>
                                    </th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Marks</th>
                                    <th scope="col" style="width: 200px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $post): ?>
                                    <tr>
                                        <th scope="row" class="ps-4">
                                            <div class="form-check font-size-16">
                                                <input type="checkbox" class="form-check-input" id="studentlist1" />
                                                <label class="form-check-label" for="studentlist1"></label>
                                            </div>
                                        </th>
                                        <td><?=$post->name?></td>
                                        <td><?=$post->email?></td>
                                        <td><?=$post->subject?></td>
                                        <td><?=$post->marks?></td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-2 text-primary">
                                                        <i class="bx bx-pencil font-size-18" data-toggle="modal" data-target="#myModal<?=$post->id?>"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="<?php echo base_url();?>TeacherController/delete/<?=$post->id?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-2 text-danger">
                                                        <i class="bx bx-trash-alt font-size-18"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                               


           <!-- Modal -->
<div class="modal fade" id="myModal<?=$post->id?>" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content" style="padding: 20px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Student Update Form</h4>
            </div>
            <form action="<?php echo base_url();?>TeacherController/update" method="post">
                <input type="hidden" name="id" value="<?=$post->id?>">
                <div class="form-group">
                    <label for="username">Student Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?=$post->name?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=$post->email?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="<?=$post->subject?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Marks:</label>
                    <input type="text" class="form-control" id="marks" name="marks" value="<?=$post->marks?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

  <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0 align-items-center pb-4">
        <div class="col-sm-6">
            <div><p class="mb-sm-0">Showing 1 to 10 of 10 entries</p></div>
        </div>
    </div>
</div>

<div class="modal fade" id="insert" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" style="padding:20px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Student Register Form</h4>
        </div>
        <form action="<?php echo base_url();?>TeacherController/insert" method="post">
           
            <div class="form-group">
                <label for="username">Student Name:</label>
                <input type="text" class="form-control" id="name" name="name"   required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Subjet:</label>
                <input type="text" class="form-control" id="subject" name="subject"  required>
            </div>
            <div class="form-group">
                <label for="password">Marks:</label>
                <input type="text" class="form-control" id="marks" name="marks"  required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>




</body>
</html>
