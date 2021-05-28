<?php 
include('../functions.php');

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login-page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Officer</title>
    <link rel="icon" href="../svgs/logo.png" sizes="32x32" type="image/png">

    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">          
    <link rel="stylesheet" href="../css/ics.style.css">
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.css">

</head>
<body>
    <?php  if (isset($_SESSION['user'])) : ?>
    <header class="page-header">
        <nav>
          <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
            <i class="fa fa-bars"></i>
          </button>
          <a href="../index.html">
            <img class="logo mx-auto" src="../svgs/logo.png" alt="ics logo">
          </a>
          <ul class="admin-menu">
            <li class="menu-heading">
              <h3>Dashboard</h3>
            </li>
            <li>
              <a href="ao.main.php">
                <i class="fa fa-list" aria-hidden="true"><span>Prequalified</span></i>
              </a>
            </li>
            <li>
            <a href="ao.qual.php" class="active">
                <i class="fa fa-thumbs-o-up" aria-hidden="true"><span>Qualified</span></i>
              </a>
            </li>
            <!--<li class="menu-heading">
              <h3>Settings</h3>
            </li>
            <li>
              <a href="">
                <i class="fa fa-cog" aria-hidden="true"><span>Settings</span></i>
              </a>
            </li>-->
            <!--<li>
              <a href="#0">
                <i class="fa fa-list-alt" aria-hidden="true"><span>Criteria</span></i>
              </a>
            </li>
            <li>
                <a href="#0">
                  <i class="fa fa-list-alt" aria-hidden="true"><span>Requirement</span></i>
                </a>
              </li>-->
            <li>
              <a href="../index.php?logout='1'">
                <i class="fa fa-sign-out"><span>Logout</span></i>
                
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <?php endif ?>
      <section class="page-content">
      
        <section class="btn-group">
          <p class="section-name">Qualified List</p>
          <div class="buttons">
              <button class="btn btn-primary mr-2 pl-3 pr-3" onclick="myTable1.printApplicantTable()">
                <i class="fa fa-print" aria-hidden="true"></i>
              </button>
          </div>
        </section>
        <section class="grid">
          <article>
              <div class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mx-3 my-3">
                <table class="table table-sm table-striped table-bordered table-hover" id="printable-table">
                  <thead class="thead">
                    <tr>
                        <th><input type="checkbox" onclick="toggle(this)"></th>
                        <th>#</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>BirthDate</th>
                        <th>Address</th>
                        <th>ContactNo</th>
                        <th>Email</th>
                        <th>Cet</th>
                        <th>Gpa</th>
                        <th>Interview Score</th>
                        <th>Overall Score</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <tr>
                        <td><input type="checkbox" name="selected"></td>
                        <td>1</td>
                        <td>Adz</td>
                        <td>Kalnain</td>
                        <td>December 16,1998</td>
                        <td>Mampang Z.C.</td>
                        <td>09666319676</td>
                        <td>adzgreen2017@gmail.com</td>
                        <td>92%</td>
                        <td>92%</td>
                        <td>9</td>
                        <td>92</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="selected"></td>
                      <td>2</td>
                      <td>Adz</td>
                      <td>Kalnain</td>
                      <td>December 16,1998</td>
                      <td>Mampang Z.C.</td>
                      <td>09666319676</td>
                      <td>adzgreen2017@gmail.com</td>
                      <td>92%</td>
                      <td>92%</td>
                      <td>9</td>
                      <td>91</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="selected"></td>
                      <td>3</td>
                      <td>Adz</td>
                      <td>Kalnain</td>
                      <td>December 16,1998</td>
                      <td>Mampang Z.C.</td>
                      <td>09666319676</td>
                      <td>adzgreen2017@gmail.com</td>
                      <td>92%</td>
                      <td>92%</td>
                      <td>9</td>
                      <td>92</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="selected"></td>
                      <td>4</td>
                      <td>Adz</td>
                      <td>Kalnain</td>
                      <td>December 16,1998</td>
                      <td>Mampang Z.C.</td>
                      <td>09666319676</td>
                      <td>adzgreen2017@gmail.com</td>
                      <td>92%</td>
                      <td>92%</td>
                      <td>9</td>
                      <td>92</td>
                    </tr>
         
                </tbody>
                </table>
              </div>
          </article>
        </section>
      </section>
</body>
    <script src="../jquery/jquery.min.js"></script>
    <script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../DataTables/datatables.js"></script>
    <script src="../js/control.js"></script>
    
    <script>
        $(document).ready( function () {
        $('#printable-table').DataTable();
        } );
    </script>

    <script>
        $('#printable-table').DataTable( {
            select: true
        } );
    </script>

    <script>
      function toggle(source){
          checkboxes = document.getElementsByName('selected');
          for (var i=0, n=checkboxes.length; i<n; i++){
              checkboxes[i].checked = source.checked;
          }
      }
    </script>

</html>

  
  
  