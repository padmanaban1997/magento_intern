
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">


  </head>
  <body>
    <br />
    <div class="container">
           <h3 style="text-align: center;">Crud with search and pagination</h3>
      <br />
      <div class="card" >
        <div class="card-header">

                <a href='insert.php'>
         
                    <button style="float:right;">
                    Add New <i class="icon-plus"></i>
                    </button>
             </a>

        <!--  <input type="text" name="search_box" id="search_box" size="15px"  placeholder="Type your search " />-->
        </div>
        <div class="card-body">
          <div class="form-group"style="padding: auto;">
           <input type="text" name="search_box" id="search_box" size="10px" placeholder="search" />&nbsp;
           
          
          </div>
          <div class="table-responsive" id="dynamic_content">
            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>

  function datadelete(){

                        return confirm("Are you sure you want to delete a record ");

                       }
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });



  });
</script>
