<?php
include 'ajax/config.php';
session_start();
if (!($_SESSION['username'])) {
  header('location:welcome.php');
}


$query = mysqli_query($mysqli, "SELECT id, title, author, year, image, user from books ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <script src="scripts/home.js"></script>
      </head>
    <body>
        <div id="home">
          <nav class="navbar navbar-expand-lg navbar-light pt-5" id="nav1">
            <a class="navbar-brand align-top" href="#">Uread</a>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" id="logout" href="">LogOut</a>
              </li>
            </ul>
          </nav>
          <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="mybooks.php">My books</a>
                </li>
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <a id="create" href="#" class="nav-link align-bottom" data-toggle="modal" data-target="#exampleModal">
                      Add book
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content bg-light rounded-sm">
                          <div class="modal-header">
                            <h5 class="modal-title font-weight-lighter" id="exampleModalLabel">Add Book</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form class="form-group" id="add">
                            <input type="text" value="" class="form-control m-1 rounded-sm" required id="title" placeholder="Title">
                            <input type="text" value="" class="form-control m-1 rounded-sm" required id="author" placeholder="Author">
                            <input type="date" value="" class="form-control m-1 rounded-sm" required id="year" placeholder="Year">
                            <input type="text" value="" class="form-control m-1 rounded-sm" required id="cover" placeholder="Image link">
                          </form>
                          </div>
                          <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary rounded-sm" data-dismiss="modal">Close</button>
                            <button type="button" id="trigger" disabled class="btn btn-dark rounded-sm" data-dismiss="modal">Add Book</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </li>
              </ul>
              <form id="search" class="form-inline my-2 my-lg-0">
                <input id="query" class="form-control mr-sm-2 rounded-sm bg-transparent border-dark" required type="search" placeholder="Search Books" aria-label="Search">
                <button class="btn btn-dark my-2 my-sm-0 rounded-sm" type="submit">Search</button>
              </form>
            </div>
          </nav>
          <div class="table-responsive pt-5">
            <table class="table mx-auto table-borderless table-hover">
              <thead class="">
                <tr> 
                  <th scope="col">TITLE</th>
                  <th scope="col">AUTHOR</th>
                  <th scope="col">YEAR</th>
                  <th scope="col">COVER</th>
                  <th scope="col">OPTIONS</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                  <td class='align-middle'><input  class='form-control booktitle' disabled value='<?php echo $row['title'] ?>'></td>
                  <td class='align-middle'><input class='form-control bookauthor' disabled value='<?php echo $row['author'] ?>'></td>
                  <td class='align-middle'><input type="date" class='form-control bookyear' disabled value='<?php echo $row['year'] ?>'></td>
                  <td class='align-middle'><input data-toggle="tooltip" data-placement="top" title="Image link" class='form-control imgsrc' hidden disabled value='<?php echo $row['image'] ?>'><img  src='<?php echo $row['image'] ?>'></td>
                  <?php
                  if ($row['user'] == $_SESSION['username']) {
                  ?>
                  <td class='align-middle'><div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-outline-warning edit"><i class="fas fa-xl fa-pen"></i></button><button onclick="edit($(this).parent().parent().parent(), '<?php echo $row['id'] ?>')" type="button" data-toggle="tooltip" data-placement="bottom" title="Save" hidden class="btn btn-outline-warning save"><i class="fas fa-xl fa-save"></i></button><button data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="deletebook($(this).parent().parent().parent(), '<?php echo $row['id'] ?>')" type="button" class="btn btn-outline-danger delete"><i class="fas fa-xl fa-trash"></i></button></div></td>
                  <?php
                  }
                  else {
                    ?>
                      <td class='align-middle'><div class="btn-group" role="group" aria-label="Basic example">
                <button data-toggle="tooltip" data-placement="bottom" title="Edit" type="button" disabled class="btn btn-outline-warning edit"><i class="fas fa-xl fa-pen"></i></button><button data-toggle="tooltip" data-placement="bottom" title="Save" disabled type="button" hidden class="btn btn-outline-warning save"><i class="fas fa-xl fa-save"></i></button><button data-toggle="tooltip" data-placement="bottom" title="Delete" disabled type="button" class="btn btn-outline-danger delete"><i class="fas fa-xl fa-trash"></i></button></div></td>
                  <?php
                  }
                  ?>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <script>
        function deletebook(row, id) {
          var xhr = new XMLHttpRequest();
          xhr.open("GET", "ajax/delete.php?id=" + id, true);
          xhr.send();
          xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              $(row).hide(2000);
            }
          }
        }
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
        function edit(row, id) {
          var title = $(row).find('.booktitle').val();
          var author = $(row).find('.bookauthor').val();
          var year = $(row).find('.bookyear').val();
          var image = $(row).find('.imgsrc').val();

          let xhr = new XMLHttpRequest();
          xhr.open("GET", `ajax/edit.php?id=${id}&title=${title}&author=${author}&year=${year}&image=${image}`, true);
          xhr.send();
          xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                  let src = $(row).find('.imgsrc').val();
                  $(row).find('img').attr('src', src);
                  $(row).find('img').removeAttr('hidden');
                  $(row).find('.imgsrc').attr('hidden', 'hidden');
                  $(row).find('.imgsrc').attr('disabled', 'disabled');
                  $(row).find('.save').attr('hidden', 'hidden');
                  $(row).find('.edit').removeAttr('hidden');
                  $(row).find('input').each(function(key, inp) {
                      $(inp).attr('disabled', 'disabled');
                    })
            }
          }
        }
        $(document).ready(function() {
          $('#add').submit(function(e) {
              e.preventDefault();
              let title = $('#add #title').val();
              let author = $('#add #author').val();
              let year = $('#add #year').val();
              let cover = $('#add #cover').val();
              let user = '<?php echo $_SESSION['username']; ?>';
              let xhr = new XMLHttpRequest();
              xhr.open("GET", `ajax/add.php?title=${title}&author=${author}&year=${year}&image=${cover}&user=${user}`, true);
              xhr.send();
              xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                  let xhr1 = new XMLHttpRequest();
                  xhr1.open("GET", `ajax/id.php?title=${title}&user=${user}`, true);
                  xhr1.send();
                  xhr1.onreadystatechange = function() {
                    if (xhr1.readyState == 4 && xhr1.status == 200) {
                      let newid = xhr1.response;
                      $('tbody').prepend(`<tr>
                      <td class='align-middle'><input  class='form-control booktitle' disabled value='${title}'></td>
                      <td class='align-middle'><input class='form-control bookauthor' disabled value='${author}'></td>
                      <td class='align-middle'><input type="date" class='form-control bookyear' disabled value='${year}'></td>
                      <td class='align-middle'><input data-toggle="tooltip" data-placement="top" title="Image link" class='form-control imgsrc' hidden disabled value='${cover}'><img src='${cover}'></td>
                      <td class='align-middle'>
                      <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-outline-warning edit"><i class="fas fa-xl fa-pen"></i></button>
                      <button onclick="edit($(this).parent().parent().parent(), '${newid}')" type="button" data-toggle="tooltip" data-placement="bottom" title="Save" hidden class="btn btn-outline-warning save"><i class="fas fa-xl fa-save"></i></button>
                      <button data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="deletebook($(this).parent().parent().parent(), '${title}')" type="button" class="btn btn-outline-danger delete"><i class="fas fa-xl fa-trash"></i></button></div></td>
                      </tr>`);
                      $('#add #title').val('');
                      $('#add #author').val('');
                      $('#add #year').val('');
                      $('#add #cover').val('');
                      $('#trigger').attr('disabled', 'disabled');

                      $('.edit').each(function() {
                        $(this).click(function() {
                            let affrow = $(this).parent().parent().parent();
                            $(affrow).find('.edit').attr('hidden', 'hidden');
                            $(affrow).find('.save').removeAttr('hidden');
                            $(affrow).find('.imgsrc').removeAttr('hidden');
                            $(affrow).find('.imgsrc').removeAttr('disabled');
                            $(affrow).find('img').attr('hidden', 'hidden');
                            $(affrow).find('input').each(function(key, inp) {
                                $(inp).removeAttr('disabled');
                            })
                        })
                      })
                    }
                  }
                }
              }
          })
        })
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        </body>
</html>